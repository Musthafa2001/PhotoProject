  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <form action="/" method="post">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Welcome back <?= session::getuser()->getusername() ?></h1>

  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="what are you upto!"></textarea>

  <div class="input-group mb-3">
  <input type="file" class="form-control" id="inputGroupFile02" name="post_image">
  <!-- <label class="input-group-text" for="inputGroupFile02">Upload</label> -->
</div>
        <p>
          <a href="#" class="btn btn-primary my-2" type="submit"> Upload </a>
          <!-- <a href="#" class="btn btn-secondary my-2">Share</a> -->
        </p>
      </div>
      </form>
    </div>
  </section>