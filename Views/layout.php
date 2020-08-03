<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= (isset($pageTitle) ? $pageTitle : '') ?></title>
    <base href="http://<?= $server . str_replace('index.php', '', $_SERVER['SCRIPT_NAME']) ?>">
    <link rel="stylesheet" href="public/assets/bootstrap-4.5.0-dist/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a href="#" class="navbar-brand nav-item"><?= (isset($pageTitle) ? $pageTitle : '') ?></a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Add <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Check-ins
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Manage visitors</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Manage expected visitors</a>
                    <a class="dropdown-item" href="#">Manage expected groups</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Import visitors</a>
                    <a class="dropdown-item" href="#">Import expected group</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Visitors
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/visitor/index">Manage visitors</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Manage expected visitors</a>
                    <a class="dropdown-item" href="#">Manage expected groups</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Import visitors</a>
                    <a class="dropdown-item" href="#">Import expected group</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Employees
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="employee/index">Manage employees</a>
                    <a class="dropdown-item" href="#">View deleted employees</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Import employees</a>
                </div>
            </li>

        </ul>
    </div>
</nav>

<div class="container mt-4">
    <?php
    /** @var $pageContent */
    echo $pageContent
    ?>
</div>


<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
