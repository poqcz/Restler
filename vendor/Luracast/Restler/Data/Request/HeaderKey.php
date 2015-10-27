<?php
namespace Luracast\Restler\Data\Request;

/**
 * Class HeaderKey
 * @package Luracast\Restler\Data\Request
 * @author Vojta Brozek <vojtech.brozek@mobilbonus.cz>
 */
class HeaderKey
{
    /** @var string */
    protected $_key;
    /** @var string */
    protected $_value;

    /**
     * @param string $key
     * @param string $value
     */
    function __construct($key, $value)
    {
        $this->_key = $key;
        $this->_value = $value;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->_value;
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->_key;
    }

} 