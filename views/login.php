<div class="container">
    <div class="row justify-content-center py-5">

        <div class=" col-md-6">

            <div class="card o-hidden border-0 shadow-lg my-4">
                <div class="card-body p-0">
                    <div class="p-5">
                        <?php if (isset($_GET["ok"])) : ?>
                            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                            <button type="button" class="btn-close align-item-center" data-bs-dismiss="alert" aria-label="Close"></button>
                                <strong><?= $_GET["ok"] ?> </strong>
                                
                            </div>
                        <?php endif ?>
                        <?php if (isset($erreur)) : ?>
                            <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                <strong><?= "$erreur" ?> </strong>
                            </div>
                        <?php endif ?>
                        <div class="text-center">
                            <h1 class="h2 text-gray-900 mb-5">Bienvenue !</h1>
                        </div>
                        <form method="post" class="user">
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user mb-4" name="email" placeholder="Adresse email ">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user" name="mdp" placeholder="Mot de passe">
                            </div>

                            <button type="submit" name="connecter" class="btn btn-primary btn-user btn-block mt-5">
                                Se connecter
                            </button>


                        </form>


                    </div>
                </div>

            </div>

        </div>

    </div>

</div>