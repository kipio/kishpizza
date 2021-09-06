
<?php
    require_once "config/db_connect.php";
    
    // write query for all pizzas
    //$sql = 'SELECT * FROM pizzas';
    $sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';

    // make query and get result
    $result = mysqli_query($conn,$sql);

    // fetch the resulting rows as an array
    $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // free result from memory
    mysqli_free_result($result);

    // close the connection
    mysqli_close($conn);

    //print_r($pizzas);

?>

<?php include_once "templates/header.php"; ?>

<h4 class="center grey-text">Pizzas!</h4>
<div class="container">
    <div class="row">

        <?php foreach($pizzas as $pizza): ?>

            <div class="col s6 md3">
                <div class="card z-depth-0">
                    <div class="card-content center">
                    <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
                    <div><?php echo htmlspecialchars($pizza['ingredients']); ?></div>
                    </div>
                    <div class="card-action right-align">
                        <a href="details.php?id=<?php echo $pizza['id'] ?>" class="brand-text">more info</a>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>

    </div>
</div>

<?php include_once "templates/footer.php"; ?>

