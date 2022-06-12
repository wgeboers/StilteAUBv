<?php
use PHPUnit\Framework\TestCase;

include('../crud.php');

final class TestCrud extends TestCase {
    
    private ?Crud $crud;

    protected function setUp() : void {
        $this->crud = new Crud('root', '');
    }

    public function testConstructor() {
        $this->assertNotEmpty($this->crud);
        $this->assertInstanceOf(Crud::class, $this->crud);
    }

    public function testSelect() {
        $selectData = $this->crud->select('users', 'UserID' , 1);
        $this->assertIsArray($selectData);
        foreach($selectData as $rows) {
            $this->assertContains('Hans', $rows); //User at UserID = 1
            $this->assertArrayHasKey('Street', $rows);
        }

    }

    public function testUpdate() {
        $updateArray = array('Middle_Name'=>'Henk', 'Last_Name'=>'Populier');
        $this->crud->update($updateArray, 'users', 'UserID', 1);
        $selectData = $this->crud->select('users', 'UserID', 1);
        foreach($selectData as $rows) {
            $this->assertContains('Henk', $rows);
            $this->assertContains('Populier', $rows);
        }
        $undoArray = array('Middle_Name'=>'', 'Last_Name'=>'Poppelaars');
        $this->crud->update($undoArray, 'users', 'UserID', 1);
    }

    public function testInsert() {
        $insertArray = array('First_Name'=>'Bart', 'Last_Name'=>'Frijters', 'Email'=>'b.frijters@gm.com',
        'Phone_Number'=>'06-57574266', 'Password'=>'Coolio123', 'Street'=>'Hogeschoollaan', 'House_Number'=>81,
        'Zipcode'=>'ABCD12', 'City'=>'Breda');
        $this->crud->insert($insertArray, 'users');
        $selectData = $this->crud->select('users', 'First_Name', 'Bart');
        foreach($selectData as $rows) {
            $this->assertContains('Bart', $rows);
            $this->assertContains('Coolio123', $rows);
        }
    }
 }

?>