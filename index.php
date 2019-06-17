<?php 
// connect to database
$conn = mysqli_connect('localhost','root', '', 'wordsapp');

//check connection
if(!$conn) {
        echo 'Connection error: '.mysqli_connect_error();
}

// write query for words

$sql = 'SELECT definition, explanation, id FROM words';

//make query & get result

$result = mysqli_query($conn, $sql);

//fetch the resulting rows as an array
$words = mysqli_fetch_all($result, MYSQLI_ASSOC);


//free result from memory

mysqli_free_result($result);

//close connection
mysqli_close($conn);

print_r($words);

?>

<!DOCTYPE html>
<html lang="pl">

<?php include('templates/header.php');?>
<header  class="instruction">
        <h2>Krótka instrukcja obsługi mojej aplikacji</h2>
            
                <ol>
                        
                                <li>Wybieramy przycisk GO aby przejść do formularza</li>
                                <li>Podajemy nowe nieznane słowo i jego definicje przedzieloną przecinkiem</li>
                                <li>Klikamy na DODAJ</li>
                                <li>Aby podejrzec nowo dodane słowo przechodzimy do biblioteki</li>
                </ol>
                <a href="add.php" class="btn-3d">GO!</a>
               
            
        </header>
<?php include('templates/footer.php');?>

</html>