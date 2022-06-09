<?php

    use PHPUnit\Framework\TestCase;

    class UnitTests extends TestCase {
        public function testGetTable() {
            require_once('./crud.php');
            $table = 'Employees';

            $class = new Crud('root', '');
            $result = $class->getTable($table);

            $this->assertNotNull($result);
        }
    }
?>