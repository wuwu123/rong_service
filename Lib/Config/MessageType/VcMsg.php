<?php

declare(strict_types=1);

namespace RongLib\Config\MessageType;

class VcMsg extends AbstractMessage
{
    protected $content;

    protected $duration = 0;

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
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

    public function getDuration(): int
    {
        return $this->duration;
    }

    /**
     * @return $this
     */
    public function setDuration(int $duration)
    {
        $this->duration = $duration;
        return $this;
    }

    public function getMessageType(): string
    {
        return parent::MESSAGE_VC;
    }

    public function getParams(): array
    {
        return [
            'content' => $this->content,
            'duration' => $this->duration,
            'extra' => $this->extra,
        ];
    }
}
