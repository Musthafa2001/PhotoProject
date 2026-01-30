<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/app/libs/load.php";
$loginpage = false;
if (isset($_POST['username']) and isset($_POST['password'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $result = UserSession::authentication($username, $password);
    $loginpage = True;
}

if ($loginpage) {
    if ($result) {
        if (session::isset("_redirect")) {
            header("Location: /app/" . session::get("_redirect") . ".php");
        } else {
            header("Location: index.php");
        }
    } else {
?>
        <div class="container">
            <h1>Login Failed</h1>
            <p>Please <a href="/app/login.php?error">try again</a></p>
        </div>
    <?php
    }
} else {
    ?>



    <main class="form-signin w-100 m-auto">
        <form method="post" action="login.php">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
            <?php
            // if ($_GET['error']){
            ?>
            <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <!-- <img src="..." class="rounded me-2" alt="..."> -->
                    <strong class="me-auto">Bootstrap</strong>
                    <small>11 mins ago</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    Hello, world! This is a toast message.
                </div>
            </div>
            
            <?php
            // }

            ?>
            <div class="form-floating">
                <input name="username" type="text" class="form-control" id="floatingInput" placeholder="name@example.com"> <label for="floatingInput">username</label>
            </div>
            <div class="form-floating">
                <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password"> <label for="floatingPassword">Password</label>
            </div>
            <input name="fingerprint" type="hidden" class="form-control" id="visitorId">
            <div class="form-check text-start my-3">
                <input class="form-check-input" type="checkbox" value="remember-me" id="checkDefault"> <label class="form-check-label" for="checkDefault">
                    Remember me
                </label>
            </div> <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
        </form>
    </main>

<?php } ?>