<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= (isset($pageTitle) ? $pageTitle : '') ?></title>
    <base href="http://<?= $server . str_replace('index.php', '', $_SERVER['SCRIPT_NAME']) ?>">
    <link rel="stylesheet" href="public/css/dashboard.css">
    <link rel="stylesheet" href="public/css/htmleditor.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
</head>
<body>

<nav>
    <ul>
        <li class="title">Admin Dashboard</li>
        <li>
            <div class="userinfo">
                <div class="col">
                    <img src="https://cdn.iconscout.com/icon/free/png-512/avatar-372-456324.png" alt="">
                </div>
                <div class="col">
                    {{ username }}
                    <a href="#" class=""><small>Logout</small></a>
                </div>

            </div>
        </li>
        <li class="dropdown">
            <a><span><i class="far fa-newspaper"></i> Posts</span> <i class="fa fa-chevron-right"></i></a>
            <ul class="dropdown-menu" data-hidden="true">
                <li><a href="admin/index"><i class="fa fa-newspaper"></i> List all</a></li>
                <li><a href="admin/add"><i class="fa fa-plus"></i> Add new</a></li>
                <li><a href="admin/categories"><i class="fa fa-tags"></i> Categories</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#"><span><i class="fa fa-users"></i> Visitors</span> <i class="fa fa-chevron-right"></i></a>
            <ul class="dropdown-menu" data-hidden="true">
                <li><a href="#"><i class="fa fa-user-plus"></i> New Visitor</a></li>
                <li><a href="#"><i class="fa fa-users"></i> List All</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#"><span><i class="fa fa-user-tie"></i> Visit Requests</span> <i class="fa fa-chevron-right"></i></a>
            <ul class="dropdown-menu" data-hidden="true">
                <li><a href="#"><i class="fa fa-plus"></i> New Access Request</a></li>
                <li><a href="#"><i class="fa fa-reply-all"></i> All Access Requests</a></li>
                <li><a href="#"><i class="fa fa-hourglass"></i> Pending Requests</a></li>
                <li><a href="#"><i class="fa fa-check"></i> Confirmed Requests</a></li>
            </ul>
        </li>
        <li><a href="#">Reports</a></li>
        <li><a href="#">Settings</a></li>
    </ul>
</nav>

<div class="wrapper">
    <header>

    </header>

    <div class="container">
        <?= $pageContent ?>
    </div>
</div>
<script src="public/js/dashboard.js"></script>
<script src="public/js/htmleditor.js"></script>
</body>
</html>
<!--<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mon superbe blog</title>

    <link rel="stylesheet" href="public/css/dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

</head>

<body>

<aside class="dashboard">
    <ul class="dashboard-menu">
        <li class="title">Dashboard</li>
        <li>
            <a data-dropdown="true" href="#">Posts <i class="fa fa-chevron-right"></i></a>
            <ul class="submenu">
                <li><a href="/dashboard/index">All posts</a></li>
                <li><a href="#">Add new</a></li>
                <li><a href="#">Categories</a></li>
            </ul>
        </li>
        <li><a href="#">Pages</a></li>
        <li><a href="#">Media</a></li>
        <li><a>Comments</a></li>
    </ul>
</aside>

<div class="container">

</div>

<script src="public/js/app.js"></script>
</body>

</html>-->
