<?php
namespace Luracast\Restler\Data\Request;

/**
 * Class Request
 * @package Luracast\Restler\Data\Request
 * @author Vojta Brozek <vojtech.brozek@mobilbonus.cz>
 */
class Request
{
    /** @var string */
    protected $_path;
    /** @var \Luracast\Restler\Data\Request\Header */
    protected $_header;
    /** @var string */
    protected $_version;
    /** @var string */
    protected $_methotd;
    /** @var \Luracast\Restler\Data\Request\Query */
    protected $_query;
    /** @var string */
    protected $_body;

    /**
     * @param string $body
     * @param \Luracast\Restler\Data\Request\Header $header
     * @param string $methotd
     * @param string $path
     * @param \Luracast\Restler\Data\Request\Query $query
     * @param string $version
     */
    function __construct($body,\Luracast\Restler\Data\Request\Header $header, $methotd, $path,\Luracast\Restler\Data\Request\Query $query, $version)
    {
        $this->_body = $body;
        $this->_header = $header;
        $this->_methotd = $methotd;
        $this->_path = preg_replace('/^\/{1}/','',$path,1);
        $this->_query = $query;
        $this->_version = 'HTTP/'.$version;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->_body;
    }

    /**
     * @return \Luracast\Restler\Data\Request\Header
     */
    public function getHeader()
    {
        return $this->_header;
    }

    /**
     * @return string
     */
    public function getMethotd()
    {
        return $this->_methotd;
    }

    /**
     * @return \Luracast\Restler\Data\Request\Query
     */
    public function getQuery()
    {
        return $this->_query;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->_path;
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->_version;
    }

}