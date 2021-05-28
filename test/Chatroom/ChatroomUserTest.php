<?php

namespace RongTest\Chatroom;

use RongLib\Chatroom\Chatroom;
use RongLib\Chatroom\ChatroomUser;
use RongTest\Request;

class ChatroomUserTest extends Request
{
    public function testUserList()
    {
        $roomModel = new ChatroomUser($this->getConfig());
        // $data = $roomModel->list($this->roomId , 10);
        // var_dump($data);

        $data = $roomModel->whitelistAdd($this->roomId, [10]);
        var_dump($data);
        $data = $roomModel->exist($this->roomId, 10);
        var_dump($data);
        $data = $roomModel->whitelistQuery($this->roomId, [10]);
        var_dump($data);
        $data = $roomModel->whitelistRemove($this->roomId, [10]);
        var_dump($data);
        $data = $roomModel->whitelistQuery($this->roomId, [10]);
        var_dump($data);
        $this->assertEquals(true, $data[0]);
    }
}
