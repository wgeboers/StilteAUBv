<?php
require_once ('Crud.php');
$crud = new Crud ('root', '');
?>

$langs = array('en','nl');

<?php foreach ($langs as $lang): ?>
    <a href="index.php?lang=<?=$lang;?>"><?=$lang;?> </a>
<?php endforeach; ?>

<?php
if (in_array($_GET['lang'], $langs)){
    $_SESSION['lang'] = $_GET['lang'];
}
?>



