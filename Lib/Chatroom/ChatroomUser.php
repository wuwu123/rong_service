<?php

declare(strict_types=1);

namespace RongLib\Chatroom;

use RongLib\Request;

/**
 * 聊天室用户基础信息
 * Class RongUser.
 */
class ChatroomUser extends Request
{
    public const TIME_ASC = 1;

    public const TIME_DESC = 2;

    public const MAX_COUNT = 500;

    /**
     * @param $count
     * @param int $order
     * @throws \Throwable
     * @return array
     */
    public function list(string $roomId, $count, $order = self::TIME_ASC)
    {
        if ($count > self::MAX_COUNT) {
            throw new \Exception('最大查询个数' . self::MAX_COUNT);
        }
        return $this->postUrlencoded('/chatroom/user/query', ['chatroomId' => $roomId, 'count' => $count, 'order' => $order]);
    }

    /**
     * 查看用户是否存在.
     * @throws \Throwable
     * @return array
     */
    public function exist(string $roomId, string $userId)
    {
        $params = [
            'chatroomId' => $roomId,
            'userId' => $userId,
        ];
        return $this->postUrlencoded('/chatroom/user/exist', $params);
    }

    /**
     * 批量查询用户是否存在.
     * @throws \Throwable
     * @return array
     */
    public function exitBatch(string $roomId, array $userIdArray)
    {
        $params = [
            'chatroomId' => $roomId,
            'userId' => $userIdArray,
        ];
        return $this->postUrlencoded('/chatroom/users/exist', $params);
    }

    /**
     * 聊天室添加报名单，防止被移出，每个房间最多五个管理员.
     * @throws \Throwable
     * @return array
     */
    public function whitelistAdd(string $roomId, array $userIdArray)
    {
        return $this->postUrlencoded('/chatroom/user/whitelist/add', [
            'chatroomId' => $roomId,
            'userId' => $userIdArray,
        ]);
    }

    /**
     * 移出白名单.
     * @throws \Throwable
     * @return array
     */
    public function whitelistRemove(string $roomId, array $userIdArray)
    {
        return $this->postUrlencoded('/chatroom/user/whitelist/remove', [
            'chatroomId' => $roomId,
            'userId' => $userIdArray,
        ]);
    }

    /**
     * 查询聊天室白名单.
     * @throws \Throwable
     * @return array
     */
    public function whitelistQuery(string $roomId)
    {
        return $this->postUrlencoded('/chatroom/user/whitelist/query', [
            'chatroomId' => $roomId,
        ]);
    }
}
