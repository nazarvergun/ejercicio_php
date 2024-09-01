

<?php
session_start(); // Iniciando sesion

// Verificacion
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['email'];
    $password = $_POST['password'];
    
    // Validando email
    if (empty($email)) {
        showMessage('Email is required.');
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        showMessage('Invalid email format.');
    } elseif (empty($password)) {
        showMessage('Password is required.');
    } elseif (strlen($password) < 6) {
        showMessage('Password must be at least 6 characters long.');
    } elseif (stripos($password, 'password') !== false || stripos($password, '123456') !== false) {
        showMessage('Password cannot contain "password" or "123456".');
    }

    // Guardando la informacion en variables
    $_SESSION['email'] = $username;
    $_SESSION['password'] = $password;

    // Redirigiendo a otra pagina
    header("Location: login.php");
    exit(); 
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda online PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="index.html">LOGO</a>
        <ul class="nav justify-content-end">
            <a class="link" href="#">Servicios</a>
            <a class="link" href="#">Sobre nosotros</a>
            <a class="link" href="#">Contacto</a>
            <li class="nav-item">
                 <a class="btn btn-outline-light" href="#" >Login</a>
            </li>
        </ul>
    </nav>
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-6">
                <form action="index.php" method="POST">
    <div class="row mb-3">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
    </div>
    <div class="row mb-3">
        <label for="password" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Login</button> <span><?php echo $error ?></span>
</form>


                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4"></div>
                <div class="col-4">Autor: Tú</div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>