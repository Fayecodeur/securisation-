<?php
// connexion à la base de données
try {
    $connexion = new PDO("mysql:host=localhost;dbname=gestion_salaire", "root", "");
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}

// ajouter un nouvel administrateur
function addAdmin($prenom, $nom, $email, $mdp){
    global $connexion;
    try {
        $insertion = $connexion->prepare("INSERT INTO administrateur VALUES (null, :prenom, :nom, :email, :mdp)");
      return $insertion->execute([
             "prenom"=>$prenom,
             "nom"=>$nom,
             "email"=>$email,
             "mdp"=>$mdp
        ]);
    } catch (PDOException $e) {
        die("Erreur".$e->getMessage()) ;
    }
}

// Connecter l'administrateur
function connecter($email,$mdp) {
    global $connexion;
    try {
        $request = $connexion->prepare("SELECT * FROM administrateur WHERE email = :email AND mdp= :mdp");
        $request->execute([
            "email"=>$email,
            "mdp"=>$mdp
        ]);
      return $request->fetch(PDO::FETCH_OBJ);  
    } catch (PDOException $e) {
        die("Erreur".$e->getMessage()) ;
    }
}

// afficher tout les postes
function getAllPostes()
{
    global $connexion;
    try {
        $request = $connexion->prepare("SELECT * FROM poste");
        $request->execute();
        return $request->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
}

// ajouter un poste
function addPoste($nom_poste)
{
    global $connexion;
    try {
        $request = $connexion->prepare("INSERT INTO poste VALUES(null, :nom_poste)");
        return $request->execute([
            "nom_poste" => $nom_poste
        ]);
    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
}

// recupurer un poste a travers son "id"
function getPosteById($id)
{
    global $connexion;
    try {
        $request = $connexion->prepare("SELECT * FROM poste WHERE id_poste = :id");
        $request->execute(["id" => $id]);
        return $request->fetch(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
}

// modifier un poste
function setPoste($id, $nom)
{
    global $connexion;
    try {
        $request = $connexion->prepare("UPDATE poste SET nom_poste=:nom WHERE id_poste =:id");
        return $request->execute([
            "nom" => $nom,
            "id" => $id,
        ]);
    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage() . $e->getLine());
    }
}

// supprimé un poste
function deletePoste($id)
{
    global $connexion;
    try {
        $request = $connexion->prepare("DELETE FROM poste WHERE id_poste =:id");
        return $request->execute(["id" => $id]);
    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
}



// ajouter un nouvel employé
function addEmploye($prenom, $nom, $etat, $salaire, $date_paiement, $id_poste)
{
    global $connexion;
    try {
        $request = $connexion->prepare("INSERT INTO employes VALUES(null, :prenom, :nom, :etat, :salaire, :date_paiement, :id_poste)");
        return $request->execute([
            "prenom" => $prenom,
            "nom" => $nom,
            "etat" => $etat,
            "salaire" => $salaire,
            "date_paiement" => $date_paiement,
            "id_poste" => $id_poste,

        ]);
    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
}


// recuperer tout les employés
function getAllEmployes()
{
    global $connexion;
    try {
        $request = $connexion->prepare("SELECT id_employe, prenom, nom, etat, salaire, date_paiement, p.nom_poste as nomPoste
                                        FROM employes e, poste p
                                        WHERE e.id_poste = p.id_poste");
        $request->execute();
        return $request->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
}


// recuperer un employé a travers son "id"
function getEmployeById($id)
{
    global $connexion;
    try {
        $request = $connexion->prepare("SELECT * FROM employes WHERE id_employe = :id");
        $request->execute(["id" => $id]);
        return $request->fetch(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        die("Erreur : " . $e->getMessage());
    }
}


// modifié un employé
function setEmploye($id_employe,$prenom, $nom, $etat, $salaire, $date_paiement, $id_poste){
    global $connexion;
    try {
        $q = $connexion->prepare("UPDATE employes SET prenom=:prenom, nom=:nom, etat=:etat, salaire=:salaire,
                                         date_paiement=:date_paiement, id_poste=:id_poste
                                 WHERE id_employe=:id_employe");
        return $q->execute([
            "id_employe" => $id_employe,
            "prenom" => $prenom,
            "nom" => $nom,
            "etat" => $etat,
            "salaire" => $salaire,
            "date_paiement" => $date_paiement,
            "id_poste" => $id_poste
        ]);
    
    } catch (PDOException $e) {
       die("Erreur : ".$e->getMessage() .$e->getLine());
    }
}

// supprimé un employé
function deleteEmploye($id){
    global $connexion;
    try {
    $request = $connexion->prepare("DELETE FROM employes WHERE id_employe =:id");
    return $request->execute(["id"=>$id]); 
    
    } catch (PDOException $e) {
       die("Erreur : ".$e->getMessage());
    }
}
