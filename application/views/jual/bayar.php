<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>

						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
                             <?php
if (empty($paid))
{
  echo "<tr><td colspan=\"6\">Data tidak tersedia</td></tr>";
}else
{
   foreach ($paid as $isi)
{
?>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div colspanss="single-products">
												<div class="productinfo text-center">
											<img src="<?php echo base_url(); ?>bahan/rumah/<?php print $isi->gambar?>" alt="" />

											<h2>Rp<?php print $isi->harga?></h2>

													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>

											</div>
										</div>
									</div>
<?php }} ?>

								</div>
								<div class="item">
									                             <?php
if (empty($paid_kosan))
{
  echo "<tr><td colspan=\"6\">Data tidak tersedia</td></tr>";
}else
{
   foreach ($paid_kosan as $isi)
{
?>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
											<img src="<?php echo base_url(); ?>bahan/rumah/<?php print $isi->gambar?>" alt="" />

													<p><?php print $isi->id_kosan?></p>

													<h2>Rp <?php print $isi->tahunan?> /month</h2>

											<a href="<?php echo base_url(); ?>welcome/detail_kosan/<?php print $isi->id_kosan?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>DETAIL</a>

													</div>

											</div>
										</div>
									</div>
<?php }} ?>

								</div>
									<div class="item">
									                             <?php
if (empty($paid_villa))
{
  echo "<tr><td colspan=\"6\">Data tidak tersedia</td></tr>";
}else
{
   foreach ($paid_villa as $isi)
{
?>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img src="<?php echo base_url(); ?>bahan/rumah/<?php print $isi->gambar?>" alt="" />
													<p style="text-align: center;" ><?php print $isi->nama_villa?></p>
													<h2>Rp<?php print $isi->harga?></h2>

													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>

											</div>
										</div>
									</div>
<?php }} ?>

								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>
						</div>
					</div><!--/recommended_items-->
