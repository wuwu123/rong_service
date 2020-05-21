<?php

declare(strict_types=1);

namespace RongLib\Chatroom;

use RongLib\Request;

/**
 * 消息模块
 * Class Distribution.
 */
class ChatroomMesage extends Request
{
    /**
     * 消息分发，停止分发，其他用户将收不到消息.
     * @throws \Throwable
     * @return array
     */
    public function distributionStop(string $roomId)
    {
        return $this->postUrlencoded('/chatroom/message/stopDistribution', [
            'chatroomId' => $roomId,
        ]);
    }

    /**
     * 恢复分发.
     * @throws \Throwable
     * @return array
     */
    public function distributionResume(string $roomId)
    {
        return $this->postUrlencoded('/chatroom/message/resumeDistribution', [
            'chatroomId' => $roomId,
        ]);
    }

    /**
     * 消息优先级 添加.
     * @throws \Throwable
     * @return array
     */
    public function priorityAdd(array $objectNameArray)
    {
        $params['objectName'] = $objectNameArray;
        return $this->postUrlencoded('/chatroom/message/priority/add', $params);
    }

    /**
     *  消息优先级 移出.
     * @throws \Throwable
     * @return array
     */
    public function priorityRemove(array $objectNameArray)
    {
        $params['objectName'] = $objectNameArray;
        return $this->postUrlencoded('/chatroom/message/priority/remove', $params);
    }

    /**
     * 消息优先级 查询.
     * @throws \Throwable
     * @return array
     */
    public function priorityQuery()
    {
        return $this->postUrlencoded('/chatroom/message/priority/query');
    }

    /**
     * 消息白名单 添加.
     * @throws \Throwable
     * @return array
     */
    public function whitelistAdd(array $objectNameArray)
    {
        $params['objectnames'] = $objectNameArray;
        return $this->postUrlencoded('/chatroom/whitelist/add', $params);
    }

    /**
     * 消息白名单 移出.
     * @throws \Throwable
     * @return array
     */
    public function whitelistRemove(array $objectNameArray)
    {
        $params['objectnames'] = $objectNameArray;
        return $this->postUrlencoded('/chatroom/whitelist/delete', $params);
    }

    /**
     * 消息白名单 查询.
     * @throws \Throwable
     * @return array
     */
    public function whitelistQuery()
    {
        return $this->postUrlencoded('/chatroom/whitelist/query');
    }
}
