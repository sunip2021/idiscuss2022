<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <style>
            #maincontainer{
                min-height: 575px;
            }
        </style>

    <title>iDiscuss-codding forum</title>
</head>

<body>
    <?php
    include 'partial/_dbconnect.php';
  include 'partial/_header.php';
  
  
  ?>
  
    <!--slider start here-->
    <div class="container  my-3" id="maincontainer">
    <h1 class="py-3">Search results for<em>"<?php echo $_GET['search'];?>"</em></h1>
    <?php
    $noresult=true;
 $search= $_GET["search"];
  
   $sql="SELECT * FROM threads WHERE MATCH(thread_title,thread_desc) against('$search')";
   $result=mysqli_query($conn,$sql);
   while($row=mysqli_fetch_assoc($result)){
       $noresult=false;
     
     $title=$row['thread_title'];
     $desc=$row['thread_desc'];
     $thread_id=$row['thread_id'];
     $url="thread.php?threadid=".$thread_id;
     echo '<div class="result">
     <h3><a href="'.$url.'" class="text-dark">'.$title.'</a></h3>
     <p>
         '.$desc.'
     </p>
     
 </div>';
    
    
   }
   if($noresult){
   echo '<div class="jumbotron jumbotron-fluid">
    <div class="container">
      <p class="display-4">No Results Found</p>
      <p class="lead"> Suggestions:  <ul> 
      <li>Make sure that all words are spelled correctly.</li>
      <li>Try different keywords.</li>
      <li>Try more general keywords.</li>
      </ul>
      </p>
    </div>
  </div>';
   }

  ?>
    
    
    </div>
    <?php
  include 'partial/_footer.php';
  ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>