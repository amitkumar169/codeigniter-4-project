<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  </head>
  <body>
    
  <div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card">
          
                <div class="card-body">
                    <form action="<?= base_url('admin/update/'.$contact['id'] ) ?>" method="POST">
                        <input type="hidden" name="_method" value="PUT"> <!--update data using put method-->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" value="<?= $contact['name'] ?>" placeholder="first name" class="form-control">
                            </div>
                        </div>  
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" value="<?= $contact['email'] ?>" placeholder="enter email" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Message</label>
                                <input type="text" name="message" value="<?= $contact['message'] ?>" placeholder="enter message" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary px-4">Update Contact</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  </body>
</html>