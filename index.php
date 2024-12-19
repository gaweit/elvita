<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">
    <style>
    /* Pastikan seluruh halaman menggunakan flexbox */
    html,
    body {
        height: 100%;
        margin: 0;
        display: flex;
        flex-direction: column;
    }

    /* Kontainer utama untuk konten */
    .content {
        flex: 1;
        /* Memaksa konten utama untuk mengisi ruang yang tersedia */
    }

    /* Gaya untuk footer */
    footer {
        background-color: #e9ecef;
        color: #6c757d;
        text-align: center;
        padding: 10px 0;
    }

    /* Navbar */
    .navbar {
        height: 150px;
        background: linear-gradient(to bottom, #002f4b, #004a99);
        color: white;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 20px;
    }

    .navbar .btn {
        font-weight: bold;
        padding: 10px 20px;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .navbar-brand {
        font-size: 2.5rem;
    }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar" style="background: linear-gradient(to bottom, #002f4b, #004a99); height: 150px;">
        <div class="navbar-brand" style="color: white;">
            <b>Sistem Akademik</b>
        </div>
        <div>
            <a href="register.php" class="btn btn-primary">
                <i class="fa fa-user"></i>
                Register Akun
            </a>
            <a href="login.php" class="btn btn-warning">
                <i class="fa fa-user"></i>
                Login
            </a>
        </div>
    </nav>

    <!-- Konten Utama -->
    <div class="content container">
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">BIODATA</div>
                    <div class="card-body">
                        <table style="width: 100%;">
                            <tr style="text-transform: uppercase;">
                                <td>Nama </td>
                                <td>: Elvita </td>
                            </tr>
                            <tr style="text-transform: uppercase;">
                                <td>Nim </td>
                                <td>: Elvita </td>
                            </tr>
                            <tr style="text-transform: uppercase;">
                                <td>Kelas </td>
                                <td>: Elvita </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center">
        <p>&copy; 2024 Sistem Informasi Akademik. All Rights Reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>