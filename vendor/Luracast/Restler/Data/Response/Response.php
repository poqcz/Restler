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

	/** @var  \Exception|null */
	protected $_errorException;

	/**
	 * @param mixed $data
	 * @param \Luracast\Restler\Data\Response\Header $header
	 * @param null|\Exception $errorException
	 */
    function __construct($data, $header,\Exception $errorException = null)
    {
        $this->_data = $data;
        $this->_header = $header;
		$this->_errorException = $errorException;
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

	/**
	 * @return null|\Exception
	 */
	public function getErrorException()
	{
		return $this->_errorException;
	}

	/**
	 * @return bool
	 */
	public function isError()
	{
		return !is_null($this->_errorException);
	}

} 