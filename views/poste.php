<div class="container mt-3">
    <div class="card shadow-lg">
        <div class="card-header bg-white">
            <div class="row">
            <?php if (isset($_GET["add"])) : ?>
                <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                     <strong><?="Nouveau poste ajouté !"?> </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                 <?php endif ?>
                 <?php if (isset($_GET["set"])) : ?>
                <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                     <strong><?="Poste modifié"?> </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                 <?php endif ?>
                 <?php if (isset($_GET["sup"])) : ?>
                <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                     <strong><?="Poste supprimé"?> </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                 <?php endif ?>
                <div class="col-md-10">
                    <h3 class="text-primary">Liste des postes</h3>
                </div>
                <div class="col-md-2">
                    <a href="?page=poste&type=add" class="btn btn-outline-primary float-end">Ajouter</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="poste" class="table table-striped table-bordered table-sm">
                <thead class="table-primary">
                    <tr class="text-center ">
                        <th>Postes</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($postes as $poste): ?>
                    <tr>
                        <td> <?= $poste->nom_poste ?> </td>
                        <td>
                            <a href="?page=poste&type=edit&id=<?=$poste->id_poste?>" class="text-primary">
                                <i class="bi bi-pencil fs-4 me-3"></i>
                            </a>
                            <a href="?page=poste&delete=<?=$poste->id_poste?>" class="text-danger">
                                <i class="bi bi-trash3 fs-4 ms-3"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>