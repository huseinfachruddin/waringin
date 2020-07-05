

<body>
    <div class="fixed-top">
        <nav class="navbar navbar-expand-md navbar-dark bg-rgb26">
            <div class="mx-auto order-0">
                <a style="color: rgb(225, 153, 0);" class="navbar-brand mx-auto" href="#"><strong>WARINGIN
                        ACC</strong></a>
            </div>
        </nav>
    </div>
    <div class="container" style="margin-top: 80px; margin-bottom: 80px;">
        <div class="row bg-content mt-3 mx-auto" style="width: 50%;">
            <div class="card-big">
                <div class="card-header border-bottom border-custom">
                    <h3 class="text-center"><strong style="color: rgb(255, 153, 0);">Daftar</strong></h3>
                </div>
                <div class="card-body ">
                    <form method="post" action="<?= base_url('auth/register');?>">
                        <div class="form-group">
                            <label for="">Nama Lengkap</label>
                            <input type="text" class="form-control" id="" aria-describedby="" placeholder="" name="name">
                        </div>
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
                        <div class="form-group">
                            <label for="exampleInputPassword1">Masukkan Ulang Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1"
                                placeholder="" name="password2">
                        </div>
                        <button type="submit" class="btn btn-warning">Daftar</button>
                        <p class="mt-3">Sudah memiliki akun?<a class="ml-3" href="<?=base_url('auth')?>">Masuk</a></p>
                    </form>
                    <?php echo validation_errors('<div class="alert alert-danger alert-dismissible fade show col-12" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); ?>

                </div>
            </div>
        </div>
        <!--end content-->
    </div>
    <!--closeContainer-->
    <div style="color: white;" class="footer-copyright bg-rgb26 text-center py-3 fixed-bottom">© 2020 Copyright:
        <a href="risman page">my.corp</a>
    </div>
    </div>
