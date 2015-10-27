<?php
namespace Luracast\Restler\Data\Response;

/**
 * Class HeaderKey
 * @package Luracast\Restler\Data\Response
 * @author Vojta Brozek <vojtech.brozek@mobilbonus.cz>
 */
class HeaderKey
{
	/** @var string */
	protected $_key;
	/** @var string */
	protected $_value;

	/**
	 * @param string|null $key
	 * @param string $value
	 */
	function __construct($key, $value)
	{
		$this->_key = $key;
		$this->_value = $value;
	}

	/**
	 * @return string|null
	 */
	public function getKey()
	{
		return $this->_key;
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
	public function __toString()
	{
		if(is_null($this->_key))
		{
			return $this->_value;
		}
		return $this->_key.': '.$this->_value;
	}
} 