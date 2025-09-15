<?php 
 


?>
        
<main class="form-signin w-100 m-auto">
    <form method="post" action="login.php">  
        <h1 class="h3 mb-3 fw-normal">Sign up</h1>
        <div class="form-floating"> 
            <input name="email_address" type="email" class="form-control" id="floatingInput" placeholder="name@example.com"> <label for="floatingInput">Email address</label>
         </div>
        <div class="form-floating"> 
            <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password"> <label for="floatingPassword">Password</label> 
        </div>

         <div class="form-floating"> 
            <input name="phonenumber" type="number" class="form-control" id="floatingInput" placeholder="name@example.com"> <label for="floatingInput">phonenumber</label>
         </div>
          <div class="form-floating"> 
            <input name="username" type="text" class="form-control" id="floatingInput" placeholder="name@example.com"> <label for="floatingInput">username</label>
         </div>
        <div class="form-check text-start my-3">
             <input class="form-check-input" type="checkbox" value="remember-me" id="checkDefault"> <label class="form-check-label" for="checkDefault">
                Remember me
            </label> </div> <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-body-secondary">© 2017–2025</p>
    </form>
</main>

