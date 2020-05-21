<?php

declare(strict_types=1);

namespace RongLib\Message\Chatroom;

use RongLib\Config\MessageType\AbstractMessage;
use RongLib\Request;

class ChatroomPublish extends Request
{
    /**
     * 向指定的聊天室发送消息.
     * @param $sendUserId
     * @param $roomId
     * @throws \Throwable
     * @return array
     */
    public function room($sendUserId, $roomId, AbstractMessage $message)
    {
        $requestParams = [
            'fromUserId' => (string) $sendUserId,
            'toChatroomId' => (string) $roomId,
            'objectName' => $message->getMessageType(),
            'content' => $message->getParamsString(),
        ];
        return $this->postUrlencoded('/message/chatroom/publish', $requestParams);
    }

    /**
     * 向所有聊天室发送消息 ， 单个应用每秒最多调用 1 次。
     * @param $sendUserId
     * @throws \Throwable
     * @return array
     */
    public function broadcast($sendUserId, AbstractMessage $message)
    {
        $requestParams = [
            'fromUserId' => (string) $sendUserId,
            'objectName' => $message->getMessageType(),
            'content' => $message->getParamsString(),
        ];
        return $this->postUrlencoded('/message/chatroom/broadcast', $requestParams);
    }
}
