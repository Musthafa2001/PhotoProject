<?php
// print(__DIR__ . "");
session::loadtemplate("__header")
?>
</header>

<main>

    <?php
    if(session::isAuthenticated()){
  include_once "index/call.php";
    }
    else{
          include_once "index/login.php";

    }
    
    include_once "index/photogram.php";

    
    

    ?>

</main>

<?php


session::loadtemplate("__footer");


?>


<script src="assets/dist/js/bootstrap.bundle.min.js"></script>