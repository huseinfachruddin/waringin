
    <div class="container" style="margin-top: 80px;">
        <div class="row bg-content mt-3 ">
        <?= $this->session->flashdata('message');?>
            <div class="card-big">
                <div class="card-header border-bottom border-custom">
                    <h3><strong style="color: rgb(255, 153, 0);"> Product</strong> > <?=$product['name']?></h3>
                </div>
                <div class="modal-body">
                <?php echo form_open_multipart('product/update/'.$product['id']);?>
                    <div class="modal-content p-3">
                    <div class="form-group ">
                    <label>image</label>
                        <div class="col-md-5 mx-auto">
                        <img id="blah" src="<?=base_url('assets/images/'.$product['img'])?>" alt="your image" class="m-a w-100"/>
                        </div>
                        <div class="col-md-5 mx-auto">
                        Ganti Image
                        <input name="img" type="file" id="inputEmail" class="form-control border border-success" onchange="readURL(this);">
                        </div>
                    </div>
                        <div class="form-group">
                            <label>Nama Produk</label>
                            <input type="text" class="form-control" id="name" placeholder="Product Name" name="name" value="<?=$product['name']?>">
                        </div>
                        <div class="form-group">
                            <label for="type">Pilih Tipe</label>
                            <div class="row">
                                <div class="col-8">
                                    
                                    <select class="form-control" id="type" name="category">
                                        <option value="<?=$product['category_id']?>"><?=$product['category']?></option>
                                        <?php
                                        foreach ($category as $row)
                                        {
                                        ?>
                                        <option value="<?=$row->id?>"><?=$row->name?></option>
                                        <?php
                                        }
                                        ?>
                                        
                                    </select>
                                </div>
                                
                                    
                                
                            
                                </div>
                            </div>
                        <div class="form-group">
                        <label>Detail Produk</label>
                            <textarea class="form-control border border-success" name="ckeditor" id="ckeditorriobermano" value="">
                            <?=$product['detail']?>
                            </textarea><script> CKEDITOR.replace( 'ckeditorriobermano' );</script>
                            
                         </div>
                        <div class="form-group">
                            <label>Harga </label>
                            <input type="number" class="form-control" id="name" placeholder="~RP" name="harga_ecer" value="<?=$product['harga_ecer']?>">
                        </div>
                    
                </div>
                <div class="card-footer">
                    <a href="<?=base_url('product')?>" type="submit" class="btn btn-danger">Kembali</a>
                    <button type="submit" class="btn btn-success">Ubah</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <!--end content-->
    </div>


    <!-- AddModal -->

   


    <!-- TypeModal -->
    
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
