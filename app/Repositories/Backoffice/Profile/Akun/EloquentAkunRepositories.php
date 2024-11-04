<?php

namespace App\Repositories\Backoffice\Profile\Akun;

/**
 * import component 
 */

use Illuminate\Support\Facades\DB;
use App\Exceptions\CustomException;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

/**
 * import models
 */

use App\Models\User\User\User;

/**
 * import helpers
 */

use App\Helpers\CheckerHelpers;

/**
 * import traits
 */

use App\Traits\Message;
use App\Traits\Response;
use App\Traits\Whatsapp;

/**
 * import repositories
 */

use App\Repositories\Backoffice\Profile\Akun\AkunRepositories;

class EloquentAkunRepositories implements AkunRepositories
{
    use Message, Response, Whatsapp;

    protected $initCheckerHelper;
    protected $path;
    protected $user;
    protected $datetime;

    public function __construct(
        User $user,
        CheckerHelpers $initCheckerHelper
    ) {
        /**
         * initialize helper
         */

        $this->initCheckerHelper = $initCheckerHelper;

        /**
         * initialize models
         */
        $this->user = $user;

        /**
         * static value
         */
        $this->path = path('user');
        $this->datetime = Carbon::now()->toDateTimeLocalString();
    }

    /**
     * get profile
     */
    public function get($uuidUser)
    {
        try {

            /**
             * check outlet
             */
            $getUser = $this->user->select('name', 'email', 'phone')
                ->selectRaw("DATE_FORMAT(email_verified_at, '%d %M %Y') AS status_email")
                ->selectRaw("DATE_FORMAT(phone_verified_at, '%d %M %Y') AS status_kontak")
                ->selectRaw('CASE WHEN profile_photo_path IS NULL THEN CONCAT("' . url(path('user')) . '/", "blank.png") ELSE CONCAT("' . url(path('user')) . '/", profile_photo_path) END AS profile_photo_path')
                ->where(["uuid_user" => $uuidUser])
                ->first();
            if (is_null($getUser)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'akun'), 404]));
            endif;

            $response = $this->sendResponse(null, 200, $getUser);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Exception $e) {
            $response = $this->sendResponse($e->getMessage(), 500);
        }
        return $response;
    }

    /**
     * ubah password
     */
    public function ubahPassword($request, $uuidUser)
    {
        DB::beginTransaction();
        try {
            /**
             * form setting
             */
            $request = collect($request)->except(['current_password', 'password_confirmation', 'new_password_confirmation'])->toArray();
            $input['password'] = isset($request['password']) ? bcrypt($request['password']) : bcrypt($request['new_password']);

            /**
             * check outlet
             */
            $checkUser = $this->initCheckerHelper->userChecker(["uuid_user" => $uuidUser]);
            if (is_null($checkUser)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'pengguna'), 404]));
            endif;

            /**
             * update data outlet
             */

            $updatePassword = $this->user->where(["uuid_user" => $uuidUser])->update($input);
            if (!$updatePassword) :
                throw new \Exception($this->outputMessage('update fail', 'password'));
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('updated', 'password'), 201, null);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Exception $e) {
            DB::rollback();
            $response = $this->sendResponse($e->getMessage(), 500);
        }
        return $response;
    }

    /**
     * update akun
     */
    public function update($request, $uuidUser)
    {
        DB::beginTransaction();
        try {
            /**
             * check outlet
             */
            $checkUser = $this->initCheckerHelper->userChecker(["uuid_user" => $uuidUser]);
            if (is_null($checkUser)) :
                throw new CustomException(json_encode([$this->outputMessage('not found', 'pengguna'), 404]));
            endif;

            /**
             * upload file
             */
            if (isset($request['profile_photo_path'])) :
                $file  = $request['profile_photo_path'];
                $profile_photo_path = Uuid::uuid4()->getHex() . '.' . $file->extension();

                /**
                 * check file on local storage
                 */
                $photoOld = basename($checkUser->profile_photo_path);
                if (file_exists(public_path($photoOld)) && $photoOld != 'blank.png') :
                    unlink(public_path($photoOld));
                endif;

                /**
                 * check directoty
                 */
                if (!$file->move(public_path($this->path), $profile_photo_path)) :
                    throw new CustomException(json_encode([$this->outputMessage('not found', 'directory'), 404]));
                endif;
                $request['profile_photo_path'] = $profile_photo_path;
            endif;

            /**
             * update data outlet
             */

            $updatePassword = $this->user->where(["uuid_user" => $uuidUser])->update($request);
            if (!$updatePassword) :
                throw new \Exception($this->outputMessage('update fail', 'akun'));
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('updated', 'akun'), 200, null);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Exception $e) {
            DB::rollback();
            $response = $this->sendResponse($e->getMessage(), 500);
        }
        return $response;
    }

    /**
     * contact verification
     */
    public function contactVerificationLink($uuidUser, $phone)
    {
        DB::beginTransaction();
        try {

            $kode = rand(0, 999999);

            /**
             * save contact verification code
             */
            $saveKode = $this->user->where(["uuid_user" => $uuidUser])->update(['contact_verification_code' => $kode]);
            if (!$saveKode) :
                throw new \Exception($this->outputMessage('update fail', 'contact verification code'));
            endif;

            /**
             * fail send whatsapp notification
             */
            $message  = $this->contactVerificationMessage($kode);
            $sendKode = $this->send($phone, $message);
            if ($sendKode->status != true) :
                throw new \Exception($this->outputMessage('unsend', 'whatsapp'));
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('verification', 'kontak'), 200, null);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Exception $e) {
            DB::rollback();
            $response = $this->sendResponse($e->getMessage(), 500);
        }
        return $response;
    }

    /**
     * verify contact
     */
    public function verifyContact($uuidUser, $request)
    {
        DB::beginTransaction();
        try {

            $kode = implode('', $request['kode']);
            
            /**
             * checking user
             */
            $getUser = $this->initCheckerHelper->userChecker(['uuid_user' => $uuidUser]);
            if (is_null($getUser)) :
                throw new \Exception($this->outputMessage('not found', 'user'));
            endif;

            /**
             * matching request end code
             */
            if($kode != $getUser->contact_verification_code):
                throw new \Exception($this->outputMessage('unmatch', 'kode verifikasi'));
            endif;

            $updateVerificationContact = $this->user->where('uuid_user', $uuidUser)->update(['phone_verified_at' => $this->datetime]);
            if (!$updateVerificationContact) :
                throw new \Exception($this->outputMessage('update fail', 'contact'));
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('verified', 'kontak'), 200, null);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Exception $e) {
            DB::rollback();
            $response = $this->sendResponse($e->getMessage(), 500);
        }
        return $response;
    }

    /**
     * email verification link
     */
    public function emailVerificationLink($uuidUser, $email)
    {
        DB::beginTransaction();
        try {
            $token = Str::random(64);

            /**
             * save email verification token
             */
            $saveToken = $this->user->where('uuid_user', $uuidUser)->update(['email_verification_token' => $token]);
            if (!$saveToken) :
                throw new \Exception($this->outputMessage('update fail', 'email verification token'));
            endif;

            /**
             * send email verification
             */
            $sendEmail = Mail::send('emails.verification-email', ['token' => $token], function ($message) use ($email) {
                $message->to($email);
                $message->subject('Email Verification Mail');
            });
            if (!$sendEmail) :
                throw new \Exception($this->outputMessage('unsend', 'link verifikasi email'));
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('verification', 'email'), 200, null);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Exception $e) {
            DB::rollback();
            $response = $this->sendResponse($e->getMessage(), 500);
        }
        return $response;
    }

    /**
     * verify email
     */
    public function verifyEmail($token)
    {
        DB::beginTransaction();
        try {

            $verifyUser = $this->user->where('email_verification_token', $token)->first();
            if (is_null($verifyUser)) :
                throw new \Exception($this->outputMessage('not found', 'email token'));
            endif;

            $updateVerificationEmail = $this->user->where('email_verification_token', $token)->update(['email_verified_at' => $this->datetime]);
            if (!$updateVerificationEmail) :
                throw new \Exception($this->outputMessage('update fail', 'email'));
            endif;

            DB::commit();
            $response = $this->sendResponse($this->outputMessage('verified', 'email'), 200, null);
        } catch (CustomException $ex) {
            $ex = json_decode($ex->getMessage());
            $response = $this->sendResponse($ex[0], $ex[1]);
        } catch (\Exception $e) {
            DB::rollback();
            $response = $this->sendResponse($e->getMessage(), 500);
        }
        return $response;
    }
}
