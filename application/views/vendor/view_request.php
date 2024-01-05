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
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
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
<style>
    .btn-set{
        height: 100%;
        display: flex;
        align-items: flex-end;
        justify-content: space-around;
    }
</style>
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
                                <input type="text" id="search_record" name="query" class="form-control float-right"
                                    placeholder="Search">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" >
                      <div class="container">
                        <?php foreach($request as $b):?>
                            <div class="row">
                            
                                <div class="col-xl-12 col-lg-12">
                                    <div class="title">
                                      <h4 class="text-warning">First Journey</h4>
                                      <?php if($b->b_status == "0"): ?>
                                          <span class="badge badge-warning">Pending</span>
                                      <?php elseif($b->b_status == "1"): ?>
                                          <span class="badge badge-success">Completed</span>
                                      <?php else:?>
                                          <span class="badge badge-danger">Cancelled</span>
                                      <?php endif;?>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    
                                  
                                    <div class="text-wrap">
                                        <label for="">Pickup From</label>
                                        <h4><?php echo $b->from_location; ?></h4>
                                        <!-- <ul class="breacrumb">
                                            <li></li>
                                            <?php if($b->via_location != "-"): ?>
                                            <li><?php echo $b->via_location; ?></li>
                                            <?php endif;?>
                                            <li><?php echo $b->to_location; ?></li>
                                        </ul> -->
                                                                                                                
                                    </div>
                                    <?php if($b->journey_type == "Return"):?>
                                    <h4 class="text-warning">Second Journey</h4>
                                  
                                    <div class="text-wrap">
                                      <ul class="breacrumb">
                                          <li><?php echo $b->to_location; ?></li>
                                          
                                          <li><?php echo $b->from_location; ?></li>
                                      </ul>
                                      <h5><i class="fa fa-user"></i> <?php echo $b->return_head_passenger; ?></h5>
                                      <ul class="details">
                                          <li>
                                              <span class="text-primary">Mobile:</span> <?php echo $b->mobile; ?>
                                          </li>
                                          <li>
                                              <span class="text-primary">Passengers:</span> <?php echo $b->return_passenger_no; ?>
                                          </li>
                                          <li>
                                              <span class="text-primary">Luggage:</span> <?php echo $b->return_luggage; ?>
                                          </li>
                                          
                                          <li>
                                              <span class="text-primary">Arrival Date:</span> <?php echo $b->return_date; ?>
                                          </li>
                                          <li>
                                              <span class="text-primary">Arrival time:</span> <?php echo $b->return_time; ?>
                                          </li>
                                      </ul>   
                                      
                                    </div>
                                  <?php endif;?> 
                                
                                                                                                    
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <div class="form">        
                                        <form action="<?php echo base_url('vendor/bid/'.$b->bookingid); ?>" method="post">
                                            <div class="row">
                                                
                                                <div class="col-md-6">
                                                    <label for="">Bid</label>
                                                    <input class="form-control" type="number" min="1" max="<?php echo $b->request_amount; ?>" value="<?php echo $b->request_amount; ?>" name="amount" id="">
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="btn-set">
                                                        <button type="submit" class="btn btn-warning">Bid</button>
                                                        <a href="<?php echo base_url('vendor/cancel_booking_details/'.$b->bookingid); ?>" class="btn btn-danger">Cancel this Request</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <h5><i class="fa fa-user"></i> <?php echo $b->head_passenger; ?></h5>
                                    <ul class="details">
                                        <li>
                                            <span class="text-primary">Mobile:</span> <?php echo $b->mobile; ?>
                                        </li>
                                        <li>
                                            <span class="text-primary">Passengers:</span> <?php echo $b->passenger_no; ?>
                                        </li>
                                        <li>
                                            <span class="text-primary">Luggage:</span> <?php echo $b->luggage; ?>
                                        </li>
                                        <li>
                                            <span class="text-primary">Flight Number:</span> <?php echo $b->flight_no; ?>
                                        </li>
                                        <li>
                                            <span class="text-primary">Arriving From:</span> <?php echo $b->arriving_from; ?>
                                        </li>
                                        <li>
                                            <span class="text-primary">Arrival Date:</span> <?php echo $b->date; ?>
                                        </li>
                                        <li>
                                            <span class="text-primary">Arrival time:</span> <?php echo $b->time; ?>
                                        </li>
                                        <li>
                                            <span class="text-primary">Meet & Greet:</span> <?php if($b->meet_greet == 1){echo "Yes";}else{echo "No";} ; ?>
                                        </li>
                                        <li>
                                            <span class="text-primary">Vehicle:</span> <?php echo $b->vehicle_type; ?>
                                        </li>
                                    </ul>   
                                </div>
                              
                            </div>
                      <?php endforeach;?>
                      </div>
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

    function load_data(query) {
        $.ajax({
            url: "<?php echo base_url('vendor/fetchAllBookings');?>",
            method: "POST",
            data: {
                query: query
            },
            success: function(data) {
                $('#booking_id').html(data);
            }
        })
    }
    $('#search_record').keyup(function() {
        var search = $(this).val();
        if (search != "") {
            load_data(search);
        } else {
            load_data();
        }
    });



});
</script>