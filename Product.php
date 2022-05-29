<?php

class Product {
    
    private $ProductID;
    private $Name;
    private $Description;
    private $Stock;
    private $Price;
    //Creation date etc. nodig?
    //private $Creation_Date;
    //private $Created_By;
    //private $Product_Image;
    private $Image_File_Name;
    private $Image_File_Path;
    //private $Image_Creation_Date;

    public function __construct(int $ProductID, string $Name, string $Description, int $Stock, float $Price, string $Image_File_Name, string $Image_File_Path) {

        $this->ProductID = $ProductID;
        $this->Name = $Name;
        $this->Description = $Description;
        $this->Stock = $Stock;
        $this->Price = $Price;
        $this->Image_File_Name = $Image_File_Name;
        $this->Image_File_Path = $Image_File_Path;
    }

    public function getName() {
        return $this->Name;
    }

    public function getPrice() {
        return $this->Price;
    }

}