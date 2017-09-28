
<?php
    include ('header_upt.php')
?>     
  <body>
  <!-- container section start -->
  <section id="container" class="">
     
      
          
      <!--header end-->

      <!--sidebar start-->
	  	<?php
	    include ('sidebar.php')
		?>     
      <!--sidebar end-->
      
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">            
              <!--overview start-->
              <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-laptop"></i> UPT PERTANIAN</h3>
                    
                </div>
            </div>
              

                    
          
          <!-- Today status end -->
            
              
                
              <div class="row">
                
                <div class="col-lg-9 col-md-12">    
                      <section class="panel">
                          <header class="panel-heading">
                              Data Anggaran Kelompok Tani
                         </header>
                          <table class="table table-striped">
                              <thead>
                              <tr>
                                  <th>Kelompok Tani</th>
                                  <th>Anggaran</th>

                              </tr>
                              </thead>
                              <?php
    if (empty($query))
    {
      echo "<tr><td colspan=\"6\">Data tidak tersedia</td></tr>";
    }else
    {
       foreach ($query as $isi)
    {
    ?>

                              <tbody>
                              <tr>
                                  <td><?php print $isi->nama_kelompok?> </td>
                                  <td><?php print $isi->anggaran?></td>
                              </tr>
                              
                              </tbody>
                                 <?php
 
 }}
 ?> 
                          </table>
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
