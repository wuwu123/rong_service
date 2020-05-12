<?php

declare(strict_types=1);

namespace RongLib\Config;

class Notification implements ConditionArray
{
    protected $alert = '';

    protected $ios;

    protected $android;

    public function getAlert(): string
    {
        return $this->alert;
    }

    /**
     * @return $this
     */
    public function setAlert(string $alert)
    {
        $this->alert = $alert;
        return $this;
    }

    public function getIos()
    {
        return $this->ios;
    }

    /**
     * @param null $ios
     * @return $this
     */
    public function setIos($ios)
    {
        $this->ios = $ios;
        return $this;
    }

    public function getAndroid()
    {
        return $this->android;
    }

    /**
     * @param null $android
     * @return $this
     */
    public function setAndroid($android)
    {
        $this->android = $android;
        return $this;
    }

    public function getParams(): array
    {
        $notify['alert'] = $this->alert;
        if ($this->ios) {
            $notify['ios'] = $this->ios;
        }
        if ($this->android) {
            $notify['android'] = $this->android;
        }
        return $notify;
    }
}
