<?php

declare(strict_types=1);

namespace RongLib\Code;

class ParentsHelp
{
    /**
     * 获取用户参数.
     * @return mixed|string
     */
    public static function getUserParams(array $userIds)
    {
        $userString = array_pop($userIds);
        foreach ($userIds as $userId) {
            $userString .= '&userId=' . $userId;
        }
        return $userString;
    }

    /**
     * 消息类型.
     * @param string $queryKey
     * @return mixed|string
     */
    public static function objectNameParams(array $objectNameArray, $queryKey = 'objectName')
    {
        $objectNameString = array_pop($objectNameArray);
        foreach ($objectNameArray as $objectName) {
            $objectNameString .= '&' . $queryKey . '=' . $objectName;
        }
        return $objectNameString;
    }
}
