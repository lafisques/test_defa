<?php

require_once "init.php";

/**
 * Правильнее от абстрактного валидатора наследовать более специфичные 
 * реализации и создавать их фабрикой, но в рамках данной небольшой задачи и 
 * ограничения по времени - смысла в этом, судя по всему, нет
 */
class Validator
{
	/**
	 * @param string $value
	 * @return bool
	 */
	public function validateNotEmpty(string $value) 
	{
		return true;
	}

	/**
	 * @param string $value
	 * @return bool
	 */
	public function validateEmail(string $value)
	{
		return true;
	}
	
	/**
	 * @param string $value
	 * @return bool
	 */
	public function validatePhone(string $value)
	{
		return true;
	}
}

class FormRequest
{
	protected $_name = "";
	protected $_phone = "";
	protected $_email = "";
	protected $_comment = "";
	protected $_validator = none;

	public function __construct(array $data)
	{
		$this->_validator = new Validator();
	}

	public function validate()
	{
		$valide = true;
		//if($this->_validator->)
	}

	/**
	 * @param array $data
	 * @return null
	 */
	public function setData($data)
	{
		$this->_name = $data["name"];
		$this->_phone = $data["phone"];
		$this->_email = $data["email"];
		$this->_comment = $data["comment"];
	}

	public function getName() { return $this->_name; }
	public function getEmail() { return $this->_email; }
	public function getPhone() { return $this->_phone; }
	public function getComment() { return $this->_comment; }
}

$log = new Logger();
$response = new Response();
$formRequest = new FormRequest();

var_dump($_REQUEST);

switch ($_REQUEST['mode']) {
	case 'send':
		/**
		 * Request validation
		 * 
		 */
		$formRequest->setData($_REQUEST);
		if($formRequest->valide()) {
			$message = $formRequest->getName() . "\n" .
				$formRequest->getEmail() . "\n" .
				$formRequest->getPhone() . "\n" .
				$formRequest->getComment();

			mail("test@test.ru", "Message", $message);
		}
		break;
	default:
		break;
}

$response->printResponse();
exit;