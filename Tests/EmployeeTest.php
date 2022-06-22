<?php
    use PHPUnit\Framework\TestCase;

    include('../employee.php');

    final class EmployeeTest extends TestCase {

        private $employee;
        
        protected function setUp() : void {
            $this->employee = new Employee(1, 'Wesley', 'van', 'Geboers', 'wgeboers@gm.com', '12-6-2022', 1);
        }

        public function testConstructor() {
            $this->assertNotEmpty($this->employee);
        }

        public function testGetters() {
            $expectedId = 1;
            $expectedName = 'Wesley';

            $this->assertSame($expectedId, $this->employee->getEmployeeID());           //assertSame is niet gelijk aan assertEquels
            $this->assertSame($expectedName, $this->employee->getName());               //assertSame controleert of de waarde gelijk en type gelijk is
        }                                                                               //assertEqual controleert alleen of de waarde gelijk is en kijkt niet naar type

    }
?>