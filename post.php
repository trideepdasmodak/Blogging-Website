<?php include_once('db/db_setup.php'); 
  $val = $_GET['id'];
  $data = array();
  $query = "SELECT * FROM blog WHERE id = '".$val."'";
  $sql = mysqli_query($db_conn,$query);
  
  if($sql){
    while($value = mysqli_fetch_assoc($sql)){
      $data[] = $value;
    }
  }else{
    $_SESSION['error']['data'] = "Unable to fetch database data";
  }
  //print_r($data);
?>
<!doctype html>
<html lang="en">
  <head>
    <?php include_once('site_head.php'); ?>
  </head>
  <body>
    <div class="container">
      <h1> View Post </h1> <hr> 
      <table class="table table-condensed">
        <?php 
            echo"<tr>";
          echo"<td> <br>";  ?>    
            <button type="button" class="btn btn-brand btn-facebook">
                 <i class="fa fa-facebook"></i> Facebook </button>
            <button type="button" class="btn btn-brand btn-twitter">
                 <i class="fa fa-twitter"></i> Twitter </button>
                <button type="button" class="btn btn-brand btn-googleplus">
                 <i class="fa fa-google-plus"></i> Google+ </button>
                <button type="button" class="btn btn-brand btn-linkedin">
                 <i class="fa fa-linkedin"></i> Linkedin </button>
           <?php  echo"</td>";
            echo"<td> <br>";
              echo "<a href='admin/dashboard.php'><button type='button' class='btn btn-success'> Dashboard </button></a>";
            echo"</td>";
            echo"<td><br>";  
              echo "<a href='index.php'><button type='button' class='btn btn-success'> Home </button></a>";
            echo"</td>";
            echo"</tr>";
            echo"<center>";
            if(!empty($_SESSION['error']['data'])){
                  echo "<font color='red'> <b>".$_SESSION['error']['title']."</b> </font> <br> <br>";
                  unset($_SESSION['error']);
              }
           echo"</center>";
        ?>
      </table> <hr> 
      <h1> <?php echo $data[0]['title']; ?> </h1>
      <p> <?php echo $data[0]['author']; ?> </p> <hr>
      <img src="<?php echo $data[0]['image']; ?>" class="img" width="480px"> <br>
      <p> <?php echo $data[0]['short_desc']; ?> </p> 
      <p> <?php echo $data[0]['description']; ?> </p> 
    </div>

   <?php  include_once('site_script.php'); ?>
  </body>
</html>