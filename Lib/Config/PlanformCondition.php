<?php

declare(strict_types=1);

namespace RongLib\Config;

class PlanformCondition implements ConditionArray
{
    public $platform = [];

    /**
     * @return $this
     */
    public function addIos()
    {
        $this->platform['ios'] = ['ios'];
        return $this;
    }

    /**
     * @return $this
     */
    public function addAndroid()
    {
        $this->platform['android'] = ['android'];
        return $this;
    }

    /**
     * @return PlanformCondition
     */
    public function all()
    {
        return $this->addAndroid()->addIos();
    }

    public function getParams(): array
    {
        return array_values($this->platform);
    }
}
