
    <div class="content">
        <div class="container-fluid mt-3 card">

          <div class="row">
          <div class="col-md-4">
              <div class="card card-profile">
                <div class="">

                    <img id="blah" class="w-100" src="<?=base_url('assets/images/').$product['img']?>" />
 
              </div>
              </div>
            </div>

            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Profile</h4>
                  <p class="card-category"></p>
                </div>
                <div class="card-body m-3">
                
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group">
                          <h2><?=$product['name']?> </h2>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="">Detail</label>
                          <div class="row" value=""> <?=$product['detail']?></div>
                        </div>
                      </div>
                      </div>

                    
                    <div class="row">

                          <h3 class="bmd-label-floating"><?=uang($product['harga'])?> <?=$product['satuan']?></h3>


                    </div>

                    <a href="<?=base_url('pemesanan/create/'.$product['id'])?>" class="btn btn-warning pull-right">
<i class="material-icons">add_shopping_cart</i> Add to cart
</a>                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>

          