<?php

namespace RongTest\Chatroom;

use RongLib\Chatroom\Chatroom;
use RongTest\Request;

class ChatroomTest extends Request
{
    public function testRoom()
    {
        $roomId = "1234qwe";
        $roomName = "测试";

        $roomModel = new Chatroom($this->getConfig());
        // $data = $roomModel->create($roomId, $roomName);
        // var_dump($data);
        $data = $roomModel->query($roomId);
        var_dump($data);
        // $data = $roomModel->destroy($roomId);
        // var_dump($data);
        // $data = $roomModel->query($roomId);
        // var_dump($data);
        $this->assertEquals(true, $data[0]);
    }
}
