<?php session_start() ?>

<!DOCTYPE html>
<html>
	<head>
   	   	<title>Not Amazon</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css">
		<link rel="stylesheet" href="../../public/stylesheets/main.css" type="text/css">
    </head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-light bg-light" id="bottom-border">
            <a class="navbar-brand" href="/">Not Amazon</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="../products/index.php">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="../search/index.php">Search</a>
                    </li>
                    <?php if (isset($_SESSION['user_id']) && isset($_SESSION['user_storename'])) { ?>                
                        <li class="nav-item active">
                            <a class="nav-link" href="../products/new.php">Sell</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="../stores/index.php?storename=<?php echo $_SESSION['user_storename']; ?>">My Store</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="../carts/index.php">Cart</a>
                        </li>
                    <?php } ?>
                </ul>
                <ul class="navbar-nav navbar-right">
                    <?php if (!isset($_SESSION['user_id'])) { ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="../auth/login.php">Login</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="../auth/register.php">Register</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item active">
                            <a class="nav-link" href="../auth/logout.php">Logout</a>
                        </li>
                    <?php } ?>                
                </ul>
            </div>
        </nav>
    	<div class="container">
