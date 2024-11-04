<?php

namespace App\Traits;

trait Whatsapp
{

    /**
     * contact verification message
     */
    private function contactVerificationMessage($kode)
    {
        $message = "Kode verifikasi kamu adalah *".$kode."*. Gunakan kode tersebut untuk memverifikasi kontak kamu.";
        return $message;
    }

    /**
     * send
     */
    private function send($target, $message)
    {
        $key = env('WHATSAPP_KEY');
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_URL => '',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $target,
                'message' => $message,
                'countryCode' => '62',
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: ' . $key
            ),
        ));

        $response = json_decode(curl_exec($curl));
        curl_close($curl);
        return $response;
    }
}
