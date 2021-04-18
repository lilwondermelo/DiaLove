<?php
Class Product {
	private $id, $name, $owner;

	public function __construct($id, $name, $owner) {
		setId($id);
		setName($name);
		setOwner($owner);
	}

	public function getId() {
		return $this->id;
	}
	public function getName() {
		return $this->name;
	}
	public function getOwner() {
		return $this->owner;
	}

	public function setId($id) {
		$this->id = $id;
	}
	public function setName($name) {
		$this->name = $name;
	}
	public function setOwner($owner) {
		$this->owner = $owner;
	}
	public function getProduct() {
		return $this;
	}

}

?>