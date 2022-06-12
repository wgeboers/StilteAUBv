<?php
    use PHPUnit\Framework\TestCase;

    include('../product.php');

    final class ProductTest extends TestCase {

        private $product;
        
        protected function setUp() : void {
            $this->product = new Product(1, 'testPackage', 'Omschrijving', 50, 99.99, 1, 'testimage.png', 'Images\testimage.png');
        }

        public function testConstructor() {
            $this->assertNotEmpty($this->product);
        }

        public function testGetters() {
            $expectedId = 1;
            $expectedName = 'testPackage';
            $expectedDesc = 'Omschrijving';
            $expectedPrice = 99.99;
            $expectedImagePath = 'Images\testimage.png';


            $this->assertSame($expectedId, $this->product->getProductID());
            $this->assertSame($expectedName, $this->product->getName());
            $this->assertSame($expectedDesc, $this->product->getDescription());
            $this->assertSame($expectedPrice, $this->product->getPrice());
            $this->assertSame($expectedImagePath, $this->product->getImagePath());
        }

    }
?>