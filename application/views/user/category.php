
<div class="container-fluid mt-5">
<?= $this->session->flashdata('message');?>


<div class="container mt-2">
<div class="row d-flex justify-content-center card-header">
<form  method="post" action="<?=base_url('home/search')?>" class="navbar-form col-8">
                    <div class="input-group">
                        <input name="key" type="text" value="" class="form-control p-4" placeholder="Search Product ...">
                        <button type="submit" class="btn btn-info btn-just-icon">
                        <i class="material-icons">search</i>
                        <div class="ripple-container"></div>
                        </button>
                    </div>
  </form>
  </div>
  </div>
  </div>
<div class="container-fluid mt-1 ">
<div class="row">
        <div class="card  col-md-3" style="background:#ffff;">
                <div class="card-header card-header-info">
                  <h4 class="card-title ">Category</h4>
                  <p class="card-category"> Product Terpopuler</p>
                </div>
                <div class="card-body h-100">
                <?php foreach ($category as $row){?>
                <a  href="<?=base_url('home/category/'.$row->id)?>" class="btn btn-outline-info p-1"><?= $row->name ?></a>
                <?php }?>

                </div>
              </div>

              <div class="card col-md-9" style="background: #eaeaea;">
                <div class="card-header card-header-danger">
                  <h4 class="card-title "><?= $c_name['name'] ?></h4>
                  <p class="card-category"> Product </p>
                </div>
                <div class="card-body">

                <div class="row d-flex justify-content-start mt-3">
                <?php
$i=1;
foreach ($product as $row)
{
?>
<div class="card col-6 col-sm-6 mt-0 p-1" style="max-width: 500px;">
    <div class="row no-gutters">
        <a href="<?=base_url('home/product/').$row->id?>" class="col-md-4 mt-1" style="background: #ffff;">
        <div class="panel-body w-100 " style="text-align: center; overflow: hidden; padding: 0;">
            <img class="" style="max-height: 100px;" src="<?=base_url('assets/images/').$row->img?>">
        </div>        
    </a>

        <div class="col-md-7">
            <div class="card-body">
                <h6 class="card-text"><?=$row->name?></h6>
                <h4 class="card-text" ><?=uang($row->harga)?></h4>
            </div>
                <a href="<?=base_url('pemesanan/create/'.$row->id)?>" class="btn btn-warning pull-right p-1">
                  <i class="material-icons">add_shopping_cart</i> Add to cart
                </a>            
            <a href="<?=base_url('home/product/').$row->id?>" class="btn btn-success pull-right p-1">
              View                
              </a> 
        </div>
    </div>
</div>
<?php
$i++;
}
?>

                  </div>
                </div>
              </div>
            </a>
            </div>
            </div>


</div>
</div>
    
