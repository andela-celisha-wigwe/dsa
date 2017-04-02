<?php 

namespace Elchroy\DSA\Structures;

use Elchroy\DSA\Interfaces\StackInterface;

/**
* Stack : bottom -> [] <- top
*/
class Stack implements StackInterface {
	private $list;

	public function __construct() {
		$this->list = [];
	}

	public function pop() {
		return array_pop($this->list);
	}

	public function push($item) {
		if (is_array($item)) {
			foreach ($item as $i) {
				array_push($this->list, $i);
			}
		} else {
			array_push($this->list, $item);
		}
		return $this;
	}

	public function isEmpty() {
		return $this->size() <= 0;
	}

	public function size() {
		return count($this->list);
	}

	public function getData() {
		return $this->list;
	}
}