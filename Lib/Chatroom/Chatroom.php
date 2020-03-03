<?php

declare(strict_types=1);

namespace RongLib\Chatroom;

use RongLib\Request;

/**
 * 聊天室创建 销毁 和 查询
 * Class Chatroom.
 */
class Chatroom extends Request
{
    /**
     * 创建聊天室.
     * @throws \Throwable
     * @return array
     */
    public function create(string $roomId, string $name)
    {
        return $this->post('/chatroom/create', ['chatroom[' . $roomId . ']' => $name]);
    }

    /**
     * 销毁聊天室.
     * @throws \Throwable
     * @return array
     */
    public function destroy(string $roomId)
    {
        return $this->post('/chatroom/destroy', ['chatroomId' => $roomId]);
    }

    /**
     * 销毁聊天室.
     * @throws \Throwable
     * @return array
     */
    public function query(string $roomId)
    {
        return $this->post('/chatroom/query', ['chatroomId' => $roomId]);
    }

    /**
     * 保活，防止一个小时无人发信被销毁
     * @throws \Throwable
     * @return array
     */
    public function keepaliveAdd(string $roomId)
    {
        return $this->post('/chatroom/keepalive/add', ['chatroomId' => $roomId]);
    }

    /**
     * 取消保活.
     * @throws \Throwable
     * @return array
     */
    public function keepaliveRemove(string $roomId)
    {
        return $this->post('/chatroom/keepalive/remove', ['chatroomId' => $roomId]);
    }

    /**
     * 查询保活聊天室名单.
     * @throws \Throwable
     * @return array
     */
    public function keepaliveQuery()
    {
        return $this->post('/chatroom/keepalive/query', []);
    }
}
