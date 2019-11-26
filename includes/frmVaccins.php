<?php
include('pdo.php');
include('index.php');
$title = 'Home page';
$sql   = "SELECT * FROM vaccins";
$query = $pdo->prepare($sql);
$query->execute();
$vaccins = $query->fetchAll();
debug($vaccins);

include('header.php'); ?>
<h1>Home</h1>
<?php foreach ($vaccins as $vaccin) { ?>

    <div class="vaccin">
        <h2><?php echo $vaccin['nom']; ?></h2>
        <a href="editVaccins.php?id=<?php echo $vaccin['id']; ?>">Editer</a>
    </div>

<?php } ?>
<?php include('includes/footer.inc.php');