<?php
namespace Luracast\Restler\Data\Request;

/**
 * Class Query
 * @package Luracast\Restler\Data\Request
 * @author Vojta Brozek <vojtech.brozek@mobilbonus.cz>
 */
class Query
{
    /**
     * @var mixed[]
     */
    protected $_data;

    /**
     * @param mixed[] $data
     */
    public function __construct(array $data)
    {
        $this->_data = $data;
    }

    /**
     * @return mixed[]
     */
    public function getAll()
    {
        return $this->_data;
    }
} 