<?php

class Logger
{
	protected $_hFile = null;

	const FILE_NAME = "log.txt";

	public function append(string $str) 
	{
		$str = date("Y-m-d H:i:s\t") . $str;
		file_put_contents(Logger::FILE_NAME, $str);
	}
}