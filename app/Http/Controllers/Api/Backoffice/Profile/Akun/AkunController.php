<?php

namespace App\Http\Controllers\Api\Backoffice\Profile\Akun;

/**
 * import component
 */

use App\Http\Controllers\Controller;

/**
 * import trait
 */

use App\Traits\Message;

/**
 * import request
 */

use App\Http\Requests\Profile\Akun\UbahPasswordRequest;
use App\Http\Requests\Profile\Akun\UpdateRequest;
use App\Http\Requests\Profile\Akun\VerifyContactRequest;

/**
 * import repositories
 */

use App\Repositories\Backoffice\Profile\Akun\AkunRepositories;
use App\Repositories\Log\LogRepositories;

class AkunController extends Controller
{
    use Message;

    private $logRepositories;
    protected $akunRepositories;

    public function __construct(
        LogRepositories $logRepositories,
        AkunRepositories $akunRepositories
    ) {
        /**
         * defined repositories
         */
        $this->akunRepositories = $akunRepositories;
        $this->logRepositories = $logRepositories;
    }

    /**
     * get profile
     */
    public function get()
    {
        /**
         * process
         */
        $uuidUser = authAttribute()['uuidUser'];
        $response = $this->akunRepositories->get($uuidUser);
        $code = $response['code'];
        unset($response['code']);

        /**
         * log user
         */
        $message = $this->outputLogMessage('single data', 'profile');
        $this->logRepositories->saveLog($message['action'], $message['message'], $uuidUser, null);

        return response()->json($response, $code);
    }

    /**
     * ubah password
     */
    public function ubahPassword(
        UbahPasswordRequest $ubahPasswordRequest,
        $uuidUser = null
    ) {
        $uuidUser = is_null($uuidUser) ? authAttribute()['uuidUser'] : $uuidUser;

        /**
         * set log 
         */
        $log = $this->outputLogMessage('change password', $uuidUser);

        /**
         * process
         */
        $response  = $this->akunRepositories->ubahPassword(
            $ubahPasswordRequest->validated(),
            $uuidUser
        );
        $code = $response['code'];
        unset($response['code']);

        /**
         * save log
         */
        $this->logRepositories->saveLog($log['action'], $log['message'], $uuidUser, null);

        return response()->json($response, $code);
    }

    /**
     * ubah profile
     */
    public function update(UpdateRequest $updateRequest)
    {
        $uuidUser = authAttribute()['uuidUser'];

        /**
         * set log 
         */
        $log = $this->outputLogMessage('update', $uuidUser, json_encode($updateRequest->all()), 'profile');

        /**
         * process
         */
        $response  = $this->akunRepositories->update($updateRequest->validated(), $uuidUser);
        $code = $response['code'];
        unset($response['code']);

        /**
         * save log
         */
        $this->logRepositories->saveLog($log['action'], $log['message'], $uuidUser, null);

        return response()->json($response, $code);
    }

    /**
     * contact verification link
     */
    public function contactVerificationLink()
    {
        $uuidUser = authAttribute()['uuidUser'];
        $phone = authAttribute()['phone'];

        /**
         * set log 
         */
        $log = $this->outputLogMessage('update', $uuidUser, 'verifikasi kontak', 'profile');

        /**
         * process
         */
        $response  = $this->akunRepositories->contactVerificationLink($uuidUser,$phone);
        $code = $response['code'];
        unset($response['code']);

        /**
         * save log
         */
        $this->logRepositories->saveLog($log['action'], $log['message'], $uuidUser, null);

        return response()->json($response, $code);
    }

    /**
     * email verification link
     */
    public function emailVerificationLink()
    {
        $uuidUser = authAttribute()['uuidUser'];
        $email = authAttribute()['email'];

        /**
         * set log 
         */
        $log = $this->outputLogMessage('update', $uuidUser, 'verifikasi email ', 'profile');

        /**
         * process
         */
        $response  = $this->akunRepositories->emailVerificationLink($uuidUser, $email);
        $code = $response['code'];
        unset($response['code']);

        /**
         * save log
         */
        $this->logRepositories->saveLog($log['action'], $log['message'], $uuidUser, null);

        return response()->json($response, $code);
    }

    /**
     * verify email
     */
    public function verifyEmail($token)
    {
        $response = $this->akunRepositories->verifyEmail($token);
        return redirect()->route('profile.akun.index');
    }

    /**
     * verify contact
     */
    public function verifyContact(VerifyContactRequest $verifyContactRequest)
    {
        $uuidUser = authAttribute()['uuidUser'];

        /**
         * set log 
         */
        $log = $this->outputLogMessage('update', $uuidUser, 'verifikasi contact ', 'profile');

        /**
         * process
         */
        $response  = $this->akunRepositories->verifyContact($uuidUser, $verifyContactRequest->validated());
        $code = $response['code'];
        unset($response['code']);

        /**
         * save log
         */
        $this->logRepositories->saveLog($log['action'], $log['message'], $uuidUser, null);

        return response()->json($response, $code);
    }
}
