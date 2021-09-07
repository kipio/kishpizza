
<?php include_once "templates/header.php"; ?>

<?php
    if(isset($_POST['submit'])) {
        
        //cookie for gender
        setcookie('gender',$_POST['gender'],time()+(24*60*60));

        session_start();
        $_SESSION['name'] = $_POST['name'];
        // echo $_SESSION['name'];
        header('Location: index.php');
    }
?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <input type="text" name="name">
    <select name="gender" class="browser-default">
        <option value="">--- Select an option ---</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
    </select>
    <input type="submit" name="submit" value="submit">
</form>

<?php include_once "templates/footer.php"; ?>
