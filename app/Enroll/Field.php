<?php

namespace App\Enroll;

use InvalidArgumentException;
use Closure;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Support\Arrayable;
use ArrayAccess;

class Field implements Arrayable, ArrayAccess
{
    protected $name;

    protected $type;

    protected $labeltext;

    protected $attributes;

    public function __construct($name, $type, $labeltext, array $attributes = [])
    {

        if(empty($name)) {
            throw new InvalidArgumentException('Please supply a valid name.');
        }
        if(empty($type)) {
            throw new InvalidArgumentException('Please supply a valid type.');
        }
        if(empty($labeltext)) {
            throw new InvalidArgumentException('Please supply a valid labeltext.');
        }

        $this->name = $name;
        $this->type = $type;
        $this->labeltext = $labeltext;
        $this->attributes = collect($attributes);

    }

    public static function fromAttribute($name, $type, $labeltext, array $attributes = [])
    {
        return new static($name, $type, $labeltext, $attributes);
    }

    public static function fromArray($properties)
    {
        $name = array_get($properties, 'name');
        $type = array_get($properties, 'type');
        $labeltext = array_get($properties, 'labeltext');
        $attributes = (array) array_get($properties, 'attributes');
        return new static($name, $type, $labeltext, $attributes);
    }


    public function items($items)
    {
        $this->attributes['items'] = collect($items);
    }

    public function __get($attribute)
    {
        if(property_exists($this, $attribute)) {
            return $this->{$attribute};
        }

        if($attribute === 'id') {
            return 'input_'.$this->name;
        }
        
        if ($attribute === 'required') {
            return isset($this->attributes['required']) && !! $this->attributes['required'] ? true : false;
        }

        if ($attribute === 'mutiple') {
            return isset($this->attributes['required']) && !! $this->attributes['required'] ? true : false;
        }

        if ($this->attributes->has($attribute)) {
            return $this->attributes[$attribute];
        }


        return null;
    }

    public function __set($attribute, $value)
    {
        if (is_null($attribute)) {
            throw new InvalidArgumentException("wrong key", 1);
        }
        if (property_exists($this, $attribute)) {
            $this->{$attribute} = $value;
        }

        $this->attributes->put($attribute, $value);
    }


    public function offsetExists($key)
    {
        return isset($this->{$key});
    }


    public function offsetGet($key)
    {
        return $this->{$key};
    }

    public function offsetSet($key, $value)
    {
        if (is_null($key)) {
            throw new InvalidArgumentException("wrong key", 1);
        } else {
            $this->{$key} = $value;
        }
    }


    public function offsetUnset($key)
    {
        if (property_exists($this, $key)) {
            throw new \Exception("Illegal action");
        }

        if ($this->attributes->has($key)) {
            unset($this->attributes[$key]);
        }
    }



    public function toArray()
    {
        return [
            'name'  => $this->name,
            'id'    => $this->id,
            'type'  => $this->type,
            'labeltext' => $this->labeltext,
            'required'  => $this->required,
            'attributes' => $this->attributes,
        ];
    }

    public function toJson()
    {
        return json_encode($this->toArray(), JSON_UNESCAPED_UNICODE);
    }

}