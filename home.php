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

    <div class="container mt-5">

        <!-- Logged-in User Info -->
        <div class="user-info">
            <h4>Welcome, <span id="userName">John Doe</span></h4>
            <p>Email: <span id="userEmail">johndoe@example.com</span></p>
            <button class="btn btn-danger" onclick="logout()">Logout</button>
        </div>

        <!-- Folder Creation Form -->
        <div class="mb-4">
            <h2>Create Folder</h2>
            <form>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Enter folder name" required>
                    <button type="submit" class="btn btn-primary">Create Folder</button>
                </div>
            </form>
        </div>

        <!-- Folder Grid View -->
        <h3>Folder List</h3>
        <div class="row" id="folderGrid">
            <!-- Folder Example -->
            <div class="col-md-3 mb-4 folder">
                <div class="folder-icon">&#128194;</div>
                <div class="folder-name">Folder 1</div>
            </div>
            <div class="col-md-3 mb-4 folder">
                <div class="folder-icon">&#128194;</div>
                <div class="folder-name">Folder 2</div>
            </div>
            <div class="col-md-3 mb-4 folder">
                <div class="folder-icon">&#128194;</div>
                <div class="folder-name">Folder 3</div>
            </div>
            <div class="col-md-3 mb-4 folder">
                <div class="folder-icon">&#128194;</div>
                <div class="folder-name">Folder 4</div>
            </div>
            <div class="col-md-3 mb-4 folder">
                <div class="folder-icon">&#128194;</div>
                <div class="folder-name">Folder 1</div>
            </div>
            <div class="col-md-3 mb-4 folder">
                <div class="folder-icon">&#128194;</div>
                <div class="folder-name">Folder 2</div>
            </div>
            <div class="col-md-3 mb-4 folder">
                <div class="folder-icon">&#128194;</div>
                <div class="folder-name">Folder 3</div>
            </div>
            <div class="col-md-3 mb-4 folder">
                <div class="folder-icon">&#128194;</div>
                <div class="folder-name">Folder 4</div>
            </div>
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