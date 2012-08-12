<?php
namespace Luracast\Restler\Validate;

use JsonSerializable;

class ValueObject implements iValueObject, JsonSerializable {

    public function __toString()
    {
        return ' new ' . get_called_class () . '() ';
    }

    public static function __set_state(array $properties)
    {
        $class = get_called_class ();
        $instance = new $class ();
        $vars = get_object_vars ( $instance );
        foreach ($properties as $property => $value) {
            if (property_exists ( $instance, $property )) {
                // see if the property is accessible
                if (array_key_exists ( $property, $vars )) {
                    $instance->{$property} = $value;
                } else {
                    $method = 'set' . ucfirst ( $property );
                    if (method_exists ( $instance, $method )) {
                        call_user_func ( array (
                                $instance,
                                $method
                        ), $value );
                    }
                }
            }
        }
        return $instance;
    }

    public function jsonSerialize()
    {
        $r = get_object_vars ( $this );
        $methods = get_class_methods ( $this );
        foreach ($methods as $m) {
            if (substr ( $m, 0, 3 ) == 'get') {
                $r [lcfirst ( substr ( $m, 3 ) )] = @$this->{$m} ();
            }
        }
        return $r;
    }
}