<?php

declare(strict_types=1);

namespace RongLib\Obj;

class BaseObj extends \stdClass
{
    public function setData(array $data)
    {
        foreach ($data as $key => $value) {
            $function = 'set' . ucfirst($key);
            if (method_exists($this, $function)) {
                $this->{$function}($value);
                continue;
            }
            if (isset($this->{$key})) {
                $this->{$key} = $value;
            }
        }
    }
}
