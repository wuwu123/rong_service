<?php

namespace RongTest;

use RongLib\User\User;

class UserTest extends Request
{
    public function testSend()
    {
        $user = new User($this->getConfig());
        $data = $user->token('1621326713240197', 'test', 'https://cdn-static.knowyourself.cc/icon/default_avatar.png');
        $this->assertEquals(true, $data[0]);
    }
}
