<?php
  //opens database connection
  require_once 'assets/config/db.php';
  //gets information from database
  require_once 'assets/functions/select.php';
  require_once 'assets/functions/select_view.php';
?>

<!doctype html>
<html lang="sv">
<head>
  <meta charset="utf-8">
  <title>Album</title>
  <!-- Bootstrap Core CSS -->
  <link rel="stylesheet" href="./assets/css/bootstrap.min.css?<?php echo hash_file('md5', './assets/css/bootstrap.min.css'); ?>">
  <!-- Font-Awesome Core CSS -->
  <link rel="stylesheet" href="./assets/css/all.min.css">
  <!-- Custom styles -->
  <!--<link rel="stylesheet" href="css/album.css">-->
  <link rel="stylesheet" href="./assets/css/album.css?< ?php echo hash_file('md5', './assets/css/album.css'); ?>">
</head>

<body>
<?php 
  $string='Hallå eller?';
  echo $string; 
?>
<!--<header>
  <nav>
    <ul>
      <li><a href="" class="nav-link"></a></li>
      <li><a href="" class="nav-link"></a></li>
      <li><a href="" class="nav-link"></a></li>
      <li><a href="" class="nav-link"></a></li>
      <li><a href="" class="nav-link"></a></li>
    </ul>
  </nav>
</header>-->
<main class="container mt-5">
  <?php
    //Checks if an action is set
    if (isset($_GET['action'])) {
      // Checks which action is set
      switch($_GET['action']) {
        case 'inserted':
          echo '
          <div class="alert alert-success">
          Posten har lagt till i databasen!
          </div>
        ';
        break;
        case 'updated':
          echo '
          <div class="alert alert-success">
          Posten har uppdaterats i databasen!
          </div>
        ';
        break;
        case 'deleted':
          echo '
          <div class="alert alert-danger">
          Posten har raderats från databasen!
          </div>
        ';
        break;    
      }
    }
  ?>
  <a href="add.php" class="btn btn-primary">Lägg till</a>
  <table class="table table-bordered mt-4">
    <tr>
      <th>#</th>
      <th>Förnamn</th>
      <th>Efternamn</th>
      <th>Mejl</th>
      <th>Datum</th>
      <th colspan="2">Administration</th>
    </tr>
          
    <?php
      if ($stmt->rowCount() > 0) {  
        while($row = $stmt->fetch()) {  
          //prints out users to html  
          echo '
          <tr>
            <td>'.$row['id'].'</td>
            <td>'.ucfirst($row['firstname']).'</td>
            <td>'.ucfirst($row['lastname']).'</td>
            <td>'.$row['email'].'</td>
            <td>'.$row['regdate'].'</td>
            <td><a href="edit.php?id='.$row['id'].'">Uppdatera</a></td>
            <td><a href="remove.php?id='.$row['id'].'">Radera</a></td>
          </tr>
          ';
        }  
        } else {
          echo '
          <tr>
            <td colspan="5">Inga användare i databasen.</td>
          </tr>
          ';
        }
    ?>
  </table>
  
  <!--<table class="table table-bordered mt-4">
    <tr>
      <th>Datum</th>
      <th>Mejl</th>
      <th>Efternamn</th>
      <th>Förnamn</th>
      <th>#</th>
    </tr>-->
          
    <?php
    
      // sql to create view
      //$sql = "CREATE VIEW view_users AS
      //SELECT regdate, password, email, lastname, firstname, id
      //FROM my_users";
    
      //$stmt = $dbh->prepare($sql);
      //sends query to database
      //$stmt->execute();
    
      // use exec() because no results are returned
      //$stmt2->exec($sql);
      //echo 'The view view_users created successfully';
    /*
      if ($stmt2->rowCount() > 0) {  
        while($row = $stmt2->fetch()) {  
          //prints out users to html  
          echo '
          <tr>
            <td>'.$row['regdate'].'</td>
            <td>'.$row['email'].'</td>
            <td>'.ucfirst($row['lastname']).'</td>
            <td>'.ucfirst($row['firstname']).'</td>
            <td>'.$row['id'].'</td>
          </tr>
          ';
        }  
        } else {
          echo '
          <tr>
            <td colspan="5">Inga användare i databasen.</td>
          </tr>
          ';
        }*/
    ?>
  </table>
  
  <!--<article>
    
    <section>
      <h1>Huvudrubrik</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus, dolore!</p>
      <p>Est molestiae porro ipsa nisi explicabo facere, suscipit unde. Libero.</p>
      <p>-->
        <?php /*
          $filename = "./assets/css/album.css";
          $md5file = md5_file($filename);
          echo $md5file; */
        ?>
     <!-- </p>
    </section>
    <section>
      <h1></h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est, neque!</p>
      <p>Voluptatibus eum consequatur illum quos deserunt nisi delectus obcaecati, earum.</p>
    </section>
    <section>
      <h1></h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, reiciendis!</p>
      <p>Illum repudiandae doloremque reiciendis eos aliquam, impedit incidunt vero asperiores?</p>
    </section>
  </article>-->
</main>
<!--<footer>
  <p>Lorem ipsum dolor sit amet.</p>
</footer>-->
</body>
</html>
