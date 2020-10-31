<?php
include('../includes/header.php');
include('../includes/db.php');
?>
<!-- -------------------main-------------------------- -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mx-auto my-4">

                <!-- -------------------header-------------------------- -->
                <div class="card-header">
                    <nav class="mx-auto">
                        <a href="?home=true" class="btn btn-sm btn-dark  p-2 mt-4">
                            <i class="fas fa-home"></i>
                        </a>
                        <a href="?ajouter=true" class="btn btn-sm btn-dark  p-2 mt-4">
                            <i class="fas fa-plus"> Ajouter les véhicule </i>
                        </a>
                        <a href="?reserve=true" class="btn btn-sm btn-dark p-2 mt-4 ">
                            <i class="fas fa-car"> le demande de réservé</i>
                        </a>
                        <a href="index.php" class="btn btn-sm btn-dark p-2 mt-4 ">
                            Deconnecte
                        </a>
                    </nav>
                    <!-- ------------------------------------------ -->
                    <?php
                    if (isset($_GET['message']) && $_GET['message'] == 'modifier') :
                        echo "<div class='alert alert-success mt-4 p-2'>le véhicule Modifié a été avec succès</div>";
                    endif;

                    if (isset($_GET['message']) && $_GET['message'] == 'ajouter') :
                        echo "<div class='alert alert-success mt-4'> ajouter véhicule a été avec succès</div>";
                    endif;
                    if (isset($_GET['msg']) && $_GET['message'] == 'err') :
                        echo "<div class='alert alert-danger'>Veuillez réessayer</div>";
                    endif;
                    ?>

                </div>

                <?php if (isset($_GET['reserve'])) : ?>

                    <!-- ------------------------section-reserve------------------------------ -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">la Marque</th>
                                    <th scope="col">Model</th>
                                    <th scope="col">Moteur</th>
                                    <th scope="col">Prix</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Prenom</th>
                                    <th scope="col">Téléphone</th>
                                    <th scope="col">Nombre de jours</th>
                                    <th scope="col">Setting</th>
                                    <th scope="col">demande</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                <?php
                                $query = "SELECT * FROM vehicule WHERE status = 'réservé'";
                                $run = mysqli_query($db, $query);
                                while ($data = mysqli_fetch_array($run)) {
                                ?>
                                    <tr>
                                        <td>
                                            <img src="../images/<?= $data['picture'] ?>" alt="" style="width: 11rem;">
                                        </td>
                                        <td><?= $data['marque'] ?></td>
                                        <td><?= $data['model'] ?></td>
                                        <td><?= $data['moteur'] ?></td>
                                        <td><?= $data['prix'] ?>$</td>
                                        <td><?= $data['nom'] ?></td>
                                        <td><?= $data['prenom'] ?></td>
                                        <td><?= $data['telephone'] ?></td>
                                        <td><?= $data['jours'] ?>jours</td>
                                        <td class="d-flex flex-row">
                                            <form method="post" action="dashboard/check.php">
                                                <input type="hidden" name="accepter" value="<?= $data['id'] ?>">
                                                <button class="btn bnt-sm btn-success" title="accepter"><i class="fa fa-check"></i></button>
                                            </form>
                                            <form method="post" action="dashboard/check.php">
                                                <input type="hidden" name="refuse" value="<?= $data['id'] ?>">
                                                <button class="btn bnt-sm btn-danger" title="refuser"><i class="fas fa-minus-circle"></i></button>
                                            </form>
                                        </td>
                                        <td><?= $data['status'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- ------------------------section-ajouter------------------------------ -->
                <?php elseif (isset($_GET['ajouter'])) : ?>

                    <div class="card-header bg-dark text-white">Ajouter un voiture</div>
                    <div class="card-body ">
                        <form method="post" action="dashboard/ajouter.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="nom">choose image véhicule</label>
                                <div class="custom-file">
                                    <input type="file" name="img" class="custom-file-input" required>
                                    <label class="custom-file-label" for="cv">Choose Image...</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nom">Marque</label>
                                <input type="text" name="marque" class="form-control" placeholder="Marque">
                            </div>
                            <div class="form-group">
                                <label for="depart">Modele</label>
                                <input type="text" name="model" class="form-control" placeholder="2018 .... 2020">
                            </div>
                            <div class="form-group">
                                <label for="poste">type d'un moteur</label>
                                <input type="text" name="moteur" class="form-control" placeholder="diesel / essence">
                            </div>
                            <div class="form-group">
                                <label for="prenom">Prix un seul jour</label>
                                <input type="number" name="prix" class="form-control" placeholder="Prix">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit" name="Ajouter" style="width: 17rem;">Ajouter Véhicule</button>
                            </div>
                        </form>
                    </div>


                    <!-- ------------------------section-home------------------------------ -->
                <?php else : ?>

                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">la Marque</th>
                                <th scope="col">Model</th>
                                <th scope="col">Moteur</th>
                                <th scope="col">Prix</th>
                                <th scope="col">Seting</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            <?php
                            $query = "SELECT * FROM vehicule";
                            $run = mysqli_query($db, $query);
                            while ($data = mysqli_fetch_array($run)) {
                            ?>
                                <tr>
                                    <td>
                                        <img src="../images/<?= $data['picture'] ?>" alt="" style="width: 11rem;">
                                    </td>
                                    <td><?= $data['marque'] ?></td>
                                    <td><?= $data['model'] ?></td>
                                    <td><?= $data['moteur'] ?></td>
                                    <td><?= $data['prix'] ?>$</td>
                                    <td class="d-flex flex-row">
                                        <a href="dashboard/modifier.php?id=<?= $data['id'] ?>" class="btn bnt-sm btn-warning mr-1"><i class="fa fa-edit"></i></a>
                                        <form method="post" action="dashboard/check.php">
                                            <input type="hidden" name="supprimer" value="<?= $data['id'] ?>">
                                            <button class="btn bnt-sm btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php
include('../includes/footer.php');
?>