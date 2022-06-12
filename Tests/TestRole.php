<?php

use PHPUnit\Framework\TestCase;

require_once('../role.php');

class TestRole extends TestCase {

    private $role;

    protected function setup() : void {

        $this->role = new Role(12, 'Eigenaar', 'De eigenaar van het bedrijf', '12-06-2022');

    }

    //Test the getters of role
    public function testGetRoleId() {

        $id = $this->role->getRoleId();
        $this->assertEquals(12, $id, "De waarden zijn niet gelijk.");

    }

    public function testGetRoleName() {

        $name = $this->role->getRoleName();
        $this->assertEquals('Eigenaar', $name, "De waarden zijn niet gelijk.");

    }

    public function testGetRoleDesc() {

        $desc = $this->role->getRoleDesc();
        $this->assertEquals('De eigenaar van het bedrijf', $desc, "De waarden zijn niet gelijk.");

    }
    
    //Test de setters of role
    public function testSetName() {
        
        $this->role->setName("De echte eigenaar");
        $name = $this->role->getRoleName();
        $this->assertEquals("De echte eigenaar", $name, "De waarden zijn niet gelijk.");

    }

    public function testSetId() {
        $this->role->setId(14);
        $id = $this->role->getRoleId();
        $this->assertEquals(14, $id, "De waarden zijn niet gelijk.");

    }
}
?>