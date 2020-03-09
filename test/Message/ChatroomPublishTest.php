<?php


namespace RongTest\Message;


use RongLib\Config\MessageType\TxtMsg;
use RongLib\Config\UserObject;
use RongLib\Message\Chatroom\ChatroomPublish;
use RongLib\Message\Person\Person;
use RongTest\Request;

class ChatroomPublishTest extends Request
{
    public function testRoomPublish()
    {
        $person = new ChatroomPublish($this->getConfig());
        $message = new TxtMsg();
        $message->setContent('我是测试');
        $data = $person->room(1577757783681963, 1, $message);
        $this->assertEquals(true, $data[0]);
    }

    public function testBroadcast()
    {
        $person = new ChatroomPublish($this->getConfig());
        $message = new TxtMsg();
        $message->setContent('我是测试');
        $data = $person->broadcast(1577757783681963, $message);
        $this->assertEquals(true, $data[0]);
    }

}