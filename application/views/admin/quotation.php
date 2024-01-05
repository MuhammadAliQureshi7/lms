<!DOCTYPE html>
<html lang="en">
<head>
  
  
<?php include("head.php");  ?>
<style>
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-option {
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            cursor: pointer;
        }

        .dropdown-option:hover {
            background-color: #ddd;
        }
    </style>

</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">



  <!-- Navbar -->
  <?php include ('header.php'); ?>
  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-fluid">
        <div class="card">
              <div class="card-header">
                <h3 class="card-title">Booking Requests</h3>

                <div class="card-tools dropdown">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <!-- <span style="padding-right:200px;">Status</span>
                <div class="dropdown-content">
                <div class="dropdown-option">completed</div>
                <div class="dropdown-option">Pending</div>
                </div> -->
                    <input type="text" id="search_record" name="query" class="form-control float-right" placeholder="Search">
                    <!-- <div class="dropdown"> -->
       
    <!-- </div> -->
                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
              <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Booking ID</th>
                      <th>From</th>
                      <th>Via</th>
                      <th>To</th>
                      <th>Date & Time</th>
                      <th>Amount</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="booking_id">
                    
                    
                    </tbody>
                  </table>
              </div>
              <!-- /.card-body -->
            </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <?php include("footer.php");  ?>
  
</body>
</html>


<script>
  $(document).ready(function() {


        // function load_data(query){
        //     $.ajax({
        //         url:"<?php //echo base_url('vendor/fetchAllBookings');?>",
        //         method:"POST",
        //         success:function(data){
        //             $('#booking_id').html(data);
        //         }
        //     })
        // }
    
        // $('#search_record').keyup(function(){
        //   var search = $(this).val();
        //   // console.log(search);
        //   if(search != ""){
        //   var b = load_data(search);
        //   console.log(b);
        //   }
        //   else{
        //     load_data();
        //   }
        // });


        load_data();
        function load_data(query){
            $.ajax({
                url:"<?php echo base_url('vendor/fetchAllBookings');?>",
                method:"POST",
                data:{query:query},
                success:function(data){
                    $('#booking_id').html(data);
                }
            })
        }
        $('#search_record').keyup(function(){
          var search = $(this).val();
          if(search != ""){
            load_data(search);
          }
          else{
            load_data();
          }
        });


        
});


</script>
