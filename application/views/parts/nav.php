<body>
    <script>$('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
    })</script>
    <div class="fixed-top">
        <nav class="navbar navbar-expand-md navbar-dark bg-rgb26">
            <div class="container justify-content-center">

            <div class="d-flex  p-0">
                <a style="color: rgb(225, 153, 0);" class="navbar-brand mx-auto" href="<?=base_url('admin')?>"><strong>WARINGIN
                        ACC</strong></a>
            </div>
            </div>
            <a class="btn-danger position-absolute m" href="<?=base_url('auth/logout')?>" onclick="return confirm('Apakah anda yakin ingin keluar ?')">Logout</a>
        </nav>
    </div>
 