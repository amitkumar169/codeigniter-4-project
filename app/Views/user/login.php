<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  </head>
  <body>
   
  <section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-8 col-lg-7 col-xl-6">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
          class="img-fluid" alt="Phone image">
      </div>
      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
        <form action="<?= base_url('user/check'); ?>" method="post">
           <?= csrf_field(); ?>
          <?php if(!empty(session()->getFlashdata('fail'))) : ?>
            <div class="alert alert-danger" role="alert">
              <?= session()->getFlashdata('fail'); ?>
            </div>
          <?php endif; ?>

           <?php if(!empty(session()->getFlashdata('success'))) : ?>
            <div class="alert alert-success" role="alert">
              <?= session()->getFlashdata('success'); ?>
            </div>
          <?php endif; ?>
          <div data-mdb-input-init class="form-outline mb-4">
            <label class="form-label" for="form1Example13">Email address</label>
            <input type="email" id="form1Example13" name="email" class="form-control form-control-lg" value="<?= set_value('email') ?>"/>
               <span class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>
         
          </div>

          <!-- Password input -->
          <div data-mdb-input-init class="form-outline mb-4">
            <label class="form-label" for="form1Example23">Password</label>
            <input type="password" id="form1Example23" name="password" class="form-control form-control-lg"  value="<?= set_value('password') ?>"/>
               <span class="text-danger"><?= isset($validation) ? display_error($validation, 'password') : '' ?></span>
         
          </div>

          <!-- Submit button -->
          <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block">Sign in</button>

        </form>
      </div>
    </div>
  </div>
</section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  </body>
</html>