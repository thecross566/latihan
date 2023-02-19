<?php
// Start Session
session_start();

// Cek Session tittle
if (!isset($_SESSION['tittle'])) {
    $_SESSION['tittle'] = 'Home';
}
// Cek User sudah login atatu blm
if (!isset($_SESSION['is_login'])) {
?>
    <meta http-equiv="refresh" content="0; url=../index.php">
    <script>
        alert("Login dulu!")
    </script>

<?php
}
// Call config
include("../config/function.php");
include("../config/koneksi.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= ($_SESSION['tittle'] != '' ? $_SESSION['tittle'] : "Home") ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar bg-secondary navbar-expand-lg " data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a <?= ($_SESSION['tittle'] == 'Home') ? "class='nav-link active'" : "class='nav-link'" ?> aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a <?= ($_SESSION['tittle'] == 'Link') ? "class='nav-link active'" : "class='nav-link'" ?> href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a <?= ($_SESSION['tittle'] == 'A') ? "class='dropdown-item  active'" : "class='dropdown-item'" ?> href="#">Action</a></li>
                            <li><a <?= ($_SESSION['tittle'] == 'B') ? "class='dropdown-item active'" : "class='dropdown-item'" ?> href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a <?= ($_SESSION['tittle'] == 'C') ? "class='dropdown-item active'" : "class='dropdown-item'" ?> href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>
                </ul>
                <!-- <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form> -->
            </div>
        </div>
    </nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>



</body>

</html>