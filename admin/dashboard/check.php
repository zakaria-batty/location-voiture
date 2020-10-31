<?php
include('../../includes/db.php');


// supprimer les vehicules 
if (isset($_POST['supprimer'])) {
    $id = $_POST['supprimer'];
    $query = "DELETE FROM `vehicule` WHERE `id` = '$id'";
    $run = mysqli_query($db, $query);
    if ($run) {
        header('location:../view.php');
    }
}

//  les vehicules accepter
if (isset($_POST['accepter'])) {
    $id = $_POST['accepter'];
    $query = "UPDATE vehicule SET  `status`= 'accepter'  WHERE id= '$id'";
    $run = mysqli_query($db, $query);
    if ($run) {
        header('location:../view.php');
    }
}

//  les vehicules refuse 
if (isset($_POST['refuse'])) {
    $id = $_POST['refuse'];
    $query = "UPDATE vehicule SET  `status`= 'disponible'  WHERE id= '$id'";
    $run = mysqli_query($db, $query);
    if ($run) {
        header('location:../view.php');
    }
}