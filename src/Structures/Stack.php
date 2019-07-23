<?php 

namespace Elchroy\DSA\Structures;

use Elchroy\DSA\Interfaces\StackInterface;

/**
* Stack : bottom -> [] <- top
*/
class Stack {
	private $storage;
	private $length;

	public function __construct () {
		$this->storage = [];
		$this->length = 0;
	}

	public function pop () {
		if ($this->length) {
			$value = $this->storage[$this->length - 1];
			unset($this->storage[$this->length - 1]);
			$this->length--;
			return $value;
		}
		return null;
	}

	public function peek () {
		if ($this->length) {
			$value = $this->storage[$this->length - 1];
			return $value;
		}
		return null;
	}

	public function push ($value) {
		$this->storage[$this->length] = $value;
		$this->length++;
	}

	public function isEmpty () {
		return $this->length === 0;
	}

	public function getData () {
		return $this->storage;
	}
}