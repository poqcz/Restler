<?php
namespace Luracast\Restler\Data\Response;

/**
 * Class Header
 * @package Luracast\Restler\Data\Response
 * @author Vojta Brozek <vojtech.brozek@mobilbonus.cz>
 */
class Header
{
	/**
	 * @var \Luracast\Restler\Data\Response\HeaderKey[]
	 */
	protected $_data;
	/** @var int */
	protected $_status_code;
	/** @var string */
	protected $_version;

	public function __construct()
	{
		$this->_data = array();
		$this->_status_code = 200;
		$this->_version = 'HTTP/1.1';
	}

	/**
	 * @param HeaderKey $new_header_key
	 * @param bool $replace
	 */
	public function set(\Luracast\Restler\Data\Response\HeaderKey $new_header_key,$replace = true)
	{
		if($replace)
		{
			foreach($this->_data as $array_key=>$header_key)
			{
				if($header_key->getKey() === $new_header_key->getKey())
				{
					unset($this->_data[$array_key]);
				}
			}
		}

		$this->_data[] = $new_header_key;
	}

	/**
	 * @param int $status_code
	 */
	public function setStatusCode($status_code)
	{
		$this->_status_code = $status_code;
	}

	/**
	 * @param string $version
	 */
	public function setVersion($version)
	{
		$this->_version = $version;
	}

	/**
	 * @param string $key
	 * @return \Luracast\Restler\Data\Response\HeaderKey|null
	 */
	public function get($key)
	{
		foreach($this->getAll() as $header_key)
		{
			if($header_key->getKey() === $key)
			{
				return $header_key;
			}
		}
		return null;
	}

	/**
	 * @return int
	 */
	public function getStatusCode()
	{
		return $this->_status_code;
	}

	/**
	 * @return string
	 */
	public function getVersion()
	{
		return $this->_version;
	}

	/**
	 * @return \Luracast\Restler\Data\Response\HeaderKey[]
	 */
	public function getAll()
	{
		return $this->_data;
	}

	/**
	 * @return string
	 */
	public function firstLineHeader()
	{
		$string = $this->_version.' '.$this->_status_code.' ';
		$string .= array_key_exists($this->_status_code,\Luracast\Restler\RestException::$codes)
			? \Luracast\Restler\RestException::$codes[$this->_status_code]
			: '' ;
		$string .= "\r\n";
		return $string;
	}

	/**
	 * @return string
	 */
	public function __toString()
	{
		$string = $this->firstLineHeader();
		foreach($this->getAll() as $header_key)
		{
			$string .= $header_key."\r\n";
		}
		return $string."\r\n";
	}

} 