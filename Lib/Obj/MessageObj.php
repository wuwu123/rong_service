<?php

declare(strict_types=1);

namespace RongLib\Obj;

class MessageObj extends BaseObj
{
    /**
     * 二人会话.
     */
    public const CHANNEL_TYPE_PERSON = 'PERSON';

    /**
     * 讨论组会话.
     */
    public const CHANNEL_TYPE_PERSONS = 'PERSONS';

    /**
     * 群组会话.
     */
    public const CHANNEL_TYPE_GROUP = 'GROUP';

    /**
     * 聊天室会话.
     */
    public const CHANNEL_TYPE_TEMPGROUP = 'TEMPGROUP';

    /**
     * 客服会话.
     */
    public const CHANNEL_TYPE_CUSTOMERSERVICE = 'CUSTOMERSERVICE';

    /**
     * 系统通知.
     */
    public const CHANNEL_TYPE_NOTIFY = 'NOTIFY';

    /**
     * 应用公众服务
     */
    public const CHANNEL_TYPE_MC = 'MC';

    /**
     * 公众服务
     */
    public const CHANNEL_TYPE_MP = 'MP';

    public $fromUserId;

    /**
     * 目标 Id，即为客户端 targetId，根据会话类型 channelType 的不同，可能为二人会话 Id、群聊 Id、聊天室 Id、客服 Id 等.
     */
    public $toUserId;

    /**
     * 文本消息 RC:TxtMsg 、 图片消息 RC:ImgMsg 、语音消息 RC:VcMsg 、图文消息 RC:ImgTextMsg 、位置消息 RC:LBSMsg 、添加联系人消息 RC:ContactNtf 、提示条通知消息 RC:InfoNtf 、资料通知消息 RC:ProfileNtf 、通用命令通知消息 RC:CmdNtf.
     */
    public $objectName;

    public $content;

    /**
     * 二人会话是 PERSON 、讨论组会话是 PERSONS 、群组会话是 GROUP 、聊天室会话是 TEMPGROUP 、客服会话是 CUSTOMERSERVICE 、 系统通知是 NOTIFY 、应用公众服务是 MC 、公众服务是 MP。对应客户端 SDK 中 ConversationType 类型，二人会话是 1 、讨论组会话是 2 、群组会话是 3 、聊天室会话是 4 、客服会话是 5 、 系统通知是 6 、应用公众服务是 7 、公众服务是 8.
     */
    public $channelType;

    public $msgTimestamp;

    /**
     * 可通过 msgUID 确定消息唯一
     */
    public $msgUID;

    /**
     * 消息中是否含有敏感词标识，0 为不含有敏感词，1 为含有屏蔽敏感词，2 为含有替换敏感词。消息路由功能默认含有屏蔽敏感词的消息不进行路由，可提交工单开通含有敏感词的消息路由功能，未开通情况下 sensitiveType 值默认为 0 不代表任何意义。开通后可通过该属性判断消息中是否含有敏感词。目前支持单聊、群聊、聊天室会话类型，其他会话类型默认为 0 ，开通后含有屏蔽敏感词的消息也不会进行下发，只会进行消息路由。
     */
    public $sensitiveType;

    /**
     * ：iOS、Android、Websocket、MiniProgram（小程序）、Server（通过 Server API 发送，需要开通 Server API 发送消息进行消息路由功能）。目前支持单聊、群聊会话类型，其他会话类型为空。
     */
    public $source;

    /**
     * channelType 为 GROUP 时此参数有效，显示为群组中指定接收消息的用户 ID 数组，该条消息为群组定向消息。非定向消息时内容为空，如指定的用户不在群组中内容也为空.
     */
    public $groupUserIds;

    /**
     * @param mixed $fromUserId
     * @return $this
     */
    public function setFromUserId($fromUserId)
    {
        $this->fromUserId = $fromUserId;
        return $this;
    }

    /**
     * @param mixed $toUserId
     * @return $this
     */
    public function setToUserId($toUserId)
    {
        $this->toUserId = $toUserId;
        return $this;
    }

    /**
     * @param mixed $objectName
     * @return $this
     */
    public function setObjectName($objectName)
    {
        $this->objectName = $objectName;
        return $this;
    }

    /**
     * @param mixed $content
     * @return $this
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @param mixed $channelType
     * @return $this
     */
    public function setChannelType($channelType)
    {
        $this->channelType = $channelType;
        return $this;
    }

    /**
     * @param mixed $msgTimestamp
     * @return $this
     */
    public function setMsgTimestamp($msgTimestamp)
    {
        $this->msgTimestamp = $msgTimestamp;
        return $this;
    }

    /**
     * @param mixed $msgUID
     * @return $this
     */
    public function setMsgUID($msgUID)
    {
        $this->msgUID = $msgUID;
        return $this;
    }

    /**
     * @param mixed $sensitiveType
     * @return $this
     */
    public function setSensitiveType($sensitiveType)
    {
        $this->sensitiveType = $sensitiveType;
        return $this;
    }

    /**
     * @param mixed $source
     * @return $this
     */
    public function setSource($source)
    {
        $this->source = $source;
        return $this;
    }

    /**
     * @param mixed $groupUserIds
     * @return $this
     */
    public function setGroupUserIds($groupUserIds)
    {
        $this->groupUserIds = $groupUserIds;
        return $this;
    }
}
