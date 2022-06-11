<?php

class Image {
	
	protected int $imageID;
	protected string $imageName;
	protected string $imageFilePath;

	public function __construct($imageID, $imageName, $imageFilePath) {
		$this->imageID = $imageID;
		$this->imageName = $imageName;
		$this->imageFilePath = $imageFilePath;
	}
	public function getImageName() : string {
		return $this->imageName;
	}

	public function getImageID() : int {
		return $this->imageID;
	}

	public function getImageFilePath() : string  {
		return $this->imageFilePath;
	}

	public function toArray() : array {
		return array('ImageID'=>$this->imageID, 'Name'=>$this->imageName, 'FilePath'=>$this->imageFilePath);
	}
}
?>