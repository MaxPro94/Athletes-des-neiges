<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <h1>Bienvenue sur Simon's Team.org</h1>
            <p class="py-2"><small>Merci de vous connecter pour accéder au site.</small></p>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="Name" class="form-label">Email :</label>
                    <input type="email" class="form-control" id="mail" name="mail" placeholder="name@example.com">
                </div>
                <?php if (!empty($error['mail'])) : ?>
                    <span class="text-danger"><?= $error['mail'] ?></span>
                <?php endif; ?>
                <hr>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Mot de passe :</label>
                    <input type="password" class="form-control" id="pwd" name="pwd">
                </div>
                <?php if (!empty($error['pwd'])) : ?>
                    <span class="text-danger"><?= $error['pwd'] ?></span>
                <?php endif; ?>
                <button type="submit" name="submit_connex" class="btn btn-warning">Connexion</button>
                <hr>
                <div>
                    <p class="my-2">Vous n'avez pas de compte ?</p>
                    <a href="?page=inscription" class="btn btn-warning">S'inscrire</a>
                </div>

            </form>
        </div>
    </div>
</div>