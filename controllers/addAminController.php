<?php
if (isset($_POST["register"])) {
    $erreur = "";
    if (!empty($_POST["prenom"]) && !empty($_POST["nom"]) & !empty($_POST["email"]) & !empty($_POST["mdp"])) {
        $prenom = htmlspecialchars($_POST["prenom"]);
        $nom = htmlspecialchars($_POST["nom"]);
        $email = htmlspecialchars($_POST["email"]);
        $mdp = sha1($_POST["mdp"]);

        if (addAdmin($prenom, $nom, $email, $mdp)) {
            unset($_SESSION["admin"]);
            session_destroy();
            return header("Location: ?page=login&ok=Administrateur ajouté avec succés !");
        } else {
            $erreur = "Une erreur s'est produite lors de de l'insertion !";
        }
    } else {
        $erreur = "Veuillez renseigner tout les champs !";
    }
}


require_once("partials/header.php");
require_once("views/addAmin.php");
require_once("partials/footer.php");
