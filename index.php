<?php
include('includes/header.php');
include('includes/db.php');
?>

<div class="back">
    <div class="back ">
        <div class="container">
            <div class="row">
                <h5 class="card-logo text-white mt-4" style="font-size: 3rem;">Ag<span style="color: red;">enc</span>e Ka<span style="color: red;">wt</span>ar</h5>
                <div class="col-md-6 mx-auto" style="margin-top: 12rem;">
                    <nav class="mx-auto">
                        <a href="?disponible=true" class="btn btn-sm btn-dark  p-2 mt-4">
                            <i class="fas fa-car"> les véhicule disponible</i>
                        </a>
                        <a href="?vehicule=true" class="btn btn-sm btn-dark p-2 mt-4 ">
                            <i class="fas fa-car"> Tout les véhicule </i>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="row col-lg-12 mx-auto" style="justify-content: center;">
                <?php
                if (isset($_GET['message']) && $_GET['message'] == 'reservé') :
                    echo "<div class='alert alert-success mt-4' style='width:100%;text-align: center;'>le véhicule resérvé a été avec succès</div>";
                endif;
                ?>

            <div class="row row-cols-1 row-cols-md-3 mx-auto my-4">
                <!-- -----------------------section-les véhicule disponible----------------------------- -->
                <?php if (isset($_GET['disponible'])) : ?>
                    <?php
                    $query = "SELECT * FROM vehicule WHERE status = 'disponible'";
                    $run = mysqli_query($db, $query);
                    while ($data = mysqli_fetch_array($run)) {
                    ?>
                        <div class="col mb-4">
                            <div class="card h-100 card-top">
                                <img src="images/<?= $data['picture'] ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $data['marque'] ?></h5>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">models : <?= $data['model'] ?></li>
                                    <li class="list-group-item"> <?= $data['moteur'] ?></li>
                                    <li class="list-group-item">Prix : <?= $data['prix'] ?>$ un seul jour</li>
                                </ul>
                                <div class="card-body">
                                    <a href="réserve/reservation.php?id=<?= $data['id'] ?>" class="card-link btn btn-primary btn-block">réserve</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php else : ?>
                    <!-- -----------------------Tout les véhicule----------------------------- -->

                    <?php
                    $query = "SELECT * FROM vehicule ";
                    $run = mysqli_query($db, $query);
                    while ($data = mysqli_fetch_array($run)) {
                    ?>
                        <div class="col mb-4">
                            <div class="card h-100 card-top">
                                <img src="images/<?= $data['picture'] ?>" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $data['marque'] ?></h5>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">models : <?= $data['model'] ?></li>
                                    <li class="list-group-item"> <?= $data['moteur'] ?></li>
                                </ul>
                            </div>
                        </div>
                    <?php } ?>


                <?php endif; ?>
            </div>
        </div>
    </div>

</div>
<div class="card-footer bg-secondary text-white p-4" style="text-align: center;">
    <h5 class="card-title">Copyright © Kawtar</h5>
    <p class="card-text">kawtar@gmail.com</p>
</div>
<?php
include('includes/footer.php');
?>