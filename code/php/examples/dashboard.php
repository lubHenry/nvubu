<!--
=========================================================
* Paper Dashboard 2 - v2.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/paper-dashboard-2
* Copyright 2020 Creative Tim (https://www.creative-tim.com)

Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<?php
    require('db.php');
    require('auth.php');
    global $con;
    $query = "SELECT DISTINCT posts.p_id,posts.userid,posts.type,posts.sector,posts.title,posts.url,posts.description,
                            posts.cur_image,posts.likes,posts.post_type,posts.posted_by,posts.post,posts.views,users.*,
                            posts.date_created FROM posts,users
                            where posts.userid=1 and posts.posted_by=1 and users.id =posts.userid
                            order by posts.p_id desc";
    $result = $con->query($query);

    $breach = "SELECT COUNT(*) AS Total, type FROM posts WHERE type=1";//Possible breaches
    $pbreach = $con->query($breach);
    $pbre= $pbreach->fetch_array(MYSQLI_ASSOC);

    $breach_diver = "SELECT COUNT(*) AS Total, type FROM posts WHERE type=0";//Possible breaches
    $dbreach = $con->query($breach_diver);
    $dbre= $dbreach->fetch_array(MYSQLI_ASSOC);

    $outBreak = "SELECT COUNT(*) AS Total, type FROM posts WHERE type=2";//Disease outbreak
    $oB = $con->query($outBreak);
    $outB= $oB->fetch_array(MYSQLI_ASSOC);

    $poacher = "SELECT COUNT(*) AS Total, type FROM posts WHERE type=3";//Apprehended poacher
    $po = $con->query($poacher);
    $poac= $po->fetch_array(MYSQLI_ASSOC);

    $po = "SELECT COUNT(*) AS resolved, resolved_by FROM posts WHERE resolved_by=1";//can be edited with more users
    $pod = $con->query($po);
    $pou= $pod->fetch_array(MYSQLI_ASSOC);

    $po1 = "SELECT COUNT(*) AS posted, posted_by FROM posts WHERE posted_by=1";//can be edited with more users
    $pod1 = $con->query($po1);
    $pou1= $pod1->fetch_array(MYSQLI_ASSOC);

    $total_pounts = $pou['resolved'] + $pou1['posted'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Nvubu - Dashboard
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="../assets/img/hippop.jpeg">
          </div>
          <!-- <p>CT</p> -->
        </a>
        <a href="" class="simple-text logo-normal">
         Envubu        
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="active ">
            <a href="dashboard.php">
              <p>Dashboard</p>
            </a>
          </li>
            <li>
                <a href="" >
                    <i class="nc-icon nc-bank"></i>
                    <p>Credits Points(<?=$total_pounts;?>)</p>
                </a>
            </li>
            <li>
                <a href="" data-toggle="modal" data-target="#add_data_Modal">
                    <p>Make a Submission</p>
                </a>
            </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
          </div>
            <div id="result"></div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">            
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-settings-gear-65"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Profile</a>
                  <a class="dropdown-item" href="logout.php">Log Out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-globe text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Possible Breach</p>
                        <?php if($pbre['Total']>0){?>
                      <p class="card-title"><?=$pbre['Total']?><p>
                            <?php }else{?>
                        <p class="card-title">0<p>
                        <?php }?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-refresh"></i>
                  Update Now
                </div>
              </div>
            </div>
          </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-vector text-danger"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Successful Diversions</p>
                                    <?php if($dbre['Total']>0){?>
                                    <p class="card-title"><?=$dbre['Total']?><p>
                                    <?php }else{?>
                                        <p class="card-title">0<p>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-calendar-o"></i>
                            Last day
                        </div>
                    </div>
                </div>
            </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-money-coins text-success"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Possible Outbreak</p>
                        <?php if($outB['Total']>0){?>
                        <p class="card-title"><?=$outB['Total']?><p>
                            <?php }else{?>
                        <p class="card-title">0<p>
                            <?php }?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                    <i class="fa fa-refresh"></i>
                    Update Now
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-favourite-28 text-primary"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Poachers Arrested</p>
                        <?php if($poac['Total']>0){?>
                        <p class="card-title"><?=$poac['Total']?><p>
                            <?php }else{?>
                        <p class="card-title">0<p>
                            <?php }?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-refresh"></i>
                  Update now
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
            <?php
                while ($row = $result->fetch_assoc()) {
            ?>
            <ul class="timeline">
                <?php if($row['type']!=1){?>
             <li id="" onload="">
                <!-- begin timeline-time -->
                <div class="timeline-time">
                    <?php
                        $diff = time() - strtotime($row['date_created']);
                        $days = floor($diff / (60 * 60 * 24));
                        $remainder = $diff % (60 * 60 * 24);
                        $hours = floor($remainder / (60 * 60));
                        $remainder = $remainder % (60 * 60);
                        $minutes = floor($remainder / 60);
                        $seconds = $remainder % 60;

                        $dt = new DateTime($row['date_created']);
                        $time = $dt->format('H:i');

                        if($days > 0) {
                            //$oldLocale = setlocale(LC_TIME, 'pt_BR');
                            $row['date_created'] = strftime("%e %b %Y", strtotime($row['date_created']));
                            echo "<span class='date'>".$row['date_created']."</span>";
                            echo "<span class='time'>$time</span>";
                            // setlocale(LC_TIME, $oldLocale);
                        }
                        elseif($days == 0 && $hours == 0 && $minutes == 0) {
                            echo "<span class='date'>today</span>";
                            echo "<span class='time'>few seconds ago</span>";
                        }
                        elseif($hours) {
                            echo "<span class='date'>today</span>";
                            echo "<span class='time'>$hours  hours ago</span>";
                        }
                        elseif($days == 0 && $hours == 0) {
                            echo "<span class='date'>today</span>";
                            echo "<span class='time'>minutes ago</span>";
                        }
                        else {
                            echo "<span class='date'>today</span>";
                            echo "<span class='time'>few seconds ago</span>";
                        }
                    ?>
                </div>
                <!-- end timeline-time -->
                <!-- begin timeline-icon -->
                <div class="timeline-icon">
                   <a href="javascript:;">&nbsp;</a>
                </div>
                <!-- end timeline-icon -->
                <!-- begin timeline-body -->
                <div class="timeline-body">
                   <div class="timeline-header">
                      <span class="userimage"><img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt=""></span>
                      <span class="username"><a href="javascript:;"><?=$row['fullname'];?></a> <small></small></span>
                       <span class="pull-right text-muted"><a href=""><b>Respond</b></a></span>
                   </div>
                   <div class="timeline-content">
                       <p class="lead">
                           <i class="fa fa-quote-left fa-fw pull-left"></i>
                                <?=$row['post'];?>
                           <i class="fa fa-quote-right fa-fw pull-right"></i>
                       </p>
                   </div>
                   <div class="timeline-likes">
                       <div class="stats-right">
                               <a href=""><span class="fa-stack fa-fw stats-icon" >
                               <i class="fa fa-circle fa-stack-2x text-primary"></i>
                               <i class="fa fa-comments fa-stack-1x fa-inverse t-plus-1"></i>
                               </span>
                               <span class="stats-text" >42</span> </a>&nbsp;&nbsp;&nbsp;&nbsp;
                       </div>
                       <div class="stats" id="">
                           <input type="text" hidden/>
                               <span class="fa-stack fa-fw stats-icon" >
                               <i class="fa fa-circle fa-stack-2x text-primary"></i>
                               <i class="fa fa-thumbs-up fa-stack-1x fa-inverse t-plus-1"></i>
                               </span>
                           <span class="stats-total" ><?=$row['likes'];?> Members Approve </span>
                       </div>
                   </div>
                   <div class="timeline-footer">
                      <a href="javascript:;" class="m-r-15 text-inverse-lighter"><i class="fa fa-thumbs-up fa-fw fa-lg m-r-3"></i> Approve</a>
                      <a href="javascript:;" class="m-r-15 text-inverse-lighter"><i class="fa fa-comments fa-fw fa-lg m-r-3"></i> Comment</a>
                   </div>
                   <div class="timeline-comment-box">
                      <div class="user"><img src="https://bootdey.com/img/Content/avatar/avatar6.png"></div>
                      <div class="input">
                         <form action="">
                            <div class="input-group">
                               <input type="text" class="form-control rounded-corner" placeholder="Write a comment...">
                               <span class="input-group-btn p-l-10">
                               <button class="btn btn-primary f-s-12 rounded-corner" type="button">Comment</button>
                               </span>
                            </div>
                         </form>
                      </div>
                   </div>
                </div>
                <!-- end timeline-body -->
             </li>
             <?php }else{?>
             <li>
                <!-- begin timeline-time -->
                <div class="timeline-time">
                    <?php
                    $diff = time() - strtotime($row['date_created']);
                    $days = floor($diff / (60 * 60 * 24));
                    $remainder = $diff % (60 * 60 * 24);
                    $hours = floor($remainder / (60 * 60));
                    $remainder = $remainder % (60 * 60);
                    $minutes = floor($remainder / 60);
                    $seconds = $remainder % 60;

                    $dt = new DateTime($row['date_created']);
                    $time = $dt->format('H:i');

                    if($days > 0) {
                        //$oldLocale = setlocale(LC_TIME, 'pt_BR');
                        $row['date_created'] = strftime("%e %b %Y", strtotime($row['date_created']));
                        echo "<span class='date'>".$row['date_created']."</span>";
                        echo "<span class='time'>$time</span>";
                        // setlocale(LC_TIME, $oldLocale);
                    }
                    elseif($days == 0 && $hours == 0 && $minutes == 0) {
                        echo "<span class='date'>today</span>";
                        echo "<span class='time'>few seconds ago</span>";
                    }
                    elseif($hours) {
                        echo "<span class='date'>today</span>";
                        echo "<span class='time'>$hours  hours ago</span>";
                    }
                    elseif($days == 0 && $hours == 0) {
                        echo "<span class='date'>today</span>";
                        echo "<span class='time'>minutes ago</span>";
                    }
                    else {
                        echo "<span class='date'>today</span>";
                        echo "<span class='time'>few seconds ago</span>";
                    }
                    ?>
                </div>
                <!-- end timeline-time -->
                <!-- begin timeline-icon -->
                <div class="timeline-icon">
                   <a href="javascript:;">&nbsp;</a>
                </div>
                <!-- end timeline-icon -->
                <!-- begin timeline-body -->
                <div class="timeline-body">
                   <div class="timeline-header">
                      <span class="userimage"><img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt=""></span>
                      <span class="username"><?=$row['fullname'];?></span>
                       <span class="pull-right text-muted"><a href=""><b>Respond</b></a></span>
                   </div>
                   <div class="timeline-content">
                      <h4 class="template-title">
                         <i class="fa fa-map-marker text-danger fa-fw"></i>
                             Sector <?=$row['sector'];?>
                      </h4>
                      <p><?=$row['post'];?></p>
                      <p class="m-t-20">
                         <img src="../assets/img/hippop.jpeg">
                      </p>
                   </div>
                    <div class="timeline-likes">
                        <div class="stats-right">
                            <a href=""><span class="fa-stack fa-fw stats-icon" >
                               <i class="fa fa-circle fa-stack-2x text-primary"></i>
                               <i class="fa fa-comments fa-stack-1x fa-inverse t-plus-1"></i>
                               </span>
                                <span class="stats-text" >42</span> </a>&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                        <div class="stats" id="">
                            <input type="text" hidden/>
                            <span class="fa-stack fa-fw stats-icon" >
                               <i class="fa fa-circle fa-stack-2x text-primary"></i>
                               <i class="fa fa-thumbs-up fa-stack-1x fa-inverse t-plus-1"></i>
                               </span>
                            <span class="stats-total" ><?=$row['likes'];?> Members Approve </span>
                        </div>
                    </div>
                   <div class="timeline-footer">
                      <a href="javascript:;" class="m-r-15 text-inverse-lighter"><i class="fa fa-thumbs-up fa-fw fa-lg m-r-3"></i> Like</a>
                      <a href="javascript:;" class="m-r-15 text-inverse-lighter"><i class="fa fa-comments fa-fw fa-lg m-r-3"></i> Comment</a>
                   </div>
                </div>
                <!-- end timeline-body -->
             </li>
                <?php }}?>
          </ul>
       </div>

      </div>
      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
          </div>
        </div>
      </footer>
    </div>
  </div>
  <div id="add_data_Modal" class="modal fade">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title">Make a Submission</h4>
              </div>
              <div class="modal-body">
                  <form method="post" id="insert_form">
                      <label>Enter Sector Number</label>
                      <input type="text" name="sector" id="sector" class="form-control" />
                      <br />
                      <label>Select Type Of Distress</label>
                      <select name="distress" id="distress" class="form-control">
                          <option value="animal">Animal Breach</option>
                          <option value="disease">Disease Outbreak</option>
                          <option value="poacher">Poacher Activity</option>
                      </select>
                      <br />
                      <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />

                  </form>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
          </div>
      </div>
  </div>
  <div id="dataModal" class="modal fade">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Volunteer Details</h4>
              </div>
              <div class="modal-body" id="employee_detail">

              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
          </div>
      </div>
  </div>

  <script>
      $(document).ready(function(){
          $('#insert_form').on("submit", function(event){
              event.preventDefault();
              if($('#sector').val() == "")
              {
                  alert("Sector Number is required");
              }

              else
              {
                  $.ajax({
                      url:"insert.php",
                      method:"POST",
                      data:$('#insert_form').serialize(),
                      beforeSend:function(){
                          $('#insert').val("Inserting");
                      },
                      success:function(data){
                          $('#insert_form')[0].reset();
                          $('#add_data_Modal').modal('hide');
                          $('#result').html(data);
                      }
                  });
              }
          });

          $(document).on('click', '.view_data', function(){
              //$('#dataModal').modal();
              var employee_id = $(this).attr("id");
              $.ajax({
                  url:"select.php",
                  method:"POST",
                  data:{employee_id:employee_id},
                  success:function(data){
                      $('#employee_detail').html(data);
                      $('#dataModal').modal('show');
                  }
              });
          });
      });
  </script>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>
</body>

</html>
