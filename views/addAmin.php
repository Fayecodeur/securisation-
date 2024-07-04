<div class="container">
    <div class="row justify-content-center">

        <div class=" col-md-6">

            <div class="card o-hidden border-0 shadow-lg">
                <div class="card-body p-0">
                    <div class="p-5">
                        <?php if (isset($erreur)) : ?>
                            <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                <strong><?= "$erreur" ?> </strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif ?>


                        <div class="text-center">
                            <p class="h4 text-primary mb-5">Ajouté un nouvel administrateur</p>
                        </div>
                        <form method="post" class="user" id="addAdmin">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user " name="prenom" placeholder="Entrez votre prenom">
                                <span></span>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user " name="nom" placeholder="Entrez votre nom">
                                <span></span>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user " name="email" placeholder="Adresse email ">
                                <span></span>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user" name="mdp" placeholder="Mot de passe">
                                <span></span>
                            </div>


                            <button type="submit" name="register" class="btn btn-primary btn-user btn-block mt-4">
                                Ajouter
                            </button>
                        </form>
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>