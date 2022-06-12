<?php
    use PHPUnit\Framework\TestCase;

    include('../employee.php');

    final class EmployeeTest extends TestCase {

        private $employee;
        
        protected function setUp() : void {
            $this->employee = new Employee(1, 'Wesley', 'van', 'Geboers', 'wgeboers@hotmail.com');
        }

        public function testConstructor() {
            $this->assertNotEmpty($this->employee);
        }

        public function testGetters() {
            $expectedId = 1;
            $expectedName = 'Wesley';

            $this->assertSame($expectedId, $this->employee->getId());
            $this->assertSame($expectedName, $this->employee->getName());
        }

        public function testGetAllData() {
            
        }
    }
?>