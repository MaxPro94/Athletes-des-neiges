<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <h1>Envie de rejoindre la Simon's Team ?</h1>
            <p class="py-2"><small>N'hesite plus et inscrit toi !</small></p>
            <form action="" method="POST" id="form">
                <div class="mb-3">
                    <label for="Name" class="form-label">Email :</label>
                    <input type="email" class="form-control" id="mail" name="mail" placeholder="name@example.com">
                    <?php if (!empty($error['mail'])) : ?>
                        <span class="text-danger"><?= $error['mail'] ?></span>
                    <?php endif; ?>
                    <span class="text-danger" id="error_mail"></span>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nom :</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Lastname">
                    <?php if (!empty($error['lastname'])) : ?>
                        <span class="text-danger"><?= $error['lastname'] ?></span>
                    <?php endif; ?>
                    <span class="text-danger" id="error_lastname"></span>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Prénom :</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Firstname">
                    <?php if (!empty($error['firstname'])) : ?>
                        <span class="text-danger"><?= $error['firstname'] ?></span>
                    <?php endif; ?>
                    <span class="text-danger" id="error_firstname"></span>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Mot de passe :</label>
                    <input type="password" class="form-control" id="pwd" name="pwd">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" id="pwd2" name="pwd2">
                </div>
                <div class="h-25 my-1 progress" id="background_bar">
                    <div class="text-center progress-bar progress-bar-striped bg-danger" id="bar" role="progressbar" width="0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                    </div>
                </div>
                <?php if (!empty($error['pwd'])) : ?>
                    <span class="text-danger"><?= $error['pwd'] ?></span>
                <?php endif; ?>
                <?php if (!empty($error['pwd2'])) : ?>
                    <span class="text-danger"><?= $error['pwd2'] ?></span>
                <?php endif; ?>
                <span class="text-danger" id="error_pwd"></span><br>
                <span class="text-danger" id="error_pwd2"></span><br>
                <span class="text-danger" id="error_form"></span>
                <hr>
                <button type="submit" class="btn btn-warning" name="submit_inscription" id="submit_inscription">S'inscrire</button>
                <hr>
                <div>
                    <p class="my-2">Vous avez déjà un compte ?</p>
                    <a href="?page=index" class="btn btn-warning">Se connecter</a>
                </div>
            </form>
        </div>
        <script src="js/check_form.js"></script>
        <script src="js/progress_bar_mdp.js"></script>
    </div>