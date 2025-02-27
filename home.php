<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Folder Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .folder-icon {
            font-size: 50px;
            color: #4CAF50;
        }

        .folder-name {
            margin-top: 10px;
            font-weight: bold;
        }

        .folder {
            text-align: center;
            background-color: #fff;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .folder:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body>
    <?php
    $mysql = new mysqli("localhost", "root", "", "photo_site");
    if ($mysql->connect_errno) {
        echo "fail" . $mysqli->connect_errno;
    }
    session_start();
    //var_dump($_SESSION);;
    if (!isset($_SESSION['User_obj'])) {
        header("Location: index.php");
        die();
    }
    // echo '<pre>';
    // print_r($_SESSION['User_obj']);
    // echo '</pre>';
    ?>

    <div class="container mt-5">

        <!-- Logged-in User Info -->
        <div class="user-info">
            <h4>Welcome, <span id="userName"><?php echo $_SESSION['User_obj']['full_name']; ?></span></h4>
            <p>Email: <span id="userEmail"><?php echo $_SESSION['User_obj']['email']; ?></span></p>
            <a href="logout.php"><button class="btn btn-danger" onclick="">Logout</button></a>
        </div>

        <!-- Folder Creation Form -->
        <div class="mb-4">
            <?php
            if (!empty($_POST['create_folder'])) {
                $sql = "insert into folders (user_id, folder_name) values ('" . $_SESSION['User_obj']['id'] . "', '" . $_POST['folder_name'] . "') ";
                mysqli_query($mysql, $sql);
            }

            ?>
            <h2>Create Folder</h2>

            <form method="post">
                <div class="input-group">
                    <input type="text" name="folder_name" class="form-control" placeholder="Enter folder name" required>
                    <input type="submit" name="create_folder" class="btn btn-primary" value="Create Folder" />
                </div>
            </form>
        </div>

        <!-- Folder Grid View -->
        <h3>Folder List</h3>
        <div class="row" id="folderGrid">
            <!-- Folder Example -->
            <?php
            $sql = "select * from folders where user_id =  " . $_SESSION['User_obj']['id'];
            $result = mysqli_query($mysql, $sql);
            while ($row = mysqli_fetch_array($result)) {
                echo '<div class="col-md-3 mb-4 folder">';
                echo '<div class="folder-icon">&#128194;</div>';
                echo '<div class="folder-name">' . $row['folder_name'] . '</div>';
                echo '<div style="font-size: 12px; color: #555;" class="folder-date">' . $row['create_date'] . '</div>';
                echo '</div>';
            }
            ?>


        </div>
    </div>

    <!-- Folder Details (Images Uploading) -->
    <div class="container mt-5" id="folderDetails" style="display: none;">
        <h2 id="folderTitle">Folder Details</h2>
        <div id="imageGrid" class="row mb-4">
            <!-- Images will be displayed here -->
            <div class="col-md-3 mb-2">
                <img src="image1.jpg" class="img-fluid" alt="Image 1">
            </div>
            <div class="col-md-3 mb-2">
                <img src="image2.jpg" class="img-fluid" alt="Image 2">
            </div>
        </div>
        <div>
            <label for="uploadImage" class="form-label">Upload Image</label>
            <input type="file" id="uploadImage" class="form-control mb-3">
            <button class="btn btn-success">Upload Image</button>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>

</html>