<?php

declare(strict_types=1);

namespace RongLib\Message\Broadcast;

use RongLib\Config\MessageType\AbstractMessage;
use RongLib\Request;

class Broadcast extends Request
{
    /**
     * 广播消息.
     *
     * @param $senderId
     * @param mixed $pushData
     * @throws \Throwable
     * @return array
     */
    public function broadcastSend($senderId, AbstractMessage $message, int $contentAvailable = 0, $pushData = '')
    {
        $requestParams = [
            'fromUserId' => $senderId,
            'objectName' => $message->getMessageType(),
            'content' => $message->getParamsString(),
            'pushContent' => $message->getParamsString(),
            'pushData' => $pushData,
            'contentAvailable' => $contentAvailable,
        ];
        return $this->post('message/broadcast', $requestParams);
    }
}
