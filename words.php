<?php 
    include('config/db_connect.php');

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
// print_r(explode(',', $words[0]['explanation']));

?>

<!DOCTYPE html>
<html lang="pl">

<?php include('templates/header.php');?>


<div class="container">
<h3 class="words">Words!</h3>
    <?php foreach($words as $word): ?>

    <div class="card">
        <img src="uk_flag.png" alt="uk_flag" class="flag">
        <div class="card-content">
            <h5> <?php  echo htmlspecialchars($word['definition']); ?></h5>
            <ul>
                <?php foreach(explode(',', $word['explanation']) as $exp):?>
                    <li><?php echo htmlspecialchars($exp);?></li>
                <?php endforeach;?>
            </ul>
        </div>
    
        <div class="card-action">
            <a href="details.php?id=<?php echo $word['id']?>" class="diki-info">more info</a>
        </div>
    </div>

                <?php endforeach; ?>

</div>

<?php include('templates/footer.php');?>

</html>