<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head.php'); ?>
</head>
<body>
    <div class="page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-1 col-lg-1 col-md-1 no-padding">
                    <?php include('navigation.php'); ?> 
                </div>
                <div class="col-xl-11 col-lg-11 col-md-11 no-padding">
                    <?php include('header.php'); ?>
                    <div class="section">
                        <div class="count">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-2 col-md-2">
                                        <div class="core_team panel">                                        
                                            <h5><i class="fa fa-user"></i>Core Team Members</h5>
                                            <h3><?php echo $count; ?></h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2">
                                        <div class="team panel">                                        
                                            <h5><i class="fa fa-users"></i>Team Members</h5>
                                            <h3><?php echo $teamcount; ?></h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2">
                                        <div class="clients panel">                                        
                                            <h5><i class="fa fa-briefcase"></i>Clients</h5>
                                            <h3><?php echo $clients; ?></h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2">
                                        <div class="projects panel">                                        
                                            <h5><i class="fa fa-tasks"></i>Total Projects</h5>
                                            <h3><?php echo $projects; ?></h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2">
                                        <div class="ongoing_projects panel">                                        
                                            <h5><i class="fa fa-tasks"></i>Ongoing Projects</h5>
                                            <h3><?php echo $ongoing; ?></h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2">
                                        <div class="ongoing_projects panel">                                        
                                            <h5><i class="fa fa-check-square"></i>Assign requests</h5>
                                            <h3><?php echo $request; ?></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php include('footer.php'); ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>