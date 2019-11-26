<?php
include('includes/pdo.php');
include('index.php');
$title = 'Add Vaccins';
$errors = array();
$success = false;
// Traitement du formulaire
// formulaire soumis ???
if(!empty($_POST['submitted'])) {
    // Faille XSS
    debug($_POST);
    $nom        = clean($_POST['nom']);
    $created_at = clean($_POST['created_at']);
    $rappel1    = clean($_POST['rappel1']);
    $rappel2    = clean($_POST['rappel2']);
    // no error
    if(count($errors) == 0) {
        // insert into
        $success = true;
        // injection SQL
        $sql = "INSERT INTO vaccins  VALUES('',:nom,:created_at,:rappel1,:rappel2)";
        $query = $pdo->prepare($sql);
        $query->bindValue(':nom',$nom, PDO::PARAM_STR);
        $query->bindValue(':created_at', $created_at, PDO::PARAM_STR);
        $query->bindValue(':rappel1',$rappel1, PDO::PARAM_STR);
        $query->bindValue(':rappel2',$rappel2, PDO::PARAM_INT);
        $query->execute();
    }
}

include('includes/header.php'); ?>
    <h1>Ajouter un Vaccin pour le bonheur</h1>
<?php  if($success) { ?>
    <p>Bravo tu vas pouvoir être vacciner ma biche</p>
<?php } else { ?>
    <form action="" method="post">
        <label for="nom">Nom du Vaccin*</label>
        <input type="text" id="nom" name="nom" value="<?php if(!empty( $_POST['nom'])) {echo $_POST['nom'];} ?>">
        <span class="error"><?php if(!empty($errors['nom'])) { echo $errors['nom']; } ?></span>

        <label for="code">Date de création*</label>
        <input type="text" id="created_at" name="code" value="<?php if(!empty( $_POST['created_at'])) {echo $_POST['created_at'];} ?>">
        <span class="error"><?php if(!empty($errors['created_at'])) { echo $errors['created_at']; } ?></span>

        <label for="district">Date du premier rappel*</label>
        <input type="text" id="rappel1" name="rappel1" value="<?php if(!empty( $_POST['rappel1'])) {echo $_POST['rappel1'];} ?>">
        <span class="error"><?php if(!empty($errors['rappel1'])) { echo $errors['rappel1']; } ?></span>

        <label for="population">Date du second rappel*</label>
        <input type="text" id="rappel2" name="rappel2" value="<?php if(!empty( $_POST['rappel2'])) {echo $_POST['rappel2'];} ?>">
        <span class="error"><?php if(!empty($errors['rappel2'])) { echo $errors['rappel2']; } ?></span>

        <input type="submit" name="submitted" value="Envoyer">

    </form>
<?php } ?>
<?php include('includes/footer.inc.php');
