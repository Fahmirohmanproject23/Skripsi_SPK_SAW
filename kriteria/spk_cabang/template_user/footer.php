  <footer class="ftco-footer">
    <div class="container mb-5 pb-4">
      <div class="row">
        <div class="col-lg col-md-6">
          <div class="ftco-footer-widget">
            <h2 class="ftco-heading-2 d-flex align-items-center">About</h2>
            <p>Far far away, behind the word mountains, far from the countries.</p>
            <ul class="ftco-footer-social list-unstyled mt-4">
              <li><a href="#"><span class="fa fa-twitter"></span></a></li>
              <li><a href="#"><span class="fa fa-facebook"></span></a></li>
              <li><a href="#"><span class="fa fa-instagram"></span></a></li>
            </ul>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="ftco-footer-widget">
            <h2 class="ftco-heading-2">Links</h2>
            <div class="d-flex">
              <ul class="list-unstyled mr-md-4">
          <li class="<?php if ($page=='home'){echo 'nav-item active';} else {echo 'nav-item';} ?>"><a href="dashboard.php"  class="nav-link">Home</a></li>
          <li class="<?php if ($page=='kriteria'){echo 'nav-item active';} else {echo 'nav-item';} ?>"><a href="kriteria.php" class="nav-link">Kriteria</a></li>
          <li class="<?php if ($page=='cabang'){echo 'nav-item active';} else {echo 'nav-item';} ?>"><a href="data_cabang.php" class="nav-link">Data Cabang</a></li>
          <li class="<?php if ($page=='alternatif'){echo 'nav-item active';} else {echo 'nav-item';} ?>"><a href="alternatif.php" class="nav-link">Alternatif</a></li>
          <li class="<?php if ($page=='perhitungan'){echo 'nav-item active';} else {echo 'nav-item';} ?>"><a href="perhitungan.php" class="nav-link">Perhitungan</a></li>
          <li class="<?php if ($page=='user'){echo 'nav-item active';} else {echo 'nav-item';} ?>"><a href="user.php" class="nav-link">User</a></li>
              </ul>
             
            </div>
          </div>
        </div>


    </footer>
    

      </div>
      </div>
    </div>


    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

    <script src="assets_user/js/jquery.min.js"></script>
    <script src="assets_user/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="assets_user/js/popper.min.js"></script>
    <script src="assets_user/js/bootstrap.min.js"></script>
    <script src="assets_user/js/jquery.easing.1.3.js"></script>
    <script src="assets_user/js/jquery.waypoints.min.js"></script>
    <script src="assets_user/js/jquery.stellar.min.js"></script>
    <script src="assets_user/js/owl.carousel.min.js"></script>
    <script src="assets_user/js/jquery.magnific-popup.min.js"></script>
    <script src="assets_user/js/jquery.animateNumber.min.js"></script>
    <script src="assets_user/js/bootstrap-datepicker.js"></script>
    <script src="assets_user/js/jquery.timepicker.min.js"></script>
    <script src="assets_user/js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="assets_user/js/google-map.js"></script>
     <!-- jQuery Scrollbar -->
  <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
  <!-- Datatables -->
  <script src="assets/js/plugin/datatables/datatables.min.js"></script>
  <!-- Atlantis JS -->
  <script src="assets/js/atlantis.min.js"></script>
  <!-- Atlantis DEMO methods, don't include it in your project! -->
  <script src="assets/js/setting-demo2.js"></script>
  <script >
    $(document).ready(function() {
      $('#basic-datatables').DataTable({
      });

      $('#multi-filter-select').DataTable( {
        "pageLength": 5,
        initComplete: function () {
          this.api().columns().every( function () {
            var column = this;
            var select = $('<select class="form-control"><option value=""></option></select>')
            .appendTo( $(column.footer()).empty() )
            .on( 'change', function () {
              var val = $.fn.dataTable.util.escapeRegex(
                $(this).val()
                );

              column
              .search( val ? '^'+val+'$' : '', true, false )
              .draw();
            } );

            column.data().unique().sort().each( function ( d, j ) {
              select.append( '<option value="'+d+'">'+d+'</option>' )
            } );
          } );
        }
      });

      // Add Row
      $('#add-row').DataTable({
        "pageLength": 5,
      });

      var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

      $('#addRowButton').click(function() {
        $('#add-row').dataTable().fnAddData([
          $("#addName").val(),
          $("#addPosition").val(),
          $("#addOffice").val(),
          action
          ]);
        $('#addRowModal').modal('hide');

      });
    });
  </script>
    
    <script src="assets_user/js/main.js"></script>
    
  </body>
  </html>