<?php

$postes = getAllPostes();
$employes = getAllEmployes();


// ajout employé
if (isset($_POST["addEmploye"])) {
    $err = "";
    $prenom = $nom  =  $poste = $salaire = $date_paiement = $id_poste =  "";
    if (
        !empty($_POST["prenom"]) && !empty($_POST["nom"]) && !empty($_POST["etat"]) &&
        !empty($_POST["salaire"]) && !empty($_POST["date_paiement"]) && !empty($_POST["id_poste"])
    ) {
        $prenom = htmlspecialchars($_POST["prenom"]);
        $nom = htmlspecialchars($_POST["nom"]);
        $poste = htmlspecialchars($_POST["poste"]);
        $etat = htmlspecialchars($_POST["etat"]);
        $salaire = htmlspecialchars($_POST["salaire"]);
        $date_paiement = htmlspecialchars($_POST["date_paiement"]);
        $id_poste = htmlspecialchars($_POST["id_poste"]);

        if (addEmploye($prenom, $nom, $etat, $salaire, $date_paiement, $id_poste)) {
            return header("Location: ?page=employe&add");
        } else {
            $err = "Une erreur s'est produite lors de l'insértion";
        }
    } else {
        $err = "Veuillez renseigner tout les champs";
    }
}




// modifier employé

if (isset($_POST["setEmploye"])) {
    extract($_POST);
    if (setEmploye($id_employe, $prenom, $nom, $etat, $salaire, $date_paiement, $id_poste)) {
        return header("Location: ?page=employe&set");
    }
}




// suprrimer employé
if (isset($_GET["delete"])) {
    if (deleteEmploye($_GET["delete"])) {
        return header("Location: ?page=employe&sup");
    }
}


if (isset($_GET["type"])) {
    if (isset($_GET["id"])) {
        $em = getEmployeById($_GET["id"]);
    }
    require_once("views/addEmploye.php");
} else {
    require_once("views/employe.php");
}
