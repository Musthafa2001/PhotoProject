
<?php  

load("__header")
?>
</header>

<main>

<?php 
if(Session::authentication()){
    load("__front");

}
else{
    load("loginpage");
}


load("__photogram");

?>

</main>

<?php 


load("__footer");


?>


    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>

      