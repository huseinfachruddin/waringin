
    <?= $this->session->flashdata('message');?>
    <div class="container" style="margin-top: 80px;">
        <div class="row mt-3 d-flex justify-content-center" >
            <div class="card-big col-8 col-lg-4 ">
                    <h3 class="text-center"><strong style="color: rgb(255, 153, 0);">Login</strong></h3>

                <div class="card ">
                <div class="card-body m-3">
                    <form method="post" action="<?= base_url('auth')?>">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="" name="email">
                        
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1"
                                placeholder="" name="password">
                        </div>
                        <button type="submit" class="btn btn-warning">Masuk</button>
                        <p class="mt-3">Tidak punya akun?<a class="ml-3" href="<?=base_url('auth/register')?>">Buat akun</a></p>
                    </form>
                    <?php echo validation_errors('<div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <i class="material-icons">close</i>
                    </button>
                    <span>', '</span>
                      </div>'); ?>
                    </div>
                </div>
            </div>
        </div>
        <!--end content-->
    </div>
 