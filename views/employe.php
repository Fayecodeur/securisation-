<?php $title = "Liste des employes" ?>
<?php require_once("partials/header.php"); ?>
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-white">
            <?php if (isset($_GET["add"])) : ?>
                <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                    <strong><?= "Employé ajouté avec succès !" ?> </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif ?>
            <?php if (isset($_GET["set"])) : ?>
                <div class="alert alert-info alert-dismissible fade show text-center" role="alert">
                    <strong><?= "Employé Modifié" ?> </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif ?>
            <?php if (isset($_GET["sup"])) : ?>
                <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                    <strong><?= "Employé supprimé" ?> </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif ?>
            <div class="row">
                <div class="col-md-10">
                    <h3 class="text-primary">Liste des employés</h3>
                </div>
                <div class="col-md-2">
                    <a href="?page=employe&type=add" class="btn btn-outline-primary float-end">Ajouter</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="data_table">
                        <table id="example" class="table table-striped table-bordered table-sm">
                            <thead class="table-primary">
                                <tr class="text-center ">
                                    <th>Prenom</th>
                                    <th>Nom</th>
                                    <th>Fonction</th>
                                    <th>Etat</th>
                                    <th>Montant</th>
                                    <th>Date paiement</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($employes as $employe) : ?>
                                    <tr>
                                        <td><?= $employe->prenom ?></td>
                                        <td><?= $employe->nom ?></td>
                                        <td><?= $employe->nomPoste ?></td>
                                        <td><?= $employe->etat ?></td>
                                        <td><?= $employe->salaire ?> Franc CFA</td>
                                        <td><?= date("d/m/Y", strtotime($employe->date_paiement)) ?></td>

                                        <td>
                                            <a href="?page=employe&type=edit&id=<?= $employe->id_employe ?>" class="text-primary">
                                                <i class="bi bi-pencil fs-5 me-3"></i>
                                            </a>
                                            <a href="?page=employe&delete=<?= $employe->id_employe ?>" class="text-danger">
                                                <i class="bi bi-trash3 fs-5"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once("partials/footer.php"); ?>