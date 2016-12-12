<?php

class Response
{
	protected $_state = [
		"ERROR" => "SUCCESS",
		"DATA" => [],
	];

	public function setError(string $value)
	{
		$this->_state["ERROR"] = $value;
	}

	public function setData(array $data)
	{
		$this->_state["DATA"] = $data;
	}

	public function printResponse()
	{
		print json_encode($this->_state);
	}
}