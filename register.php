<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $full_name = $_POST['full_name'];
    $address = $_POST['address'];
    $date_of_birth = $_POST['date_of_birth'];
    $gender = $_POST['gender'];
    // $role = 'admin'; // Default role
    $role = $_POST['role'];


    // Upload file profile picture
    $profile_picture = 'default.png'; // Default profile picture
    if (!empty($_FILES['profile_picture']['name'])) {
        $target_dir = "uploads/profile_pictures/"; // Folder tujuan
        $profile_picture = $target_dir . basename($_FILES['profile_picture']['name']);
        if (!move_uploaded_file($_FILES['profile_picture']['tmp_name'], $profile_picture)) {
            $error = "Gagal mengunggah gambar profil.";
        }
    }

    // Insert data ke database
    if (!isset($error)) {
        $stmt = $koneksi->prepare("INSERT INTO users (username, password, email, phone_number, full_name, address, profile_picture, date_of_birth, gender, role) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssss", $username, $password, $email, $phone_number, $full_name, $address, $profile_picture, $date_of_birth, $gender, $role);

        if ($stmt->execute()) {
            header("Location: login.php?success=1"); // Redirect ke halaman login
            exit();
        } else {
            $error = "Pendaftaran gagal. Silakan coba lagi.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Register</h2>
        <?php if (isset($error)) : ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="phone_number" class="form-label">Phone Number:</label>
                <input type="text" name="phone_number" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="full_name" class="form-label">Full Name:</label>
                <input type="text" name="full_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address:</label>
                <textarea name="address" class="form-control" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="date_of_birth" class="form-label">Date of Birth:</label>
                <input type="date" name="date_of_birth" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender:</label>
                <select name="gender" class="form-control" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role:</label>
                <select name="role" class="form-control" required>
                    <!-- <option value="admin">admin</option> -->
                    <option value="guru">guru</option>
                    <option value="siswa">siswa</option>
                    <option value="pimpinan">pimpinan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="profile_picture" class="form-label">Profile Picture:</label>
                <input type="file" name="profile_picture" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
            <a href="index.php" class="btn btn-danger"> Kembali</a>
        </form>
    </div>
    <br>
    <br>
    <br>
    <br>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>