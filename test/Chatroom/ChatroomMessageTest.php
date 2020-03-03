<?php


namespace RongTest\Chatroom;


use RongLib\Chatroom\Chatroom;
use RongLib\Chatroom\ChatroomMesage;
use RongTest\Request;

class ChatroomMessageTest extends Request
{
    public function testDistribution(){
        $messageModel = new ChatroomMesage($this->getConfig());
        $data = $messageModel->distributionStop($this->roomId);
        var_dump($data);
        $data = $messageModel->distributionResume($this->roomId);
        var_dump($data);
        $this->assertEquals(true, $data[0]);
    }

    public function testPriority(){
        $messageModel = new ChatroomMesage($this->getConfig());
        $data = $messageModel->priorityAdd(['RC:VcMsg']);
        var_dump($data);
        $data = $messageModel->priorityQuery();
        var_dump($data);
        $data = $messageModel->priorityRemove(['RC:VcMsg']);
        var_dump($data);
        $data = $messageModel->priorityQuery();
        var_dump($data);
        $this->assertEquals(true, $data[0]);
    }

    public function testWhitelist(){
        $messageModel = new ChatroomMesage($this->getConfig());
        $data = $messageModel->whitelistAdd(['RC:VcMsg']);
        var_dump($data);
        $data = $messageModel->whitelistQuery();
        var_dump($data);
        $data = $messageModel->whitelistRemove(['RC:VcMsg']);
        var_dump($data);
        $data = $messageModel->whitelistQuery();
        var_dump($data);
        $this->assertEquals(true, $data[0]);
    }

}