<?php 

use Elchroy\DSA\Structures\Stack;

class StackTest extends PHPUnit_Framework_TestCase {

	private $stack;

	public function setUp() {
		$this->stack = new Stack();
	}

	public function testStackInitializedWithEmptyList() {
		$data = $this->stack->getData();

		$this->assertEquals([], $data);
		$this->assertTrue($this->stack->isEmpty());
	}

	public function testStackCanAddNewItemsToTheTop() {
		$this->stack->push(1);
		$this->stack->push("s");

		$this->assertEquals([1, "s"], $this->stack->getData());
		$this->assertNotEquals(["s", 1], $this->stack->getData());
		$this->assertNotTrue($this->stack->isEmpty());
	}

	public function testStackCanPopTheLastElementAndStackReducesByOne() {
		$this->stack->push("one");
		$this->stack->push("two");

		$last = $this->stack->pop();

		$this->assertEquals("two", $last);
		$this->assertNotEquals("one", $last);
		$this->assertEquals(["one"], $this->stack->getData());
	}

	public function testStackHasTheCorrectCount() {
		$this->stack->push(2);
		$this->stack->push(2);
		$this->stack->push(2);

		$this->assertEquals(3, $this->stack->size());
	}

	public function testStackCanStoreAnArrayOfInputs() {
		$this->stack->push("first");
		$this->stack->push([1,2,3,4,5]);

		$this->assertEquals(["first",1,2,3,4,5], $this->stack->getData());
	}
}