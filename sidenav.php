<!doctype HTML>

<div class="sidenav">
        <?php if($_SESSION['type'] === 'employee') { ?>
        <a href="employeesView.php">Medewerkers</a>
        <a href="rolesView.php">Rollen</a>
        <a href="ordersView.php">Bestellingen</a>
        <a href="searchtermsView.php">Zoektermen</a>
        <a href="productsView.php">Artikelen</a>
        <a href="imagesView.php">Afbeeldingen</a>
        <?php 
        }
        ?>
        <?php if($_SESSION['type'] === 'user') { ?>
        <a href='userInfo.php'>Jouw gegevens</a>
        <a href='userOrders.php'>Jouw bestellingen</a>
        <?php
        }
        ?>
</div>