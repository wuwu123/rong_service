<?php

declare(strict_types=1);

namespace RongLib\Obj;

class ChatroomObj extends BaseObj
{
    const STATUS_DEFAULT = 0;

    const STATUS_RONG_RULE = 1;

    const STATUS_GAG = 2;

    const STATUS_DESTROY = 3;

    const TYPE_CREATE = 0;

    const TYPE_JOIN = 1;

    const TYPE_EXIT = 2;

    const TYPE_DESTROY = 3;

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
}
