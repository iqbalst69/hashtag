<!--footer start-->
      <!-- <footer class="site-footer">
          <div class="text-center">
              2019 &copy; #HashtagIndonesia.
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer> -->
      <!--footer end-->
  </section>
  </body>
</html>

    <script src="<?=base_url('assets/')?>formatRupiah.js"></script>
    <script src="<?=base_url('assets/flatlab/')?>js/jquery-1.8.3.min.js"></script>
    <script src="<?=base_url('assets/flatlab/')?>js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?=base_url('assets/flatlab/')?>js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?=base_url('assets/flatlab/')?>js/jquery.scrollTo.min.js"></script>
    <!-- <script src="<?=base_url('assets/flatlab/')?>js/jquery.nicescroll.js" type="text/javascript"></script> -->
    <script src="<?=base_url('assets/flatlab/')?>js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="<?=base_url('assets/flatlab/')?>assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="<?=base_url('assets/flatlab/')?>js/owl.carousel.js" ></script>
    <script src="<?=base_url('assets/flatlab/')?>js/jquery.customSelect.min.js" ></script>
    <script src="<?=base_url('assets/flatlab/')?>js/respond.min.js" ></script>

    <!--common script for all pages-->
    <script src="<?=base_url('assets/flatlab/')?>js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="<?=base_url('assets/flatlab/')?>js/sparkline-chart.js"></script>
    <script src="<?=base_url('assets/flatlab/')?>js/easy-pie-chart.js"></script>
    <script src="<?=base_url('assets/flatlab/')?>js/count.js"></script>

  <script>
      $(document).ready(function() {
          $("#owl-demo").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true,
        autoPlay:true

          });
      });

      $(function(){
          $('select.styled').customSelect();
      });

  </script>