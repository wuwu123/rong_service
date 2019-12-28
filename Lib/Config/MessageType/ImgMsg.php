<?php


namespace Lib\Config\MessageType;


class ImgMsg extends AbstractMessage
{
    public $isFull = true;

    protected $imageUrl = '';

    /**
     * @param string $imageUrl
     * @return $this
     */
    public function setImageUrl(string $imageUrl)
    {
        $this->imageUrl = $imageUrl;
        return $this;
    }

    /**
     * @param bool $isFull
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

    protected function getContent()
    {
        if ($this->imageUrl && $this->isFull != true) {
            return file_get_contents($this->imageUrl);
        }
        return '';
    }

    public function getParams(): array
    {
        return [
            'content' => $this->getContent(),
            'imageUri' => $this->imageUrl,
            'extra' => $this->extra,
        ];
    }

}