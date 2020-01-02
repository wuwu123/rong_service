<?php

declare(strict_types=1);

namespace RongLib\Config;

class UserObject
{
    private $id;

    private $name;

    private $icon;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getIcon()
    {
        return $this->icon;
    }

    public static function make($id, $name, $icon)
    {
        $model = new UserObject();
        $model->id = $id;
        $model->name = $name;
        $model->icon = $icon;
        return $model;
    }

    public function getData()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'icon' => $this->icon,
        ];
    }
}
