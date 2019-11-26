<?php
include('includes/pdo.php');
include('index.php');
$errors = array();
$success = false;
if(!empty($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    // request
    $sql = "SELECT * FROM vaccins
          WHERE id = $id";
    $query = $pdo->prepare($sql);
    $query->execute();
    $ville = $query->fetch();
    //debug($vaccins);
    if(!empty($vaccins)) {

        if(!empty($_POST['submitted'])) {
            // Faille XSS
            //debug($_POST);
            $nom        = clean($_POST['nom']);
            $created_at = clean($_POST['created_at']);
            $rappel1    = clean($_POST['rappel1']);
            $rappel2    = clean($_POST['rappel2']);

            // no error
            if(count($errors) == 0) {
                // insert into
                $success = true;
                // UPDATE SQL
                $sql = "UPDATE vaccins
          SET Name = :nom, Crée le = :created_at, Rappel 1 = :rappel1,Rappel 1 = :rappel2
          WHERE ID = $id";
                $query = $pdo->prepare($sql);
                $query->bindValue(':nom',$nom, PDO::PARAM_STR);
                $query->bindValue(':created_at',$created_at, PDO::PARAM_STR);
                $query->bindValue(':rappel1',$rappel1, PDO::PARAM_STR);
                $query->bindValue(':rappel2',$rappel2, PDO::PARAM_INT);
                $query->execute();

            }
        }

    } else {
        die('404');
    }
} else {
    die('404');
}

include('includes/header.php'); ?>

<?php  if($success) { ?>
    <p>Bravo ma biche</p>
<?php } else { ?>
    <form action="" method="post">
        <label for="nom">Nom du Vaccin*</label>
        <input type="text" id="nom" name="nom" value="<?php if(!empty( $_POST['nom'])) {echo $_POST['nom'];} else {echo $ville['Name'];} ?>">
        <span class="error"><?php if(!empty($errors['nom'])) { echo $errors['nom']; } ?></span>

        <label for="code">Modifier le*</label>
        <input type="text" id="created_at" name="crated_at" value="<?php if(!empty( $_POST['created_at'])) {echo $_POST['created_at'];}else {echo $ville['Created_at'];} ?>">
        <span class="error"><?php if(!empty($errors['created_at'])) { echo $errors['created_at']; } ?></span>

        <label for="district">Premier rappel le*</label>
        <input type="text" id="rappel1" name="rappel1" value="<?php if(!empty( $_POST['rappel1'])) {echo $_POST['rappel1'];}else {echo $ville['rappel1'];} ?>">
        <span class="error"><?php if(!empty($errors['rappel1'])) { echo $errors['rappel1']; } ?></span>

        <label for="population">Second rappel le*</label>
        <input type="text" id="rappel2" name="rappel2" value="<?php if(!empty( $_POST['rappel1'])) {echo $_POST['rappel1'];}else {echo $ville['rappel1'];} ?>">
        <span class="error"><?php if(!empty($errors['rappel1'])) { echo $errors['rappel1']; } ?></span>

        <input type="submit" name="submitted" value="Envoyer">

    </form>
<?php } ?>

<?php include('footer.inc.php');