<?php require_once("partials/header.php"); ?>

<div class="container mt-3  py-5 col-md-6 ">
    <?php if (isset($err)) : ?>
        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            <strong><?= "$err" ?> </strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>
    <div class="card shadow-lg">
        <div class="card-header">
            <div class="row">
                <div class="col-md-10">
                    <h3 class="text-primary">Formulaire d'<?= isset($p) ? "édition" : "ajout" ?> poste</h3>
                </div>
                <div class="col-md-2">
                    <a href="?page=poste" class="btn btn-outline-danger float-end">Retour</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="" method="post" id="addPoste">
                <div class="row gy-3">
                    <div class="col-md-12">
                        <?php if (isset($p)) : ?>
                            <input type="hidden" name="id_poste" value="<?= isset($p) ? $p->id_poste : "" ?>">
                        <?php endif ?>
                        <label for="poste" class="form-label">Poste</label>
                        <input type="text" class="form-control" id="poste" name="nom_poste" value="<?= isset($p) ? $p->nom_poste : "" ?>" autocomplete="off">
                        <span></span>
                    </div>
                    <?php if (isset($p)) : ?>
                        <div class="col-md-12 mt-4">
                            <input type="submit" class="btn btn-primary w-100 mt-3 p-2" name="setposte" value="Modifier" autocomplete="off">
                        </div>
                    <?php else : ?>
                        <div class="col-md-12 mt-4">
                            <input type="submit" class="btn btn-primary w-100 mt-3 p-2" name="addposte" value="Ajouter" autocomplete="off">
                        </div>
                    <?php endif ?>


                </div>
            </form>
        </div>
    </div>
</div>
<?php require_once("partials/footer.php"); ?>