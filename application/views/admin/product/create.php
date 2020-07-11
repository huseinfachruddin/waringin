
    <div class="container" style="margin-top: 80px;">
        <div class="row bg-content mt-3 ">
        <?php echo validation_errors('<div class="alert alert-danger alert-dismissible fade show col-12" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); ?>
        <?= $this->session->flashdata('message');?>
        
            <div class="card-big">
                <div class="card-header border-bottom border-custom">
                    <h3><strong style="color: rgb(255, 153, 0);"> Product</strong> > Upload</h3>
                </div>
                
                <div class="modal-body">
                <?php echo form_open_multipart('');?>
                    <div class="modal-content p-3">
                    <div class="form-group ">
                    <label>image</label>
                        <div class="col-md-5 mx-auto">
                        <img id="blah" src="<?=base_url('assets/img/upload.png')?>" alt="your image" class="m-a w-100"/>
                        </div>
                        <div class="col-md-5 mx-auto">
                        <input name="img" type="file" id="inputEmail" class="form-control border border-success" onchange="readURL(this);">
                        </div>
                    </div>
                        <div class="form-group">
                            <label>Nama Produk</label>
                            <input type="text" class="form-control" id="name" placeholder="Product Name" name="name" value="<?= set_value('name'); ?>">
                        </div>
                        <div class="form-group">
                            <label for="type">Pilih Tipe</label>
                            <div class="row">
                                <div class="col-8">
                                    
                                    <select class="form-control" id="type" name="category">
                                    <?php foreach ($category as $row){?>
                                        <option value="<?=$row->id?>"><?=$row->name?></option>
                                    <?php }?>
                                    </select>
                                </div>
                                
                                    <a data-toggle="modal" data-target="#addTypeModal">
                                        <button class="btn btn-warning">
                                            <i class="fa fa-plus fa"></i>
                                        </button>
                                    </a>
                                
                            
                                </div>
                            </div>
                        <div class="form-group">
                        <label>Detail Produk</label>
                            <textarea class="form-control border border-success" name="ckeditor" id="ckeditorriobermano" value="">
                            
                            </textarea><script> CKEDITOR.replace( 'ckeditorriobermano' );</script>
                            
                         </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="number" class="form-control" id="name" placeholder="~RP" name="harga_ecer">
                        </div>
                    
                </div>
                <div class="card-footer">
                    <a href="<?=base_url('product')?>" type="submit" class="btn btn-danger">Kembali</a>
                    <button type="submit" class="btn btn-success">Tambahkan</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <!--end content-->
    </div>


    <!-- AddModal -->

   


    <!-- TypeModal -->
    <div class="modal fade" id="addTypeModal" tabindex="-1" role="dialog" aria-labelledby="addTypeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTypeModalLabel">Tambah Tipe</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?=base_url('admin/category/create')?>">
                        <div class="form-group">
                            <label for="type">Nama Category</label>
                            <input type="name" class="form-control" id="name" placeholder="" name="name" >
                        </div>
                    
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Tambahkan</button>
                    
                </div>
                </form>
            </div>
        </div>
    </div>
<script>
function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>
