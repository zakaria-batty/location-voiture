<?php
include('../../includes/header.php');
include('../../includes/db.php');

if (isset($_POST['Ajouter'])) :

    $dir = "../../images/";
    $target = $dir . basename($_FILES['img']['name']);

    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target)) {
    }


    $fill = $_FILES['img']['name'];

    $Marque = htmlentities($_POST['marque']);
    $Modele = htmlentities($_POST['model']);
    $Moteur = htmlentities($_POST['moteur']);
    $prix = htmlentities($_POST['prix']);
    $img = $fill;

    $query = "INSERT INTO `vehicule` (`id`, `picture`, `marque`, `model`, `moteur`, `prix`, `nom`, `prenom`, `telephone`, `jours`, `status`)
             VALUES ('', '$img', '$Marque', '$Modele', '$Moteur', '$prix', '', '', '', '', 'disponible')";
    $run = mysqli_query($db, $query);

    if ($run) {
        header('location:../view.php?message=ajouter');
    } else {
        header('location:../view.php?message=err');
    }
endif;
