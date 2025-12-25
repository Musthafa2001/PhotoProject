<?php
include_once $_SERVER["DOCUMENT_ROOT"] . "/app/libs/load.php";

if(isset($_POST['username']) and isset($_POST['password'])){

$username = $_POST['username'];
$password = $_POST['password'];
$result = UserSession::authentication($username,$password);
if ($result) {
?>
    <main class="form-signin w-100 m-auto">
        <h1>Welcome     </h1>

    </main>
    

<?php

}

} else {
?>

<button type="button" class="btn btn-primary">Primary</button>

    <main class="form-signin w-100 m-auto">
        <form method="post" action="login.php">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
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