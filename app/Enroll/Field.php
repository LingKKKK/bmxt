<?php

namespace App\Enroll;

use InvalidArgumentException;
use Closure;
use Illuminate\Support\Collection;

class Field
{

    protected $name;

    protected $type;

    protected $labeltext;

    protected $attributes;

    public function __construct($name, $type, $labeltext, array $attributes = [])
    {

        if(empty($name)) {
            throw new \InvalidArgumentException('Please supply a valid name.');
        }
        if(empty($type)) {
            throw new \InvalidArgumentException('Please supply a valid type.');
        }
        if(empty($labeltext)) {
            throw new \InvalidArgumentException('Please supply a valid labeltext.');
        }

        $this->name = $name;
        $this->type = $type;
        $this->labeltext = $labeltext;
        $this->attributes = collect($attributes);

    }

    public function __get($attribute)
    {
        if(property_exists($this, $attribute)) {
            return $this->{$attribute};
        }

        if ($this->attributes->has($attribute)) {
            return $this->attributes[$attribute];
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

        if ($attribute === 'datatype') {
            return isset($this->attribute['datatype']) ? $this->attributes['datatype'] : null;
        }

        return null;
    }

}