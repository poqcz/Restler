<?php
namespace Luracast\Restler\Data\Request;

/**
 * Class Header
 * @package Luracast\Restler\Data\Request
 * @author Vojta Brozek <vojtech.brozek@mobilbonus.cz>
 */
class Header
{
    /** @var \Luracast\Restler\Data\Request\HeaderKey[] */
    protected $keys;

    /**
     * @param \Luracast\Restler\Data\Request\HeaderKey[] $keys
     */
    function __construct(array $keys)
    {
        $this->keys = $keys;
    }

    /**
     * @param string $string_key
     * @return \Luracast\Restler\Data\Request\HeaderKey|null
     */
    public function get($string_key)
    {
        foreach($this->keys as $key)
        {
            if($key->getKey() == $string_key)
            {
                return $key;
            }
        }
        return null;
    }
} 