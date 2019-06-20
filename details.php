<?php

include('config/db_connect.php');

if(isset($_POST['delete'])) {
    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

    $sql = "DELETE FROM words WHERE id =$id_to_delete";

    if(mysqli_query($conn, $sql)) {
        //success
        header('Location: words.php');
    } {
        //failure
        echo 'query error:' .mysqli_error($conn);
    }
}

//check GET request id param
if(isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    //make sql
    $sql = "SELECT * FROM words WHERE id= $id";

    //get the query result
    $result = mysqli_query($conn, $sql);

    //fetch result in array format
    $word = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($conn);

    // print_r($word);
}

?>

<!DOCTYPE html>
<html lang="en">
<?php include('templates/header.php');?>

<div class="details">
    <?php if($word): ?>

    <h4><?php echo htmlspecialchars($word['definition']); ?></h4>
    <p>Definition: <?php echo htmlspecialchars($word['explanation']); ?></p>
    <p> <?php echo date($word['created_at']); ?></p>


    <!-- DELETE -->
    <form action="details.php" method="POST">
        <input type="hidden" name="id_to_delete" value="<?php echo $word['id'] ?>">
       <input type="submit" name="delete" value="Delete" class="btn-3d">
        
    </form>

        <?php else: ?>
        <h2>No such pizza exists!</h5>
        <?php endif; ?>
</div>


<?php include('templates/footer.php');?>

</html>