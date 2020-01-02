<?php

declare(strict_types=1);

namespace Lib\Config\MessageType;

class ImgMsg extends AbstractMessage
{
    public $isFull = true;

    protected $imageUrl = '';

    /**
     * @return $this
     */
    public function setImageUrl(string $imageUrl)
    {
        $this->imageUrl = $imageUrl;
        return $this;
    }

    /**
     * @return $this
     */
    public function setIsFull(bool $isFull)
    {
        $this->isFull = $isFull;
        return $this;
    }

    public function getMessageType(): string
    {
        return self::MESSAGE_IMG;
    }

    public function getParams(): array
    {
        return [
            'content' => $this->getContent(),
            'imageUri' => $this->imageUrl,
            'extra' => $this->extra,
        ];
    }

    protected function getContent()
    {
        if ($this->imageUrl && $this->isFull != true) {
            return file_get_contents($this->imageUrl);
        }
        return '';
    }
}
