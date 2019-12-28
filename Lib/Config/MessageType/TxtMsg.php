<?php


namespace Lib\Config\MessageType;


class TxtMsg extends AbstractMessage
{
    protected $content;

    /**
     * @param mixed $content
     * @return $this
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }


    public function getMessageType(): string
    {
        return self::MESSAGE_TXT;
    }

    public function getParams(): array
    {
        return [
            'content' => $this->content,
            'extra' => $this->extra
        ];
    }
}