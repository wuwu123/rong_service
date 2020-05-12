<?php

declare(strict_types=1);

namespace RongLib\Config;

class AudienceCondition implements ConditionArray
{
    protected $tag = [];

    protected $tagOr = [];

    protected $userid = [];

    protected $isOrAll = false;

    public function getTag(): array
    {
        return $this->tag;
    }

    /**
     * @return $this
     */
    public function setTag(array $tag)
    {
        $this->tag = $tag;
        return $this;
    }

    public function getTagOr(): array
    {
        return $this->tagOr;
    }

    /**
     * @return $this
     */
    public function setTagOr(array $tagOr)
    {
        $this->tagOr = $tagOr;
        return $this;
    }

    public function getUserid(): array
    {
        return $this->userid;
    }

    /**
     * @return $this
     */
    public function setUserid(array $userid)
    {
        $this->userid = $userid;
        return $this;
    }

    public function isOrAll(): bool
    {
        return $this->isOrAll;
    }

    /**
     * @return $this
     */
    public function setIsOrAll(bool $isOrAll)
    {
        $this->isOrAll = $isOrAll;
        return $this;
    }

    public function getParams(): array
    {
        $condution = [];
        $this->tag && $condution['tag'] = $this->tag;
        $this->tagOr && $condution['tag_or'] = $this->tagOr;
        $this->userid && $condution['userid'] = $this->userid;
        $condution['is_to_all'] = $this->isOrAll;
        return $condution;
    }
}
