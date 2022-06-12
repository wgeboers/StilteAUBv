<!doctype HTML>
<?php 
if($_SESSION['lang'] === 'lang_nl') {
        $infoTitle = 'Jouw gegevens';
        $orderTitle = 'Jouw bestellingen';
} elseif($_SESSION['lang'] === 'lang_en') {
        $infoTitle = 'Your profile';
        $orderTitle = 'Your orders';
}
?>
<div class="sidenav">
        <?php if($_SESSION['type'] === 'employee') { ?>
                <a href="employeesView.php">Medewerkers</a>
                <a href="rolesView.php">Rollen</a>
                <a href="ordersView.php">Bestellingen</a>
                <a href="searchtermsView.php">Zoektermen</a>
                <a href="productsView.php">Artikelen</a>
                <a href="imagesView.php">Afbeeldingen</a>
        <?php 
        } if($_SESSION['type'] === 'user') {
                echo "<a href='userInfo.php'>{$infoTitle}</a>
                <a href='userOrders.php'>{$orderTitle}</a>";
        }
        ?>
</div>