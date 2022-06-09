<?php
    use PHPUnit\Framework\TestCase;

    include 'user.php';

    final class UserTest extends TestCase {

        private $user;
        
        protected function setUp() : void {
            $this->user = new User(1, 'Bart', 'JAL', 'Frijters', 'bart.frijters@gm.com', '06-57574266', 'Pelsakker', 7, 'a', '4834AG', 'Breda');
        }
        public function testConstructor() {
            $this->assertNotEmpty($this->user);
        }
    }
?>