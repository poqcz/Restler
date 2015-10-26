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

	public function __construct()
	{
		$this->_data = array();
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
	 * @return \Luracast\Restler\Data\Response\HeaderKey[]
	 */
	public function getAll()
	{
		return $this->_data;
	}

	/**
	 * @return string
	 */
	public function __toString()
	{
		$string = '';
		foreach($this->getAll() as $header_key)
		{
			$string .= $header_key."\r\n";
		}
		return $string."\r\n";
	}

} 