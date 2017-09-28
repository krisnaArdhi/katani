
<?php
    include ('header_upt.php')
?>     
  <body>
  <!-- container section start -->
  <section id="container" class="">
      <!--header end-->

      <!--sidebar start-->
  <?php
    include ('sidebar_upt.php')
?>     
      <!--sidebar end-->
      
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
			  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
						<li><i class="fa fa-laptop"></i>Dashboard</li>						  	
					</ol>
				</div>
			</div>
              

		            
		  
		  <!-- Today status end -->
			
              
				
			<div class="row">
               	
				<div class="col-lg-9 col-md-12">	
                      <section class="panel">
                          <header class="panel-heading">
                             DAFTAR
                          </header>
                          <div class="panel-body">
                          <form class="form-horizontal " method="post" action="<?php echo base_url();?>distributor/simpan">
                                    

                                   <div class="form-group">
                                      <label class="col-sm-2 control-label">NAMA LENGKAP</label>
                                      <div class="col-sm-10">
                                          <input type="text" name="nama" class="form-control">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">ALAMAT</label>
                                      <div class="col-sm-10">
                                          <input type="text" name="alamat" class="form-control">
                                    </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">NAMA TOKO</label>
                                      <div class="col-sm-10">
                                          <input type="text" name="nama_toko" class="form-control">
                                      </div>
                                  </div>  
                                   
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">ALAMAT TOKO</label>
                                      <div class="col-sm-10">
                                          <input type="text" name="alamat_toko" class="form-control">
                                    </div>
                                  </div>
                                
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">password</label>
                                      <div class="col-sm-10">
                                          <input type="password" name="password" class="form-control">
                                      </div>
                                  </div>
                                <div class="form-group">
                                      <label class="col-sm-2 control-label">status</label>
                                      <div class="col-sm-10">
                                          <input type="text" name="jenis"  disabled class="form-control" value="distributor">
                                      </div>
                                  </div>
                                 <div class="form-group">
                                      <div class="col-sm-10">
                                        <left><input type="submit" name="mysubmit" class="btn btn-danger" >
                                        </left>
                                      </div>
                                  </div>  
                              </form>
                          </div>
                      </section>

				</div><!--/col-->
				
              </div>

                    
                   
                <!-- statics end -->
              
            
				

              <!-- project team & activity start -->
          <div class="row">

              </div><br><br>
          </div> 
              <!-- project team & activity end -->

          </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section start -->

    <!-- javascripts -->
    <script src="<?php echo base_url(); ?>bahan/js/jquery.js"></script>
	<script src="<?php echo base_url(); ?>bahan/js/jquery-ui-1.10.4.min.js"></script>
    <script src="<?php echo base_url(); ?>bahan/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>bahan/js/jquery-ui-1.9.2.custom.min.js"></script>
    <!-- bootstrap -->
    <script src="<?php echo base_url(); ?>bahan/js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="<?php echo base_url(); ?>bahan/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo base_url(); ?>bahan/js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- charts scripts -->
    <script src="<?php echo base_url(); ?>bahan/assets/jquery-knob/<?php echo base_url(); ?>bahan/js/jquery.knob.js"></script>
    <script src="<?php echo base_url(); ?>bahan/js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>bahan/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="<?php echo base_url(); ?>bahan/js/owl.carousel.js" ></script>
    <!-- jQuery full calendar -->
    <script src="<?php echo base_url(); ?>bahan/js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
	<script src="<?php echo base_url(); ?>bahan/assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="<?php echo base_url(); ?>bahan/js/calendar-custom.js"></script>
	<script src="<?php echo base_url(); ?>bahan/js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="<?php echo base_url(); ?>bahan/js/jquery.customSelect.min.js" ></script>
	<script src="<?php echo base_url(); ?>bahan/assets/chart-master/Chart.js"></script>
   
    <!--custome script for all page-->
    <script src="<?php echo base_url(); ?>bahan/js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="<?php echo base_url(); ?>bahan/js/sparkline-chart.js"></script>
    <script src="<?php echo base_url(); ?>bahan/js/easy-pie-chart.js"></script>
	<script src="<?php echo base_url(); ?>bahan/js/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="<?php echo base_url(); ?>bahan/js/jquery-jvectormap-world-mill-en.js"></script>
	<script src="<?php echo base_url(); ?>bahan/js/xcharts.min.js"></script>
	<script src="<?php echo base_url(); ?>bahan/js/jquery.autosize.min.js"></script>
	<script src="<?php echo base_url(); ?>bahan/js/jquery.placeholder.min.js"></script>
	<script src="<?php echo base_url(); ?>bahan/js/gdp-data.js"></script>	
	<script src="<?php echo base_url(); ?>bahan/js/morris.min.js"></script>
	<script src="<?php echo base_url(); ?>bahan/js/sparklines.js"></script>	
	<script src="<?php echo base_url(); ?>bahan/js/charts.js"></script>
	<script src="<?php echo base_url(); ?>bahan/js/jquery.slimscroll.min.js"></script>
  <script>

      //knob
      $(function() {
        $(".knob").knob({
          'draw' : function () { 
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
          $("#owl-slider").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });
	  
	  /* ---------- Map ---------- */
	$(function(){
	  $('#map').vectorMap({
	    map: 'world_mill_en',
	    series: {
	      regions: [{
	        values: gdpData,
	        scale: ['#000', '#000'],
	        normalizeFunction: 'polynomial'
	      }]
	    },
		backgroundColor: '#eef3f7',
	    onLabelShow: function(e, el, code){
	      el.html(el.html()+' (GDP - '+gdpData[code]+')');
	    }
	  });
	});



  </script>

  </body>
</html>
