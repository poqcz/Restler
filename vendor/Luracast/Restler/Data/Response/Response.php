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

	/** @var  string|null */
	protected $_errorMessage;

	/**
	 * @param mixed $data
	 * @param \Luracast\Restler\Data\Response\Header $header
	 * @param null|string $errorMessage
	 */
    function __construct($data, $header, $errorMessage = null)
    {
        $this->_data = $data;
        $this->_header = $header;
		$this->_errorMessage = $errorMessage;
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
	 * @return null|string
	 */
	public function getErrorMessage()
	{
		return $this->_errorMessage;
	}

	/**
	 * @return bool
	 */
	public function isError()
	{
		return !is_null($this->_errorMessage);
	}

} 