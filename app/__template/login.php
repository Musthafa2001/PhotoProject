
<?php 

load("__head") 
?>
  <body>
    
<header>
<?php  

load("__header")
?>
</header>

<main>

<?php 
load("__login")

?>

</main>

<?php 


load("__footer");


?>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>


    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const fpPromise = import('https://openfpcdn.io/fingerprintjs/v5')
            .then(FingerprintJS => FingerprintJS.load())

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