<?php

declare(strict_types=1);

namespace RongLib\Config\MessageType;

abstract class AbstractMessage
{
    const  MESSAGE_TXT = 'RC:TxtMsg';

    const  MESSAGE_IMG = 'RC:ImgMsg';

    const  MESSAGE_VC = 'RC:VcMsg';

    const  MESSAGE_IMG_TXT = 'RC:ImgTextMsg';

    const  MESSAGE_FILE = 'RC:FileMsg';

    const  MESSAGE_LBS = 'RC:LBSMsg';

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

    abstract public function getParams(): array;
}
