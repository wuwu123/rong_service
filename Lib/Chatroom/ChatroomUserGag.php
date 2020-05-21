<?php

declare(strict_types=1);

namespace RongLib\Chatroom;

use RongLib\Request;

/**
 * 禁言
 * Class RongUserGag.
 */
class ChatroomUserGag extends Request
{
    const MAX_GAD_MINUTE = 43200;

    /**
     * 添加禁言名单.
     * @param array $userId
     * @param int $minute 单位分钟 max=43200
     * @throws \Throwable
     * @throws \Exception
     * @return array
     */
    public function add(string $roomId, array $userIdArray, int $minute = 43200)
    {
        if ($minute > self::MAX_GAD_MINUTE) {
            throw new \Exception('最大禁言时间' . self::MAX_GAD_MINUTE . '分钟');
        }
        $userString = $userIdArray;
        return $this->postUrlencoded('/chatroom/user/gag/add', ['userId' => $userString, 'chatroomId' => $roomId, 'minute' => $minute]);
    }

    /**
     * 移出禁言名单.
     * @throws \Throwable
     * @return array
     */
    public function rollback(string $roomId, array $userIdArray)
    {
        $userString = $userIdArray;
        return $this->postUrlencoded('/chatroom/user/gag/rollback', ['userId' => $userString, 'chatroomId' => $roomId]);
    }
}
