<?php

namespace RongLib\User;

use RongLib\Request;

class User extends Request
{
    /**
     * 获取token
     * @param string $userId
     * @param string $name
     * @param string $portraitUri
     * @return array
     * @throws \Throwable
     */
    public function token(string $userId, string $name, string $portraitUri = '')
    {
        return $this->postUrlencoded('/user/getToken.json', [
            'userId' => $userId,
            'name' => $name,
            'portraitUri' => $portraitUri
        ]);
    }
}
