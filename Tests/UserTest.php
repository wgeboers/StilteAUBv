<?php
    use PHPUnit\Framework\TestCase;

    include('../user.php');

    final class UserTest extends TestCase {

        private User $user;
        private ?User $user2;
        
        protected function setUp() : void {
            $this->user = new User(1, 'Bart', 'JAL', 'Frijters', 'bart.frijters@gm.com', '06-57574266', 'Pelsakker', 7, 'a', '4834AG', 'Breda');
            $this->user2 = new User(1, 'Bart', 'JAL', 'Frijters', 'bart.frijters@gm.com', '06-57574266', 'Pelsakker', 7, 'a', '4834AG', 'Breda');

        }

        public function testConstructor() {
            $this->assertNotEmpty($this->user);
        }

        public function testGetters() {
            $expectedId = 1;
            $expectedfirstName = 'Bart';
            $expectedmidName = 'JAL';
            $expectedlastName = 'Frijters';
            $expectedEmail = 'bart.frijters@gm.com';
            $expectedPhoneNr = '06-57574266';
            $expectedStreet = 'Pelsakker';
            $expectedHouseNr = 7;
            $expectedHouseNrAdd = 'a';
            $expectedZipcode = '4834AG';
            $expectedCity = 'Breda';

            $this->assertSame($expectedId, $this->user->getId());
            $this->assertSame($expectedfirstName, $this->user->getFirstName());
            $this->assertSame($expectedmidName, $this->user->getMidName());
            $this->assertSame($expectedlastName, $this->user->getLastName());
            $this->assertSame($expectedEmail, $this->user->getEmail());
            $this->assertSame($expectedPhoneNr, $this->user->getPhoneNr());
            $this->assertSame($expectedStreet, $this->user->getStreet());
            $this->assertSame($expectedHouseNr, $this->user->getHouseNr());
            $this->assertSame($expectedHouseNrAdd, $this->user->getHouseNrAdd());
            $this->assertSame($expectedZipcode, $this->user->getZipcode());
            $this->assertSame($expectedCity, $this->user->getCity());
        }

        public function testSetters() {
            $this->user2->setId(2);
            $this->user2->setFirstName('Trab');
            $this->user2->setMidName('LAJ');
            $this->user2->setLastName('Cool');
            $this->user2->setEmail('trab.cool@gm.com');
            $this->user2->setPhoneNr('06-66425757');
            $this->user2->setStreet('Viveslaan');
            $this->user2->setHouseNr(140);
            $this->user2->setHouseNrAdd('');
            $this->user2->setZipcode('4835DB');
            $this->user2->setCity('Bavel');

            $this->assertNotEquals($this->user->getId(), $this->user2->getId());
            $this->assertNotEquals($this->user->getFirstName(), $this->user2->getFirstName());
            $this->assertNotEquals($this->user->getMidName(), $this->user2->getMidName());
            $this->assertNotEquals($this->user->getLastName(), $this->user2->getLastName());
            $this->assertNotEquals($this->user->getEmail(), $this->user2->getEmail());
            $this->assertNotEquals($this->user->getPhoneNr(), $this->user2->getPhoneNr());
            $this->assertNotEquals($this->user->getStreet(), $this->user2->getStreet());
            $this->assertNotEquals($this->user->getHouseNr(), $this->user2->getHouseNr());
            $this->assertNotEquals($this->user->getHouseNrAdd(), $this->user2->getHouseNrAdd());
            $this->assertNotEquals($this->user->getZipcode(), $this->user2->getZipcode());
            $this->assertNotEquals($this->user->getCity(), $this->user2->getCity());



            

        }
    }
?>