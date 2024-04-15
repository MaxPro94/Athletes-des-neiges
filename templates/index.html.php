<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 mt-5">
            <h1 class="mt-4 text-white">Bienvenue sur Simon's Team.org</h1>
            <p class="mb-5 text-white"><small>Merci de vous connecter pour accéder au site.</small></p>
            <form action="" method="POST" class="border rounded p-4 bg-dark text-white my-3">
                <div class="mb-3">
                    <label for="Name" class="form-label">Email :</label>
                    <input type="email" class="form-control" id="mail" name="mail" placeholder="name@example.com">
                </div>
                <?php if (!empty($error['mail'])) : ?>
                    <span class="text-danger"><?= $error['mail'] ?></span>
                <?php endif; ?>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Mot de passe :</label>
                    <input type="password" class="form-control" id="pwd" name="pwd">
                </div>
                <?php if (!empty($error['pwd'])) : ?>
                    <span class="text-danger"><?= $error['pwd'] ?></span>
                <?php endif; ?>

                <hr>
                <div class="d-flex justify-content-between">
                    <button type="submit" name="submit_connex" class="btn btn-outline-warning">Connexion</button>
                    <a href="?page=inscription" class="btn btn-outline-warning">Pas de compte ?</a>
                </div>

            </form>
        </div>
    </div>
</div>