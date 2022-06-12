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

            $this->assertSame($expectedId, $this->employee->getEmployeeID());
            $this->assertSame($expectedName, $this->employee->getName());
        }

    }
?>