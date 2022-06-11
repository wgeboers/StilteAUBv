<?php
/**
 * Class used to describe an Image object
 */
class Image {
	
	private int $imageID;
	private string $imageName;
	private string $imageFilePath;

	public function __construct($imageID, $imageName, $imageFilePath) {
		$this->imageID = $imageID;
		$this->imageName = $imageName;
		$this->imageFilePath = $imageFilePath;
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

	/**
	 * Function used to cast Image data into an associative array
	 * To be used within manager to get an object ready to be uploaded to database.
	 */
	public function toArray() {
		return array('ImageID'=>$this->imageID, 'Name'=>$this->imageName, 'FilePath'=>$this->imageFilePath);
	}
}
?>