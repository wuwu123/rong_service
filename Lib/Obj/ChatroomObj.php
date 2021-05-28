<?php

declare(strict_types=1);

namespace RongLib\Obj;

class ChatroomObj extends BaseObj
{
    public const STATUS_DEFAULT = 0;

    public const STATUS_RONG_RULE = 1;

    public const STATUS_GAG = 2;

    public const STATUS_DESTROY = 3;

    public const TYPE_CREATE = 0;

    public const TYPE_JOIN = 1;

    public const TYPE_EXIT = 2;

    public const TYPE_DESTROY = 3;

    public static $statusShow = [
        self::STATUS_DEFAULT => '直接调用接口',
        self::STATUS_RONG_RULE => '触发融云退出聊天室机制将用户踢出',
        self::STATUS_GAG => '用户被封禁',
        self::STATUS_DESTROY => '触发融云销毁聊天室机制自动销毁',
    ];

    public static $typeShow = [
        self::TYPE_CREATE => '创建聊天室',
        self::TYPE_JOIN => '加入聊天室',
        self::TYPE_EXIT => '退出聊天室',
        self::TYPE_DESTROY => '销毁聊天室',
    ];

    public $chatRoomId;

    public $userIds = [];

    public $status;

    public $type;

    public $time;

    /**
     * @param mixed $chatRoomId
     * @return $this
     */
    public function setChatRoomId($chatRoomId)
    {
        $this->chatRoomId = $chatRoomId;
        return $this;
    }

    /**
     * @return $this
     */
    public function setUserIds(array $userIds)
    {
        $this->userIds = $userIds;
        return $this;
    }

    /**
     * @param mixed $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @param mixed $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param mixed $time
     * @return $this
     */
    public function setTime($time)
    {
        $this->time = $time;
        return $this;
    }
}
