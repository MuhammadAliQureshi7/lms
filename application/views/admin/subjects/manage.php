<!DOCTYPE html>
<html lang="en">
<head>
  
  
<?php $this->load->view('admin/head'); ?>
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
  <?php $this->load->view('admin/header'); ?>
  <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><?php echo $title; ?></h3>

                    <div class="card-tools dropdown">
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addSubject">Add Subject</button>
                        <!--<div class="input-group input-group-sm" style="width: 150px;">
                        <span style="padding-right:200px;">Status</span>
                        <div class="dropdown-content">
                        <div class="dropdown-option">completed</div>
                        <div class="dropdown-option">Pending</div>
                        
                        <input type="text" id="search_record" name="query" class="form-control float-right" placeholder="Search">
                        <div class="dropdown"> 
        
                        </div>
                        <div class="input-group-append">
                        <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                        </button>
                        </div>-->
                    </div>
                </div> 
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <table id="item-list" class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Date Created</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    <!-- Modal -->
    <div id="addSubject" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Subject</h4>
                </div>
                <div class="modal-body">
                    <p>Some text in the modal.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    
  <?php $this->load->view('admin/footer');  ?>
  
</body>
</html>


<script>
    // new DataTable('#example');
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


$(document).ready(function() {
    $('#item-list').DataTable({
        "ajax": {
            url : "get_subjects",
            type : 'GET'
        },
    });
});
</script>
