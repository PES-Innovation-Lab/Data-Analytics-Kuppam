<?php 
session_start() ;
?>
<!DOCTYPE html>

<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>My Dashboard | DST Project</title>
    <script src="../js/circos.js"></script>   
	<!-- Favicon -->
    <link rel="icon" href="images/favicon.png" sizes="16x16" type="image/png">
	
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">

  </head>

  <body onload="setData()" class="nav-md" >
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><span class="glyphicon glyphicon-dashboard"></span><span> &nbsp My Dashboard</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img id="images" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <!--<h2><?php //echo $_SESSION['USER'];?></h2>-->
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>&nbsp</h3>
                <ul class="nav side-menu">
                  <li><a href="dashboard.php"><i class="fa fa-home"></i> Home</a>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a target="_blank" href="../../report">Report Generation</a></li>
                      <li><a target="_blank" href="../../follow_up">Follow-Up Updation</a></li>
                    </ul>
                  </li>
				  <li><a href="student_id.php"><i class="fa fa-users"></i> Student ID Info</a>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="chartjs.html">Chart JS</a></li>
                      <li><a href="chartjs2.html">Chart JS2</a></li>
                      <li><a href="morisjs.html">Moris JS</a></li>
                      <li><a href="echarts.html">ECharts</a></li>
                      <li><a href="other_charts.html">Other Charts</a></li>
                    </ul>
                  </li>
				   <li><a target="_blank" href="../../Maps/map.html"><i class="fa fa-map-marker"></i>Geospatial Map</a>
                  </li>
                </ul>
              </div>
             
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>
		
        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img id="images2" alt=""><?php echo $_SESSION['USER'];?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="../index.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <script>
          
            var userId= "<?php echo $_SESSION['uname'];?>";
            //console.log("username="+userId);
            document.getElementById("images").src="images/"+userId+".png";
            document.getElementById("images2").src="images/"+userId+".png";
        </script>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-graduation-cap"></i> Total Schools</span>
              <div class="count green" id="sch_count"></div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Students</span>
              <div class="count green" id="stud_count"></div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Males</span>
              <div class="count green" id="male_count"></div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Females</span>
              <div class="count green" id="female_count"></div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-hospital-o"></i> Total Referrals</span>
              <div class="count green" id="referal_count"></div>
              <span class="count_bottom"><i class="red" id="ref_rate"><i class="fa fa-sort-asc"></i> </i> % require attention</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-medkit"></i> Reports Generated</span>
              <div class="count green" id="report_count"></div>
              <span class="count_bottom"><i class="red" id="repo_rate"><i class="fa fa-sort-asc"></i> </i> % not generated</span>
            </div>
          </div>
          <!-- /top tiles -->

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">

                <div class="row x_title">
                  <div class="col-md-6">
                    <h3>Health Camp Activities <small>Day-to-Day Sync Report </small></h3>
                  </div>
                </div>

                <div class="col-md-12 col-sm-9 col-xs-12">
                  <div id="placeholder33" style="height: 260px; display: none" class="demo-placeholder"></div>
                  <div style="width: 100%;">
                    <div id="canvas_dahs" class="demo-placeholder" style="width: 100%; height:270px;"></div>
                  </div>
                </div>

                <div class="clearfix"></div>
              </div>
            </div>

          </div>
          <br />

          <div class="row">

			<div class="col-md-3">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Weather Report</h2>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content" >
                  <a href="http://www.accuweather.com/en/in/kuppam/191872/weather-forecast/191872" class="aw-widget-legal"></a>
				  <div id="awcc1481390194015" class="aw-widget-current"  data-locationkey="191872" data-unit="c" data-language="en-us" data-useip="false" data-uid="awcc1481390194015"></div>
				  <script type="text/javascript" src="http://oap.accuweather.com/launch.js"></script>
                </div>
              </div>
            </div>
			
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320 overflow_hidden">
                <div class="x_title">
                  <h2>Refferal Distribution</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table class="" style="width:100%">
                    <tr>
                      <th style="width:37%;">
                      </th>
                      <th>
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                          <p class="">Category</p>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                          <p class="">Percentage</p>
                        </div>
                      </th>
                    </tr>
                    <tr>
                      <td>
                        <canvas id="canvas1" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                      </td>
                      <td>
                        <table class="tile_info">
                          <tr>
                            <td>
                              <p><i class="fa fa-square aero"></i>Eye</p>
                            </td>
                            <td id="ref_val0"></td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square purple"></i>ENT</p>
                            </td>
                            <td id="ref_val1"></td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square red"></i>Skin</p>
                            </td>
                            <td id="ref_val2"></td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square green"></i>Oral</p>
                            </td>
                            <td id="ref_val3"></td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square blue"></i>General</p>
                            </td>
                            <td id="ref_val4"></td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
			
			<div class="col-md-5 col-sm-4 col-xs-12">
              <div class="x_panel tile fixed_height_320 overflow_hidden">
                <div class="x_title">
                  <h2>Madal Refferal Distribution</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table class="" style="width:100%">
                    <tr>
                      <th style="width:37%;">
                      </th>
                      <th>
                        <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                          <p class="">Category</p>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                          <p class="">Percentage</p>
                        </div>
                      </th>
                    </tr>
                    <tr>
                      <td>
                        <canvas id="canvas2" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                      </td>
                      <td>
                        <table class="tile_info">
                          <tr>
                            <td>
                              <p><i class="fa fa-square aero"></i>Kuppam</p>
                            </td>
                            <td id="mand_val0">5</td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square purple"></i>Gudupalli</p>
                            </td>
                            <td id="mand_val1">4</td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square red"></i>Shanthipuram</p>
                            </td>
                            <td id="mand_val2">3</td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square green"></i>Ramakuppam</p>
                            </td>
                            <td id="mand_val3">2</td>
                          </tr>
                          <tr>
                            <td>
                              <p><i class="fa fa-square blue"></i>Vkota</p>
                            </td>
                            <td id="mand_val4">1</td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>

			
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
           PES Institute of Technology and PES Institute of Medical Science of Research     </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>



    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

    <!-- Flot -->

    <script>
      
      var query;
      var ip_address= window.location.hostname;
     
    </script>


    <!-- JQVMap -->
    <script>
      $(document).ready(function(){
        $('#world-map-gdp').vectorMap({
            map: 'world_en',
            backgroundColor: null,
            color: '#ffffff',
            hoverOpacity: 0.7,
            selectedColor: '#666666',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: ['#E6F2F0', '#149B7E'],
            normalizeFunction: 'polynomial'
        });
      });
    </script>
    <!-- /JQVMap -->

    <!-- Skycons -->
    <script>
      $(document).ready(function() {
        var icons = new Skycons({
            "color": "#73879C"
          }),
          list = [
            "clear-day", "clear-night", "partly-cloudy-day",
            "partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
            "fog"
          ],
          i;

        for (i = list.length; i--;)
          icons.set(list[i], list[i]);

        icons.play();
      });
    </script>
    <!-- /Skycons -->
   
  </body>
</html>
