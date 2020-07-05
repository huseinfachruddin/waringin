<!doctype html>
<html lang="en">


<body>
    <div class="fixed-top">
        <nav class="navbar navbar-expand-md navbar-dark bg-rgb26">
            <div class="mx-auto order-0">
                <a style="color: rgb(225, 153, 0);" class="navbar-brand mx-auto" href="#"><strong>WARINGIN
                        ACC</strong></a>
            </div>
        </nav>
    </div>
    <?= $this->session->flashdata('message');?>
    <div class="container" style="margin-top: 80px;">
        <div class="row bg-content mt-3 mx-auto" style="width: 50%;">
            <div class="card-big">
                <div class="card-header border-bottom border-custom">
                    <h3 class="text-center"><strong style="color: rgb(255, 153, 0);">Masuk</strong></h3>
                </div>
                <div class="card-body ">
                <?= $this->session->flashdata('message');?>
                    <form method="post" action="<?= base_url('auth')?>">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Masukkan email" name="email">
                        
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1"
                                placeholder="Masukkan Password" name="password">
                        </div>
                        <button type="submit" class="btn btn-warning">Masuk</button>
                        <p class="mt-3">tidak punya akun?<a class="ml-3" href="<?=base_url('auth/register')?>">Buat akun</a></p>
                    </form>
                    <?php echo validation_errors('<div class="alert alert-danger alert-dismissible fade show col-12" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); ?>

                </div>
            </div>
        </div>
        <!--end content-->
    </div>
 