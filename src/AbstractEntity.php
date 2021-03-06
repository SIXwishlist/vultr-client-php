<?php

namespace LinkORB\Vultr;

abstract class AbstractEntity
{
    /**
     * @param \stdClass|array|null $parameters
     */
    public function __construct($param = null)
    {
        if (is_object($param) || is_array($param)) {
            if ($param instanceof \stdClass) {
                $param = get_object_vars($param);
            }
            
            foreach ($param as $k => $v) {
                $prop = strtolower($k);

                if (property_exists($this, $prop)) {
                    $this->$prop = $v;
                }
            }
        }
    }
    
    public function __set($prop, $val)
    {
        if (property_exists($this, $prop)) {
            $this->$prop = $val;
        }
    }
    
    public function __get($prop)
    {
        if (property_exists($this, $prop)) {
            return $this->$prop;
        }
    }
}
