<?php

/**
* DFS Search Algorithm
*/
class Graph {
	public $stack = [];
	public $currentNode;
	public $isEnded = false;

	public function __construct(Node $startNode) {
		$this->currentNode = $startNode;
	}

	public function putNodeInStack (Node $node) {
		$node->setVisited();
		array_push($this->stack, $node);
	}

	public function backTrackFrom() {
		if (end($this->stack)->hasNoUnVisitedNodes()) {
			array_pop($this->stack);
		}

		return $this->stack;
	}

	// public function traverse() {
	// 	if(count($this->stack) < 1 && $this->isEnded) {
	// 		var_dump("Stack is empty");
	// 		return;
	// 	} elseif(count($this->stack) < 1) {
	// 		$this->currentNode = array_rand($this->stack);
	// 	} else {
	// 		$this->currentNode = $this->currentNode->selectRandomNodeFromUnVisitedNodes();
	// 	}
	// }
	// 
	public function search() {
		if($this->currentNode->hasUnVisitedNodes()) {
			$this->putNodeInStack($this->currentNode);
			$this->currentNode = $this->currentNode->selectRandomNodeFromUnVisitedNodes();
			// var_dump($this->stack);
			$this->search();
		} else {
			// $this->displayStack();
		}
	}

	public function displayStack() {
		var_dump("THis is the stack");
		var_dump($this->stack);
	}
}

class Node {
	public $name;
	public $isRoot;
	public $isVisited = false;
	public $unVisitedNodes;

	public $linkedNodes = [];

	public function __construct ($name, $isRoot = false) {
		$this->name = $name;
		$this->isRoot = $isRoot;
	}

	public function isLinkedTo(Node $node) {
		foreach ($linkedNodes as $node) {
			if ($this->name === $node->name) {
				return true;
			}
		}
		return false;
	}

	public function linkTo(Node $node) {
		array_push($this->linkedNodes, $node);
		array_push($node->linkedNodes, $this);
		return $this;
	}

	public function setVisited() {
		$this->isVisited = true;
	}

	public function getUnVisitedNodes() {
		$unVisitedNodes = [];
		foreach ($this->linkedNodes as $node) {
			if (! $node->isVisited) {
				array_push($unVisitedNodes, $node);
			}
		}
		return $this->unVisitedNodes = $unVisitedNodes;
	}

	public function selectRandomNodeFromUnVisitedNodes() {
		// var_dump(array_rand());
		var_dump(array_keys($this->unVisitedNodes));
		// return $this->unVisitedNodes[array_rand(array_keys($this->unVisitedNodes))];
	}

	public function hasUnVisitedNodes() {
		return $this->getUnVisitedNodes() > 0;
	}

	public function hasNoUnVisitedNodes() {
		return !$this->hasUnVisitedNodes();
	}
}






/* Building Graph */
$root = new Node("root");
foreach (range(1, 6) as $v) {
        $name = "node{$v}";
        $$name = new Node($name);
}

$root->linkTo($node1)->linkTo($node2);
$node1->linkTo($node3)->linkTo($node4);
$node2->linkTo($node5)->linkTo($node6);
$node4->linkTo($node5);

$graph = new Graph($root);
$graph->search();
// var_dump($graph);

