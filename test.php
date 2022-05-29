<?php
    require_once('crud.php');
    $classA = new Crud('root', '');
    $test = $classA->getEmployees('employees');
    foreach ($test as $row){
        echo $row->First_Name;
    }
?>