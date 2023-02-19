<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Setup DB</title>
  <!-- Css Bootsrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <!-- Bootstrap Icon -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <!-- custom CSS -->
  <link rel="stylesheet" href="assets/style.css">
</head>

<body>
  <form action="proses/setup-DB.php" method="post">
    <div class="container d-flex align-items-center justify-content-center">

      <div class="box shadow p-3 mb-5 bg-body-tertiary rounded">
        <h3 class="text-center mt-3 text-info">Setup Database</h3>
        <div id="wrapper-form">
          <div class="form-floating mb-3">
            <input type="text" name="host" class="form-control" id="hostInput" placeholder="HOST DATABASE">
            <label for="hostInput">Host</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" name="username" class="form-control" id="usernameInput" placeholder="USERNAME DATABASE">
            <label for="usernameInput">Username</label>
          </div>

          <div class="form-floating mb-3">
            <input type="password" name="password" class="form-control" id="passwordInput" placeholder="Password">
            <label for="passwordInput">Password</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" name="DB" class="form-control" id="DBInput" placeholder="Nama Database">
            <label for="DBInput">NAMA DATABASEB</label>
          </div>
          <div class="d-grid gap-2">
            <button type="submit" class="btn btn-info btn-lg">Masuk</button>
          </div>
        </div>
      </div>

    </div>
  </form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
  </script>
  <script src="assets/script.js"></script>
</body>

</html>