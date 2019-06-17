<?php 
// connect to database
$conn = mysqli_connect('localhost','root', '', 'wordsapp');

//check connection
if(!$conn) {
        echo 'Connection error: '.mysqli_connect_error();
}

// write query for words
$sql = 'SELECT definition, explanation, id FROM words ORDER BY created_at';

//make query & get result
$result = mysqli_query($conn, $sql);

//fetch the resulting rows as an array
$words = mysqli_fetch_all($result, MYSQLI_ASSOC);


//free result from memory
mysqli_free_result($result);

//close connection
mysqli_close($conn);

// print_r($words);

?>

<!DOCTYPE html>
<html lang="pl">

<?php include('templates/header.php');?>


<div class="container">
<h3 class="words">Words!</h3>
    <?php foreach($words as $word){ ?>

    <div class="card">
        <div class="card-content">
            <h5> <?php  echo htmlspecialchars($word['definition']); ?></h5>
            <div> <?php echo htmlspecialchars($word['explanation']); ?></div>
        </div>
    
        <div class="card-action">
            <a href="#" class="diki-info">more info</a>
        </div>
    </div>

    <?php } ?>

</div>

<?php include('templates/footer.php');?>

</html>