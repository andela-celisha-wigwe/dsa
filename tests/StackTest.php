<?php 

use Elchroy\DSA\Structures\Stack;
use PHPUnit\Framework\TestCase;

class StackTest extends TestCase {

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

		$data = $this->stack->getData();

		$this->assertEquals([1, "s"], $data);
		$this->assertNotEquals(["s", 1], $data);
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

	public function testStackCanPeekToTheLastElementWithoutRemovingIt() {
		$this->stack->push("two");
		$this->stack->push("one");

		$last = $this->stack->peek();

		$this->assertEquals("one", $last);
		$this->assertNotEquals("two", $last);
		$this->assertEquals(["two", "one"], $this->stack->getData());
	}

	public function testStackReturnsNullWhenEmpty() {
		$last = $this->stack->pop();
		$this->assertEquals(null, $last);
	}

	public function testStackCanStoreAnArrayOfInputs() {
		// $this->stack->push("first");
		// $this->stack->pushAll( [1,2,3,4,5] );

		// $this->assertEquals(["first",1,2,3,4,5], $this->stack->getData());
	}
}