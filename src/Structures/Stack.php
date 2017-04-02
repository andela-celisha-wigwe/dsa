<?php 

namespace Elchroy\DSA;

use Elchroy\DSA\Interfaces\StackInterface;

/**
* Stack : bottom -> [] <- top
*/
class ClassName implements StackInterface {
	private $list;

	public function __construct() {
		$this->list = [];
	}

	public function pop() {
		return array_pop($this->list);
	}

	public function push($item) {
		array_push($this->list, $item);
		return $this;
	}

	public function peek() {

	}

	public funciton isEmpty() {
		return $this->size() <= 0;
	}

	public function size() {
		return count($this->list);
	}

	public function display() {
		var_dump($this->list);
	}
}