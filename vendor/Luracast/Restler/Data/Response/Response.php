<?php
namespace Luracast\Restler\Data\Response;

/**
 * Class Response
 * @package Luracast\Restler\Data\Response
 * @author Vojta Brozek <vojtech.brozek@mobilbonus.cz>
 */
class Response
{
    /** @var mixed */
    protected $_data;
    /**
     * @var \Luracast\Restler\Data\Response\Header
     */
    protected $_header;

    /**
     * @param mixed $data
     * @param \Luracast\Restler\Data\Response\Header $header
     */
    function __construct($data, $header)
    {
        $this->_data = $data;
        $this->_header = $header;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->_data;
    }

    /**
     * @return \Luracast\Restler\Data\Response\Header
     */
    public function getHeader()
    {
        return $this->_header;
    }

} 