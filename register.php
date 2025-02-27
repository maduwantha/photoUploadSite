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
    $userName = "";
    $email = "";

    if (!empty($_POST['regBtn'])) {
        $userName = $_POST['fullname'];
        $email = $_POST['email'];

        if ($_POST['password'] == $_POST['con_password']) {
            try {
                $sql = "INSERT INTO users (email,full_name,password) value ('" . $_POST['email'] . "','" . $_POST['fullname'] . "','" . md5($_POST['password']) . "') ";
                if (!mysqli_query($mysql, $sql)) {
                    throw new Exception("mysql Erro" . mysqli_error($mysql));
                } else {
                    $error = '<div class="alert alert-success" role="alert"> Registration Sucess</div>';
                }
            } catch (Exception $e) {
                $error = '<div class="alert alert-danger" role="alert"> ' . $e->getMessage() . '</div>';
            }
            // $sql = "INSERT INTO users (email,full_name,password) value ('" . $_POST['email'] . "','" . $_POST['fullname'] . "','" . $_POST['password'] . "') ";
            // mysqli_query($mysql, $sql);
        } else {
            $error = '<div class="alert alert-danger" role="alert"> Password Does Not Match</div>';
        }
    }

    ?>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow" style="width: 100%; max-width: 400px;">
            <div class="card-body">
                <h1 class="card-title text-center mb-4">Register</h1>
                <div>
                    <?php
                    echo $error;
                    ?>
                </div>
                <form method="post">
                    <div class="mb-3">
                        <label for="fullName" class="form-label">Full Name</label>
                        <input name="fullname" type="text" class="form-control" id="fullName" value="<?php echo $userName; ?>" placeholder="Enter your full name"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" id="email" value="<?php echo $email; ?>" placeholder="Enter your email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input name="password" type="password" class="form-control" id="password" placeholder="Enter your password"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                        <input name="con_password" type="password" class="form-control" id="confirmPassword"
                            placeholder="Confirm your password" required>
                    </div>
                    <input type="submit" name="regBtn" class="btn btn-success w-100" value="Register" />
                </form>
                <p class="text-center mt-3">Already have an account? <a href="index.php">Login</a></p>
            </div>
        </div>
    </div>
</body>

</html>