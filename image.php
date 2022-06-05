<?php

class Image {
	
	protected $imageID;
	protected $imageName;
	protected $imageFilePath;

	public function __construct($imageID, $imageName, $imageFilePath) {
		$this->imageID = $imageID;
		$this->imageName = $imageName;
		$this->getImageFilePath = $imageFilePath;
	}
	public function getImageName() {
		return $this->imageName;
	}

	public function getImageID() {
		return $this->imageID;
	}

	public function getImageFilePath() {
		return $this->imageFilePath;
	}
}
?>