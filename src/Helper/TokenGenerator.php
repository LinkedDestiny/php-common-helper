<?php


namespace Common\Helper;

use Firebase\JWT\JWT;

class TokenGenerator
{
    /**
     * @param array $message
     * @param string $key
     * @param int $expire
     * @return string
     */
    public static function generateToken(array $message, string $key, int $expire)
    {
        // generate token
        $privateKey = file_get_contents($key);
        $jwt = JWT::encode([
            'message' => $message,
            'exp' => $message['expireAt'] ?? time() + $expire,
        ], $privateKey, 'HS512');
        return $jwt;
    }

    /**
     * @param $token
     * @param string $key
     * @return array
     */
    public static function verifyToken($token,  string $key = '')
    {
        $publicKey = file_get_contents($key);
        $message = JWT::decode($token, $publicKey, ['HS512']);
        $message = (array)($message);
        return (array)($message['message']);
    }
}