<?php
$postes = getAllPostes();

if (isset($_POST["addposte"])) {
    $err = "";
    extract($_POST);
    if (!empty(($nom_poste))) {
        $nom_poste = htmlspecialchars($nom_poste);
        if (addPoste($nom_poste)) {
            return header("Location: ?page=poste&add");
        }
    } else {
        $err = "Veillez renseigner un poste";
    }
}


if (isset($_POST["setposte"])) {
    $err = "";
    extract($_POST);
    if (!empty(($id_poste)) && !empty($nom_poste)) {
        $nom_poste = htmlspecialchars($nom_poste);
        if (setPoste($id_poste, $nom_poste)) {
            return header("Location: ?page=poste&set");
        }
    } else {
        $err = "Veillez renseigner un poste";
    }
}

if (isset($_GET["delete"])) {
    if (deletePoste($_GET["delete"])) {
        return header("Location: ?page=poste&sup");
    }
}

require_once("partials/header.php");


if (isset($_GET["type"])) {
    if (isset($_GET["id"])) {
        $p = getPosteById($_GET["id"]);
    }
    require_once("views/addPoste.php");
} else {
    require_once("views/poste.php");
}


require_once("partials/footer.php");
