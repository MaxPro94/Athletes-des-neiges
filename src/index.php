<?php
$title = 'Bienvenue';

if (isset($_POST['submit_connex'])) {
    $error = [];
    if (!empty($_POST['mail'] && !empty($_POST['pwd']))) {
        $mail = $_POST['mail'];
        $pwd = $_POST['pwd'];
    } else {
        $error['input'] = "Les champs sont obligatoires";
    }

    $requete_verif_mail = $dbh->prepare("SELECT COUNT(*) as nb FROM utilisateur WHERE mail = :mail");
    $requete_verif_mail->execute([
        'mail' => $mail
    ]);
    $result_verif_mail = $requete_verif_mail->fetch();

    if ($result_verif_mail['nb'] < 1) {
        $error['mail'] = "Aucune adresse mail trouver a se nom";
    }

    $requete_connex = $dbh->prepare("SELECT * FROM utilisateur WHERE mail = :mail");
    $requete_connex->execute([
        'mail' => $mail
    ]);
    $result_connex = $requete_connex->fetch();
    $salt = "th4";

    if (password_verify($pwd . $salt, $result_connex['password'])) {
        $_SESSION['user_id'] = $result_connex['id_user'];
        $_SESSION['name'] = $result_connex['firstname'];
        header('Location: acceuil');
    } else {
        $error['pwd'] = "Le mot de passe n'est pas valide, avez vous oubliez votre mot de passse ?";
    }
}
