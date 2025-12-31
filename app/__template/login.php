
<?php 

session::loadtemplate("__head") 
?>
  <body>
    
<header>
<?php  

session::loadtemplate("__header")
?>
</header>

<main>

<?php 
if(session::isAuthenticated()){
  header("Location: index.php");

}else{
session::loadtemplate("__login");
}
?>

</main>

<?php 


session::loadtemplate("__footer");


?>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>


    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const fpPromise = import('https://openfpcdn.io/fingerprintjs/v5')
            .then(FingerprintJS => FingerprintJS.session::loadtemplate())

        fpPromise
            .then(fp => fp.get())
            .then(result => {
                // This is the visitor identifier:
                const visitorId = result.visitorId
                console.log(visitorId)
                document.getElementById("visitorId").value =visitorId;

            })
    </script>
      
  </body>
</html>