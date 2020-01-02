<?php

declare(strict_types=1);

namespace Lib\Message\Person;

use Lib\Config\MessageType\AbstractMessage;
use Lib\Config\UserObject;
use Lib\Request;

class Person extends Request
{
    /**
     * 发送私人信息.
     * @param $senderId
     * @param $targetId
     * @throws \Throwable
     * @return array
     */
    public function send($senderId, $targetId, AbstractMessage $message, ?UserObject $userObject)
    {
        $requestParams = [
            'fromUserId' => $senderId,
            'toUserId' => $targetId,
            'objectName' => $message->getMessageType(),
            'content' => $message->getParamsString(),
        ];
        if ($userObject && $targetId == $userObject->getId()) {
            $requestParams['user'] = $userObject->getData();
        }
        return $this->post('/message/private/publish.json', $requestParams);
    }
}