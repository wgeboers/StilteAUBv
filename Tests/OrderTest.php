<?php
    use PHPUnit\Framework\TestCase;

    include('../order.php');

    final class OrderTest extends TestCase {

        private $order;
        
        protected function setUp() : void {
            $this->user = new User(1, 'Bart', 'JAL', 'Frijters', 'bart.frijters@gm.com', '06-57574266', 'Pelsakker', 7, 'a', '4834AG', 'Breda');
        }

        public function testConstructor() {
            $this->assertNotEmpty($this->user);
        }

        public function testGetters() {
            $expectedId = 1;
            $expectedName = 'Bart';
            $expectedEmail = 'bart.frijters@gm.com';
            $expectedPhoneNr = '06-57574266';
            $expectedAddress = array('Pelsakker', 7, 'a', '4834AG', 'Breda');

            $this->assertSame($expectedId, $this->user->getId());
            $this->assertSame($expectedName, $this->user->getName());
            $this->assertSame($expectedEmail, $this->user->getEmail());
            $this->assertSame($expectedPhoneNr, $this->user->getPhoneNumber());
            $this->assertSame($expectedAddress, $this->user->getAddress());
        }

        public function testGetAllData() {
            
        }
    }
?>