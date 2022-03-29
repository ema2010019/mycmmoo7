<?php
$access_level = $_COOKIE["access_level"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS Bootstrap Links -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Link to import google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,700;1,600&family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Arimo:wght@700&">
    <!-- CSS custom style sheet Link -->
    <link rel="stylesheet" href="Teller.css">
    <title>Teller</title>
</head>
<body>

    <section class = "gallery-links">
        
        <div class="gallery-wrapper">
            <h1 id = "page-name"><bold>Visit Scotland</bold></h1>
            <div class="photo-container">
            <?php
            // Connection to the Database
            include("connection.php");

            $sql = "SELECT * FROM images ORDER BY orderImg";
            $stmt = mysqli_stmt_init($db);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                echo "SQL statement Failed";
            }else{
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                while($row = mysqli_fetch_assoc($result)){
                    echo '<a href="#">
                    <div style = "background-image: url(uploads/'.$row["imgFullName"].')"></div>
                    <h3> '.$row["titleImage"].' </h3>
                    <h6> Location : '.$row["Location"].' </h6>
                    <p>'.$row["Story"].';</p>
                </a>';

                }
            }
                
                ?>

            </div>

        </div>
        <!-- User testimonials with use of carousels -->
        <section id = "carousel">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval = "10000">
  <div class="carousel-inner">
    <div class="carousel-item active" style = background-color:#af066e;>
      <h1 id = first-slide>I fell in love with Aberdeen after my visit it was captivating, Interesting and fun</h1>
      <img src = "profile_pic1.jpg" alt = "first-profile-pic" class = "first-profile-pic">
    </div>
    <div class="carousel-item" style = background-color:#af066e;>
    <h1 id = second-slide>I got a firsthand view of the Glasgow Wildlife and it was a surreal experience, i would recommend having a feel for yourself</h1>
    <img src = "profile-pic2.jpg" alt = "seond-profile-pic" class = "second-profile-pic">
  </div>
    <div class="carousel-item" style = background-color:#af066e;>
    <h1 id = second-slide>The Edinburgh NightLife is the best there is around. I had a fantastic experience</h1>
    <img src = "profile-pic2.jpg" alt = "seond-profile-pic" class = "second-profile-pic">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="sr-only">Next</span>
  </a>
</div>



        </section>

        <!-- Upload Form -->
        
    </section>
    <h3 id = "upload-title">Please your Share your stories here:</h3>

    <section id="upload-img">
        <div>
          <!-- The upload form should only be accessed by actual users. -->
          <?php
          if($_COOKIE['access_level'] == "standard_user"){
            echo '<form action="gallery-upload.php" method="post" enctype ="multipart/form-data">
            <input type="text" name="filename" placeholder="File name ...">
            <input type="text" name="filetitle" placeholder="Image Title ...">
            <input type="text" name="filedesc" placeholder="File Description ... ">
            <input type="text" name="filelocation" placeholder="File Location ... ">
            <input type="text" name="filecategory" placeholder="File Category ... ">
            <input type="text" name="filestory" placeholder="File Story ... ">
            <input type="file" name="file">
            <button type="submit" name="submit">UPLOAD</button>
        </form>'; }
        
        ?>




        <!-- Delete Form -->

        <?php
        if($_COOKIE['accesslevel'] = "adminuser"){
          echo '<h3>Delete stories here:</h3>
          <form action = "Delete-file.php" method = "Post">
          <input type = "text" name = "filename" placeholder = "Delete multiple files" style = "width:300px;">
          <button type = "submit" name = "submit">Delete Files</button>

        </form>';}
        
        ?>

        </div>

        

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
      
</body>
</html>