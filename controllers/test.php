<?php
session_start();

$prenomErr = $nomErr = $emailErr = $mdp1Err =   "";
$prenom = $nom = $email = $mdp1 = $mdp2 = "";
require_once("models/fonction.php");

if (isset($_POST["register"])) {

    // Vérification des champs...
    // (Le code de validation reste le même)

    if (empty($prenomErr) && empty($nomErr) && empty($emailErr) && empty($mdp1Err) && empty($mdp2Err)) {
        require_once("models/db.php");
        $hashed_password = password_hash($mdp1, PASSWORD_ARGON2ID);
        $sql = "INSERT INTO users (prenom, nom, email, mdp) VALUES (:prenom, :nom, :email, :mdp)";
        $requete = $db->prepare($sql);
        $requete->bindValue(":prenom", $prenom, PDO::PARAM_STR);
        $requete->bindValue(":nom", $nom, PDO::PARAM_STR);
        $requete->bindValue(":email", $email, PDO::PARAM_STR);
        $requete->bindValue(":mdp", $hashed_password, PDO::PARAM_STR);

        $requete->execute();

        // Stocker le message de succès dans une session
        $_SESSION['success_message'] = "Inscription réussie ! Veuillez vous connecter.";
        header("Location: login.php");
        exit();
    }
}
$titre = "Incription";
require_once("includes/header.php");
require_once("includes/navbar.php");
?>

<!-- Le formulaire d'inscription -->
<div class="container col-md-7 mt-2">
    <form action="" method="post" class="shadow p-5 rounded-3 bg-white">
        <h1 class="text-center text-uppercase fs-3 mb-4 mt-0">inscription</h1>
        <div class="row">
            <!-- Champs du formulaire -->
            <!-- (Le code du formulaire reste le même) -->
            <div class="mt-4">
                <button type="submit" name="register" class="btn btn-primary">S'inscrire</button>
            </div>
        </div>
    </form>
</div>

<?php require_once("includes/footer.php"); ?>