<?php

// session start
ob_start();
session_start();
// set show error
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// check reset value if not insert data
if ($_GET["reset"]=="1" || !isset($_SESSION['id'])) {
    // reset session
    $_SESSION['id']=1;
} else if ($_GET['submit']=="submit") {
    // save to text file if compete increase count number
    $fp=fopen("score.txt","a+");
    if ($fp) {
        $data=$_SESSION['id'].",".$_GET['score1'].",".$_GET['score2'].",".$_GET['score3']."\n";
        fwrite($fp,$data);
        fclose($fp);
        // count
        $x=$_SESSION['id'];
        $x++;
        $_SESSION['id']=$x;
    } else {
        echo "error cannot open file";
    }
    
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Title</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
          integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
</head>
<body>

    <h1>#NO : <?=$_SESSION['id']; ?></h1>

    <form action="index.php">

        <div class="form-group">
          <label for="">J1</label>
          <input type="number" class="form-control" name="score1" id="" aria-describedby="helpId" placeholder="score1" min="0" max="100" required>
          <small id="helpId" class="form-text text-muted">Help text</small>

          <label for="">J2</label>
          <input type="number" class="form-control" name="score2" id="" aria-describedby="helpId" placeholder="score2" min="0" max="100" required>
          <small id="helpId" class="form-text text-muted">Help text</small>

          <label for="">J3</label>
          <input type="number" class="form-control" name="score3" id="" aria-describedby="helpId" placeholder="score3" min="0" max="100"required>
          <small id="helpId" class="form-text text-muted">Help text</small>

          <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
        </div>

    </form>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"
        integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
</html>