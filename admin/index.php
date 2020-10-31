<?php
include('../includes/header.php');
include('../includes/db.php');


if (isset($_POST['login'])) :

    $useradmin = htmlentities($_POST['useradmin']);
    $password = htmlentities($_POST['password']);

    $query = "SELECT * FROM admin WHERE useradmin = '$useradmin' && password = '$password'";
    $run = mysqli_query($db, $query);

    $result = mysqli_fetch_array($run);
    if ($result) {
        header("location:view.php");
    } else {
        header("location:index.php?message=err");
    }
endif;

?>
<div class="container">
    <div class="row">
        <div class="row col-md-8 mx-auto mt-4">

            <div class="card">
                <div class="row no-gutters">

                    <div class="col-md-4">
                        <img src="../images/old-car-4913719_1920.jpg" class="card-img-top" alt="..." height="100%">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                                <?php
                                if (isset($_GET['message']) && $_GET['message'] == 'err') :
                                    echo "<div class='alert alert-danger'>mauvais nom d'utilisateur ou mot de passe</div>";
                                endif;
                                ?>
                            <form method="post" action="" class="formule p-4">

                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-user-tie text-primary"></i> </div>
                                    </div>
                                    <input type="text" class="form-control" name="useradmin" placeholder="useradmin">
                                </div>

                                <div class="input-group mb-2 mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fas fa-unlock-alt text-primary"></i> </div>
                                    </div>
                                    <input type="password" class="form-control" name="password" placeholder="************">
                                </div>

                                <button type="submit" name="login" class="btn btn-primary">Connection</button>
                            </form>

                        </div>
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