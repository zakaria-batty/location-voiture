<?php
include('../../includes/header.php');
include('../../includes/db.php');

$id = isset($_GET['id']) ? $_GET['id'] : '';


$query = "SELECT * FROM vehicule WHERE id='$id'";
$run = mysqli_query($db, $query);
$data = mysqli_fetch_array($run);


if (isset($_POST['modifier'])) :

    $id1 = htmlentities($_POST['id']);
    $Marque = htmlentities($_POST['marque']);
    $Model = htmlentities($_POST['model']);
    $Moteur = htmlentities($_POST['moteur']);
    $Prix = htmlentities($_POST['prix']);

    $query = "UPDATE vehicule SET  `marque`= '$Marque', `model` = '$Model', `Moteur` = '$Moteur', `prix` = '$Prix' WHERE id= '$id1'";
    $run = mysqli_query($db, $query);
    if ($run) {
        header('location:../view.php?message=modifier');
    } else {
        header('location:modifier.php?message=err');
    }
endif;

?>
<div class="container-fluid">
    <div class="row">
        <?php
        if (isset($_GET['msg']) && $_GET['msg'] == 'err') :
            echo "<div class='alert alert-danger mt-4 p-2'>Veuillez réessayer</div>";
        endif;
        ?>
        <div class="row col-lg-12 mx-auto">
            <a href="../view.php" class="btn btn-sm btn-dark my-4">
                <i class="fas fa-home"></i>
            </a>
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="../../images/<?= $data['picture'] ?>" class="card-img-top" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <form method="post" action="">
                                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                <div class="form-group">
                                    <label for="nom">Marque</label>
                                    <input type="text" name="marque" class="form-control" value="<?= isset($data['marque']) ? $data['marque'] : ''; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="depart">Modele</label>
                                    <input type="text" name="model" class="form-control" value="<?= isset($data['model']) ? $data['model'] : ''; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="poste">type d'un moteur</label>
                                    <input type="text" name="moteur" class="form-control" value="<?= isset($data['moteur']) ? $data['moteur'] : ''; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="prenom">Prix un seul jour</label>
                                    <input type="number" name="prix" class="form-control" value="<?= isset($data['prix']) ? $data['prix'] : ''; ?>">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit" name="modifier" style="width: 17rem;">Modifier le véhicule</button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('../../includes/footer.php');
?>