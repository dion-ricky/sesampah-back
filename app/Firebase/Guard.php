<?php

namespace App\Firebase;

use Kreait\Firebase\JWT\IdTokenVerifier;
use Kreait\Firebase\JWT\Error\IdTokenVerificationFailed;

class Guard
{
    protected $verifier;

    public function __construct(IdTokenVerifier $verifier) {
        $this->verifier = $verifier;
    }

    public function user($request) {
        $token = $request->bearerToken();

        try {
            $token = $this->verifier->verifyIdToken($token);
            return new User($token->payload());
        }
        catch (IdTokenVerificationFailed $e) {
            throw $e;
        }
    }
}