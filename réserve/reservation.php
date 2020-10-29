<?php
include('../includes/header.php');
?>

<div class="container-fluid">
    <div class="row">
        <div class="row col-lg-12 mx-auto">
            <a href="index.php" class="btn btn-sm btn-primary my-4">
                <i class="fas fa-home"></i>
            </a>
            <?php
            if (isset($_GET['message']) && $_GET['message'] == 'ajouter') :
                echo "<div class='alert alert-success'>le demande ajouter a été avec succès</div>";
            endif;
            if (isset($_GET['msg']) && $_GET['msg'] == 'err') :
                echo "<div class='alert alert-danger'>Veuillez réessayer</div>";
            endif;
            ?>

            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="../images/Bmw (1).jpg" class="card-img-top" alt="...">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item ">Mercedes amge</li>
                            <li class="list-group-item">models : 2019</li>
                            <li class="list-group-item">diesel</li>
                            <li class="list-group-item">Prix : 80$ un seul jour</li>
                        </ul>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <form method="post" accept="">
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