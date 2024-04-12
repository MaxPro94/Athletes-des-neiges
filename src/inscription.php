<?php

$title = "Inscription";

if (isset($_POST['submit_inscription'])) {
    $error = [];
    $mail = $_POST['mail'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $pwd = $_POST['pwd'];
    $pwd2 = $_POST['pwd2'];

    if (empty($mail || !filter_var($mail, FILTER_VALIDATE_EMAIL))) {
        $error['mail'] = "Votre e-mail n'est pas valide";
    }

    $requete_verif_mail = $dbh->prepare("SELECT COUNT(*) as nb FROM utilisateur WHERE mail = '$mail'");
    $requete_verif_mail->execute();
    $verif_mail = $requete_verif_mail->fetch();

    if ($verif_mail['nb'] > 0) {
        $error['mail'] = "Ce mail existe déja, veuillez en choisir un autre.";
    }

    if (empty($lastname || strlen($lastname) <= 1)) {
        $error['lastname'] = "Votre nom n'est pas valide, il doit comporter plus d'une lettre";
    }

    if (empty($firstname || strlen($firstname) <= 1)) {
        $error['firstname'] = "Votre prénom n'est pas valide, il doit comporter plus d'une lettre";
    }

    if (empty($pwd || strlen($pwd) < 8)) {
        $error['pwd'] = "Votre mot de passe doit contenir au moins 8 caractères";
    }

    if (empty($pwd2 || strlen($pwd2) < 8)) {
        $error['pwd2'] = "Votre mot de passe doit contenir au moins 8 caractères";
    }

    if (!preg_match('/^((?=.*[A-Z]).*(?=.*[a-z]).*(?=.*[\W_]).{6,})$/', $pwd)) {
        $error['pwd'] = "Le mot de passe renseigner doit contenir entre 8 et 32 carcatères avec des minuscules, des MAJUSCULES et des caractères spéciaux comme @,$,€,*,^,§,%,&.";
    }

    if ($pwd === $pwd2) {
        $salt = "th4";
        $pwd = password_hash($pwd . $salt, PASSWORD_BCRYPT);
    } else {
        $error['pwd'] = "Vos deux mot de passes ne correspondent pas";
    }



    if (empty($error)) {


        $requete = $dbh->prepare("INSERT INTO utilisateur (lastname, firstname, mail, password) VALUES (:lastname, :firstname, :mail, :password)");
        $requete->execute([
            'lastname' => $lastname,
            'firstname' => $firstname,
            'mail' => $mail,
            'password' => $pwd
        ]);

        if ($dbh->lastInsertID()) {
            session_start();

            $requete_user = $dbh->prepare("SELECT * FROM utilisateur WHERE mail = :mail");
            $requete_user->execute([
                'mail' => $mail
            ]);
            $result_user = $requete_user->fetch();

            $_SESSION['user_id'] = $result_user['id_user'];
            $_SESSION['name'] = $result_user['lastname'];
            $_SESSION['firstname'] = $result_user['firstname'];
        }
    } else {
        var_dump($erreur);
    }
}
