<?php
    require_once "config/db_connect.php";

    $errors = array('email'=>'','title'=>'','ingredients'=>'');
    $email = $title = $ingredients = '';
    
    if( isset( $_POST['submit'] ) ) {

        $email = htmlspecialchars( $_POST['email'] );
        $title = htmlspecialchars( $_POST['title'] );
        $ingredients = htmlspecialchars( $_POST['ingredients'] );
    
        if(empty($_POST['email'])) {
            $errors['email'] = "Email is required<br/>";
        }
        else if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Invalid email";
        }
        if(empty($_POST['title'])) {
            $errors['title'] = "Title is required<br/>";
        }
        if(empty($_POST['ingredients'])) {
            $errors['ingredients'] = "Ingredients is required<br/>";
        }

        if(!array_filter($errors)) {

            $email = mysqli_real_escape_string($conn,$_POST['email']);
            $title = mysqli_real_escape_string($conn,$_POST['title']);
            $ingredients = mysqli_real_escape_string($conn,$_POST['ingredients']);

            $sql = "INSERT INTO pizzas(title,email,ingredients) VALUES('$title','$email','$ingredients')";

            if(mysqli_query($conn,$sql)) {
                header('Location: index.php');
            }
            else {
                echo 'query error: ' . mysqli_error($conn);
            }

            header('Location: index.php');
        }

    }
?>

<?php include_once "templates/header.php"; ?>

<section class="container grey-text">
    <h4 class="center">Add a Pizza</h4>
    <!-- <form class="white" action="add.php" method="POST"> -->
    <form class="white" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <label>Your Email:</label>
        <input type="text" name="email" value="<?php echo $email ?>">
        <div class="red-text"><?php echo $errors['email']; ?></div>
        
        <label>Pizza Title:</label>
        <input type="text" name="title" value="<?php echo $title ?>">
        <div class="red-text"><?php echo $errors['title']; ?></div>

        <label>Ingredients (comma separated):</label>
        <input type="text" name="ingredients" value="<?php echo $ingredients ?>">
        <div class="red-text"><?php echo $errors['ingredients']; ?></div>

        <div class="center">
            <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
        </div>
    </form>
</section>

<?php include_once "templates/footer.php"; ?>

