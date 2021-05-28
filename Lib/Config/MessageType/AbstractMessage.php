<?php

declare(strict_types=1);

namespace RongLib\Config\MessageType;

use RongLib\Config\ConditionArray;

abstract class AbstractMessage implements ConditionArray
{
    public const  MESSAGE_TXT = 'RC:TxtMsg';

    public const  MESSAGE_IMG = 'RC:ImgMsg';

    public const  MESSAGE_VC = 'RC:VcMsg';

    public const  MESSAGE_IMG_TXT = 'RC:ImgTextMsg';

    public const  MESSAGE_FILE = 'RC:FileMsg';

    public const  MESSAGE_LBS = 'RC:LBSMsg';

    protected $extra = '';

    protected $messageType;

    /**
     * @param mixed $extra
     * @return $this
     */
    public function setExtra($extra)
    {
        $this->extra = $extra;
        return $this;
    }

    /**
     * @return static
     */
    public static function make()
    {
        return new static();
    }

    public function getParamsString(): string
    {
        return json_encode($this->getParams());
    }

    abstract public function getMessageType(): string;
}
