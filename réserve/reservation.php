<?php
include('../includes/header.php');
include('../includes/db.php');

$id = isset($_GET['id']) ? $_GET['id'] : '';


$query = "SELECT * FROM vehicule WHERE id='$id'";
$run = mysqli_query($db, $query);
$data = mysqli_fetch_array($run);


if (isset($_POST['reserve'])) :

    $id1 = htmlentities($_POST['id']);
    $nom = htmlentities($_POST['nom']);
    $prenom = htmlentities($_POST['prenom']);
    $telephone = htmlentities($_POST['telephone']);
    $jours = htmlentities($_POST['jours']);

    $query = "UPDATE vehicule SET  `nom`= '$nom', `prenom` = '$prenom', `telephone` = 'telephone', `jours` = '$jours', `status` = 'reservé' WHERE id= '$id1'";
    $run = mysqli_query($db, $query);
    if ($run) {
        header('location:../index.php?message=reservé');
    } else {
        header('location:modifier.php?message=err');
    }
endif;

?>

<div class="container-fluid">
    <div class="row">
        <div class="row col-lg-12 mx-auto">
            <a href="../index.php" class="btn btn-sm btn-primary my-4">
                <i class="fas fa-home"></i>
            </a>
            <?php
         
            if (isset($_GET['msg']) && $_GET['messagesg'] == 'err') :
                echo "<div class='alert alert-danger'>Veuillez réessayer</div>";
            endif;
            ?>

            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="../images/<?= $data['picture'] ?>" class="card-img-top" alt="...">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item "><?= $data['marque'] ?></li>
                            <li class="list-group-item">models : <?= $data['model'] ?></li>
                            <li class="list-group-item"> <?= $data['moteur'] ?></li>
                            <li class="list-group-item">Prix : <?= $data['prix'] ?>$ un seul jour</li>
                        </ul>
                        </ul>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <form method="post" action="">
                                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                <div class="form-group">
                                    <label for="nom">Nom</label>
                                    <input type="text" name="nom" class="form-control" placeholder="Entre le nom">
                                </div>
                                <div class="form-group">
                                    <label for="prenom">Prénom</label>
                                    <input type="text" name="prenom" class="form-control" placeholder="Entre le prenom">
                                </div>
                                <div class="form-group">
                                    <label for="depart">Téléphone*</label>
                                    <input type="text" name="telephone" class="form-control" placeholder="Entreé le numéro de téléphone">
                                </div>
                                <div class="form-group">
                                    <label for="poste">Nombre de jours</label>
                                    <input type="number" name="jours" class="form-control" placeholder="Entrez le nombre de jours">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit" name="reserve" style="width: 17rem;">réserve</button>
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
include('../includes/footer.php');
?>