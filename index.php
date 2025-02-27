<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php

    $mysql = new mysqli("localhost", "root", "", "photo_site");
    if ($mysql->connect_errno) {
        echo "fail" . $mysqli->connect_errno;
    }
    $error = "";
    if (!empty($_POST['login'])) {
        // echo $_POST['email'];
        // echo $_POST['password'];
        $error = '<div class="alert alert-danger" role="alert"> User Name or Password Incorrect</div>';
        $sql = "select * from users where email = '" . $_POST['email'] . "' and password = '" . md5($_POST['password']) . "'  ";
        $result = mysqli_query($mysql, $sql);
        while ($row = mysqli_fetch_array($result)) {
            //echo $row['id'] . $row['email'];
            header("Location: home.php");
            exit();
        }
    }
    ?>
    <div id="login" class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow" style="width: 100%; max-width: 400px;">
            <div class="card-body">
                <h1 class="card-title text-center mb-4">Login</h1>
                <div>
                    <?php
                    echo $error;
                    ?>
                </div>
                <form method="post">
                    <div class="mb-3">
                        <label for="loginEmail" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="loginEmail" placeholder="Enter your email"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="loginPassword" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="loginPassword" placeholder="Enter your password"
                            required>
                    </div>
                    <input name="login" type="submit" class="btn btn-primary w-100" vlue="Login" />
                </form>
                <p class="text-center mt-3">Don't have an account? <a href="register.php">Register</a></p>
            </div>
        </div>
    </div>
</body>

</html>