<?php
    session_start();
    if(!isset($_SESSION["user"])){
        header("Location: login.php");
    }

    include "stuff/header.php";
?>

<body>

    <?php include "stuff/nav-bar.php"; ?>

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
      
    <?php include "stuff/footer.php" ?>

</body>
</html>
