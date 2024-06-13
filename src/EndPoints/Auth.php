<?php

namespace umk0\HeadHunterApi\EndPoints;

class Auth extends Endpoint
{
    const RESOURCE = 'oauth';

    /**
     * @param string $token
     * @return array
     */
    public function refreshToken($token)
    {
        $params = [
            'grant_type'    => 'refresh_token',
            'refresh_token' => $token,
        ];

        return $this->postResource('', $params);
    }
}
