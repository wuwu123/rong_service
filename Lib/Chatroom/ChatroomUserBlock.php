<?php

declare(strict_types=1);

namespace RongLib\Chatroom;

use RongLib\Request;

class ChatroomUserBlock extends Request
{
    const MAX_BLOCK_MINUTE = 43200;

    /**
     * 添加封禁
     * @throws \Throwable
     * @return array
     */
    public function add(string $roomId, array $userIdArray, int $minute)
    {
        if ($minute > self::MAX_BLOCK_MINUTE) {
            throw new \Exception('最大封禁时间' . self::MAX_GAD_MINUTE . '分钟');
        }
        $userString = $userIdArray;
        return $this->postUrlencoded('/chatroom/user/block/add', ['userId' => $userString, 'chatroomId' => $roomId, 'minute' => $minute]);
    }

    /**
     * 移出封禁
     * @throws \Throwable
     * @return array
     */
    public function rollback(string $roomId, array $userIdArray)
    {
        $userString = $userIdArray;
        return $this->postUrlencoded('/chatroom/user/block/rollback', ['userId' => $userString, 'chatroomId' => $roomId]);
    }
}
