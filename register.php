<?php
session_start();
error_reporting(0);
include('config.php');

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $sql = "INSERT INTO users(name, email, mobile, password) VALUES(:name,:email, :mobile, :password)";
    $query = $db->prepare($sql);
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $db->lastInsertId();
    if ($lastInsertId) {
        $_SESSION['login']=$_POST['username'];
        echo "<script>alert('Thanks For Register, Continue Your Shopping')</script>";
    } else {
        echo "<script>alert('Please Fill All Valid Details')</script>";
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
  <h1>Hello, world!</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </body>
</html>
        <?php include('./inc/header.php'); ?>

        <div class="row justify-content-md-center">
            <div class="col-4">
                <form class="text-center border border-light p-5" method="post">
                    <p class="h4 mb-4">Sign up</p>
                    <input name="name" type="text" class="form-control mb-4" placeholder="Name" required>
                    <input name="email" type="email" class="form-control mb-4" placeholder="Email" required>
                    <input name="mobile" type="number" class="form-control mb-4" placeholder="Mobile" required>
                    <input name="password" type="password" class="form-control mb-4" placeholder="Password" required>

                    <input class="btn btn-dark btn-block my-4" name="submit" type="submit" value="Register">
                    <p>Already Registerd?
                        <a href="login.php">Login</a>
                    </p>
                </form>
            </div>
        </div>
        <?php include('./inc/footer.php'); ?>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>
