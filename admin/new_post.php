<?php include_once('../db/db_setup.php'); ?>
<!doctype html>
<html lang="en">
  <head>
    <?php include_once('../site_head.php'); ?>
    <script src="../ckeditor/ckeditor.js"></script>
  </head>
  <body>
    <div class="container">
      <h1>Make A New Post</h1> <hr> 
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
	     <?php	echo"</td>";
	     	echo"<td> <br>";
	     		echo "<a href='dashboard.php'><button type='button' class='btn btn-success'> Dashboard </button></a>";
	     	echo"</td>";
	     	echo"<td><br>";	 
	     		echo "<a href='../index.php'><button type='button' class='btn btn-success'> Home </button></a>";
	     	echo"</td>";
      	echo"</tr>";
      	echo"<center>";
		      if(!empty($_SESSION['error'])){
		      	if(!empty($_SESSION['error']['title'])){
		      				echo "<font color='red'> <b>".$_SESSION['error']['title']."</b> </font> <br> <br>";
		      	}
		      	if(!empty($_SESSION['error']['short_desc'])){
		      				echo "<font color='red'> <b>".$_SESSION['error']['short_desc']."</b> </font> <br> <br>";
		      	}
		      	if(!empty($_SESSION['error']['description'])){
		      				echo "<font color='red'> <b>".$_SESSION['error']['description']."</b> </font> <br> <br>";
		      	}
		      	if(!empty($_SESSION['error']['tags'])){
		      				echo "<font color='red'> <b>".$_SESSION['error']['tags']."</b> </font> <br> <br>";
		      	}
		      	if(!empty($_SESSION['error']['category'])){
		      				echo "<font color='red'> <b>".$_SESSION['error']['category']."</b> </font> <br> <br>";
		      	}
		      	if(!empty($_SESSION['error']['image'])){
		      				echo "<font color='red'> <b>".$_SESSION['error']['image']."</b> </font> <br> <br>";
		      	}
		      	unset($_SESSION['error']);
		      }
		   echo"</center>";
      	?>
      </table> <hr> 
      <form method="post" action="submit_post.php" enctype="multipart/form-data">
	      <label> Enter Post Title </label> <br>
	      <input type="text" class="form-control" name="title"> <br>
	      <label> Enter A Short Description </label> <br>
	      <input type="text" class="form-control" name="short_desc"> <br>
	      <label> Enter Full Description </label> <br>
	      <textarea class="form-control" id="editor1" name="description" rows="5" cols="20"> </textarea> <br>
	      <label> Enter Post Tags </label> <br>
	      <input type="text" class="form-control" name="tags"> <br>
	      <label> Enter Post Category </label> <br>
	      <input type="text" class="form-control" name="category"> <br>
	      <label> Select An Image To Upload </label> <br>
	      <input type="File" name="image"> <br> <br>
	      <input type="submit" class="btn btn-primary btn-lg" value="Submit Post"> <br> <br>
      </form>
      
    </div>
     <script> CKEDITOR.replace( 'editor1' ); </script>
   <?php  include_once('../site_script.php'); ?>
  </body>
</html>