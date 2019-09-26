<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Register account</title>
    <!-- Bootstrap core CSS-->
    <link href="/qlsv/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</head>

<body class="">
    <div class="container">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">Register an Account</div>
            <div class="card-body">
                <!-- <form method="post" action="register.php"> -->
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-12">
                            <label for="exampleInputName">Username</label>
                            <input class="form-control" id="InputName" type="text" name="username" value="">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="is_tearcher">Role</label>
                    <input class="form-control" id="is_tearcher" type="int" placeholder="tearcher is 1 - student is 0" name="email" value="">
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <label for="exampleInputPassword1">Password</label>
                        <input class="form-control" id="exampleInputPassword1" type="password" name="password_1">
                    </div>
                </div>
            </div>
            <div class="align-self-center mx-auto">
                <button type="submit" class="btn btn-primary btn-block" name="reg_user">Register</button>
            </div>
            </form>
            <div class="text-center">
                <a class="d-block small mt-3" href="signin.php">Login Page</a>
                <!--- <a class="d-block small" href="forgot-password.html">Forgot Password?</a>-->
            </div>
        </div>
    </div>
    </div>
</body>

</html>