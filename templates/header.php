<?php
    session_start();

    $username = $_SESSION['name'] ?? 'GUEST';
    $gender = $_COOKIE['gender'] ?? '';

    if($_SERVER['QUERY_STRING']=='noname') {
        //unset($_SESSION['name']);
        session_unset();
        $username = 'GUEST';
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kishan Pizza</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style type="text/css">
        .brand {
            background: #cbb09b !important;
        }
        .brand-text {
            color: #cbb09b !important;
        }
        form {
            max-width: 460px;
            margin: 20px auto;
            padding: 20px;
        }
    </style>
</head>
<body class="grey lighten-4">
    <nav class="white z-depth-0">
        <div class="container">
            <a href="index.php" class="brand-logo brand-text">Kishan Pizza</a>
            <ul id="nav-mobile" class="right hide-on-small-and-down">
                <li class="grey-text">Hello <?php echo htmlspecialchars($username); ?></li>
                <li class="grey-text"> <?php echo $gender<>'' ? htmlspecialchars("($gender)") : ''; ?> </li>
                <?php if( isset($_SESSION['name']) ): ?>
                    <li><a href="index.php?noname" class="btn brand z-depth-0">Logout</a></li>
                <?php else: ?>
                    <li><a href="session.php" class="btn brand z-depth-0">Login</a></li>
                <?php endif; ?>
                <li><a href="add.php" class="btn brand z-depth-0">Add a Pizza</a></li>
            </ul>
        </div>
    </nav>
