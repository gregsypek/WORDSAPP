<?php

include('config/db_connect.php');

$explanation = $definition = '';
$errors = array('definition'=>'', 'explanation'=>'');

if(isset($_POST['submit'])){
  // echo htmlspecialchars($_POST['definition']);
  // echo htmlspecialchars($_POST['explanation']);

  //check definition
  if(empty($_POST['definition'])){
    $errors['definition'] = "Definition is required <br />";
  } else {
    $definition = $_POST['definition'];
    if(!preg_match('/^[a-zA-Z\s]+$/' ,$definition)) {
    $errors['definition'] = 'Definition must contains letters and spaces only';
    }
  }
  //check explanation
  if(empty($_POST['explanation'])){
    $errors['explanation'] = "Explanation is required <br />";
  } else {
    $explanation = $_POST['explanation'];
    if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/' ,$explanation)){
    $errors['explanation'] = 'Explanation must contains a comma separated lists';
    }
  }

  if(array_filter($errors)){
    //echo 'errors in the form'
  }else {

    $definition = mysqli_real_escape_string($conn, $_POST['definition']);
    $explanation = mysqli_real_escape_string($conn, $_POST['explanation']);

    //create sql
    $sql = "INSERT INTO words(definition, explanation) VALUES('$definition', '$explanation')";

    //save to db and check
    if(mysqli_query($conn, $sql)) {
      //success
      header('Location: words.php');
    } else {
      //error
      echo 'query error: '.mysqli_error($conn);
    }
 
  }

} //end of POST check

?>

<!DOCTYPE html>
<html  lang="pl">

<?php include('templates/header.php');?>

<div class="register-block">
                  <h3 class="register-title">Add some new words</h3>
                  <p class="register-instruction">Quickly click on submit button to add a new word to the form below.</p>
                  <form action="add.php" method="post">
                    <label for="definition">Enter your word</label>
                    <input type="text" name="definition" value="<?php echo htmlspecialchars($definition) ?>">
                    <p class="error definition"><?php echo $errors['definition'];?></p>
                    <label for="explanation">Enter your explanation</label>
                    <input type="text" name="explanation" value="<?php echo htmlspecialchars($explanation)?>">
                    <p class="error explanation"><?php echo $errors['explanation'];?></p>
                    <input type="submit" value="Add to the database" name="submit"/>
                  </form>
                </div>

<?php include('templates/footer.php');?>

</html>