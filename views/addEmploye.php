<?php require_once("partials/header.php"); ?>

<div class="container col-md-10 ">
    <?php if (isset($err)) : ?>
        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            <strong><?= $err ?> </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>
    <div class="card shadow-lg">
        <div class="card-header bg-white">
            <div class="row">
                <div class="col-md-10">
                    <h3 class="text-primary">Formulaire d'<?= isset($em) ? "édition" : "ajout"  ?> employé</h3>
                </div>
                <div class="col-md-2">
                    <a href="?page=employe" class="btn btn-outline-danger float-end">Retour</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="" method="post" id="addEmploye" class="row gy-2">
                <div class="col-md-6">
                    <?php if (isset($em)) : ?>
                        <input type="hidden" name="id_employe" value="<?= $em->id_employe ?>">
                    <?php endif; ?>
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" class="form-control" id="prenom" name="prenom" value="<?= isset($em) ? $em->prenom : "" ?>">
                    <span></span>
                </div>
                <div class="col-md-6">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" value="<?= isset($em) ? $em->nom : "" ?>">
                    <span></span>

                </div>
                <div class="col-md-12">
                    <label class="form-label">Poste</label>
                    <select class="form-select" name="id_poste" id="id_poste" aria-label="Default select example">
                        <option value="">Slectionner un poste</option>
                        <?php foreach ($postes as $poste) : ?>
                            <option value="<?= $poste->id_poste ?>" <?= (isset($em) && $em->id_poste == $poste->id_poste) ? "selected" : "" ?>><?= $poste->nom_poste ?></option>
                        <?php endforeach ?>
                    </select>
                    <span></span>
                </div>
                <div class="col-md-12">
                    <label class="form-label">Etat</label> <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="etat" id="paye" value="Payé" <?= (isset($em) && $em->etat == "Payé") ? "checked" : "" ?>>
                        <label class="form-check-label" for="paye">Payé</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="etat" id="nonpaye" value="Non payé" <?= (isset($em) && $em->etat == "Non payé") ? "checked" : "" ?>>
                        <label class="form-check-label" for="nonpaye">Non payé</label>
                    </div>
                    <span></span>
                </div>
                <div class="col-md-12">
                    <label for="montant" class="form-label">Montant</label>
                    <input type="number" class="form-control" id="montant" name="salaire" value="<?= isset($em) ? $em->salaire : "" ?>">
                    <span></span>
                </div>
                <div class="col-md-12">
                    <label for="date_paiement" class="form-label">Date de paiement</label>
                    <input type="date" class="form-control" id="date_paiement" name="date_paiement" value="<?= isset($em) ? $em->date_paiement : "" ?>">
                    <span></span>
                </div>
                <div class="col-md-12 mt-3">
                    <?php if (isset($em)) : ?>
                        <input type="submit" class="btn btn-primary me-3" name="setEmploye" value="Modifier">
                    <?php else : ?>
                        <input type="submit" class="btn btn-primary me-3" name="addEmploye" value="Ajouter">
                        <input type="reset" class="btn btn-outline-warning" value="effacer">
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require_once("partials/footer.php"); ?>