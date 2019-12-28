<?php

namespace Lib\Message\Person;

use Lib\Config\MessageType\AbstractMessage;
use Lib\Config\UserObject;
use Lib\Request;

class Person extends Request
{
    /**
     * 发送私人信息
     * @param $senderId
     * @param $targetId
     * @param AbstractMessage $message
     * @param UserObject|null $userObject
     * @return array
     * @throws \Throwable
     */
    public function send($senderId, $targetId, AbstractMessage $message, ?UserObject $userObject)
    {
        $requestParams = [
            'senderId' => $senderId,
            'targetId' => $targetId,
            'objectName' => $message->getMessageType(),
            'content' => $message->getParams(),
        ];
        if ($userObject && $targetId == $userObject->getId()) {
            $requestParams['user'] = $userObject->getData();
        }
        return $this->post('/message/private/publish.json', $requestParams);
    }

}