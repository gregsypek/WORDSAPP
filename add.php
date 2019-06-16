<?php

if(isset($_POST['submit'])){
  // echo htmlspecialchars($_POST['definition']);
  // echo htmlspecialchars($_POST['explanation']);

  //check definition
  if(empty($_POST['definition'])){
    echo "Definition is required <br />";
  } else {
    $definition = $_POST['definition'];
    if(!preg_match('/^[a-zA-Z\s]+$/' ,$definition)) {
    echo 'Definition must contains letters and spaces only';
    }
  }
  //check explanation
  if(empty($_POST['explanation'])){
    echo "Definition is required <br />";
  } else {
    $explanation = $_POST['explanation'];
    if(!preg_match('/^([a-zA-Z\s]+)(,)(\s*[a-zA-Z\s]*)*$/' ,$explanation)){
    echo 'Explanation must contains a comma separated lists';
    }
  }
} //end of POST check

?>

<!DOCTYPE html>
<html  lang="pl">

<?php include('templates/header.php');?>

<div class="register-block">
                  <h3 class="register-title">Add some new words</h3>
                  <p>Quickly click on submit button to add a new word to the form below.</p>
                  <form action="add.php" method="post">
                    <input type="text" placeholder="Enter your word" name="definition"/>
                    <input type="text" placeholder="Enter your explanation" name="explanation" />
                    <input type="submit" value="Add to the database" name="submit"/>
                  </form>
                </div>

<?php include('templates/footer.php');?>

</html>