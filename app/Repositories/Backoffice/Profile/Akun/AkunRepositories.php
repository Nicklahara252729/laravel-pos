<?php

namespace App\Repositories\Backoffice\Profile\Akun;

interface AkunRepositories
{
    public function get(string $uuidUser);
    public function ubahPassword(object $request, string $uuidUser);
    public function update(object $request, string $uuidUser);
    public function contactVerificationLink(string $uuidUser, string $phone);
    public function emailVerificationLink(string $uuidUser, string $email);
    public function verifyEmail(string $token);
    public function verifyContact(string $uuidUser, object $request);
}
 