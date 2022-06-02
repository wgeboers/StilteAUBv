<?php

require_once("Crud.php");

class Image {
	
	public $crud;

	public $id;
	public $fileName;
	public $filePath;
	
	function  __construct() {
		$this->crud = new Crud('root', '');
	}

    public function insertImage($fileName, $filePath) {
        $data = $this->crud->addImage($fileName, $filePath);
    }

}
?>