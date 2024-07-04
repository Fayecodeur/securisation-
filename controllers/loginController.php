<?php



if (isset($_POST["connecter"])) {
    $erreur = "";
    if (!empty($_POST["email"]) & !empty($_POST["mdp"])) {
        $email = htmlspecialchars($_POST["email"]);
        $mdp = sha1($_POST["mdp"]);
        $admin = connecter($email, $mdp);
        if ($admin) {
            $_SESSION["admin"] =  $admin;
            return header("Location: ?page=employe");
        } else {
            $erreur = "Adresse email ou mot de passe incorrect";
        }
    } else {
        $erreur = "Login ou mot de passe incorrect";
    }
}


// if (isset($_POST["connecter"])) {
//     $erreur = "";
//     if (!empty($_POST["email"]) & !empty($_POST["mdp"])) {
//         $email = htmlspecialchars($_POST["email"]);
//         $mdp = sha1($_POST["mdp"]);



//         if (connecter($email,$mdp)) {
//             return header("Location: ?page=employe");
//         }else{
//             $erreur = "Une erreur s'est produite lors de de l'insertion !";
//         }

//     }else{
//         $erreur = "Veuillez renseigner tout les champs !";
//     }
// }



require_once("partials/headerLogin.php");
require_once("views/login.php");
require_once("partials/footerLogin.php");
