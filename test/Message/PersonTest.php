<?php

declare(strict_types=1);

namespace RongTest\Message;

use RongLib\Config\MessageType\TxtMsg;
use RongLib\Config\UserObject;
use RongLib\Message\Person\Person;
use RongTest\Request;

/**
 * @internal
 * @coversNothing
 */
class PersonTest extends Request
{
    public function testSend()
    {
        $person = new Person($this->getConfig());
        $message = new TxtMsg();
        $message->setContent('我是测试');
        $sendUser = UserObject::make(1577757783681963, '测试', '');
        $data = $person->send(1577757783681963, 1577524103791962, $message, $sendUser);
        $this->assertEquals(true, $data[0]);
    }
}
