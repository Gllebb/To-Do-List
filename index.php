<?php
    session_start();
    if(!isset($_SESSION["user"])){
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital@1&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" type="image/x-icon" href="public/images/favicon.ico">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="stuff/style.css">

    <title>Welcome page</title> 
</head>
<body>

    <nav>
        <div class="logo">
            <a class="no-style" href="index.php">Things to do!</a>
        </div>
        <div class="nav-items">
            <li id="current-date">Date</li>
            <li id="current-time">Time</li>
            <li class="profile"><a href="profile.php">Profile</a></li>
            <li><a href="logout.php" class="btn btn-warning" style="margin: 0px;">Log Out</a></li>
        </div>
    </nav>

    <button type="button" class="btn btn-danger"><a href="listPage.php">Create a new list</a></button>
    
    <div class="wrapper">
        <header>Quote of the Day</header>
        <div class="content">
            <div class="quote-area">
                <i class="fas fa-quote-left quotes"></i>
                <p class="quote">In Africa, every 60 seconds, a minute passes</p>
                <i class="fas fa-quote-right quotes"></i>
            </div>
            <div>
                <button id="newQuote" >New Quote</button>
                <span class="author">Some dude</span>
            </div>
        </div>
    </div>

    <div class="browsers">
        <h2>Browser:</h2>
        <div class="logos">
          <img class="chrome" src="stuff/images/chrome.png" alt="chrome" title="Google Chrome">
          <img class="firefox" src="stuff/images/firefox.png" alt="firefox" title="Mozilla Firefox">
          <img class="edge" src="stuff/images/edge.png" alt="edge" title="Microsoft Edge">
          <img class="opera" src="stuff/images/opera.png" alt="opera" title="Opera">
          <img class="safari" src="stuff/images/safari.png" alt="safari" title="Apple Safari">
        </div>
    </div>
      
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <!-- JavaScript -->
    <script src="stuff/index.js"></script>
</body>
</html>