<?php
require "header.php";

?>

<body>
  <!-- Start Left menu area -->
  <?=require "sidebar.php";?>
  <!-- End Left menu area -->



          <!-- Start Top Bar -->
            <?php include "topbar.php";?>

              <div class="all-content-wrapper">
                  <div class="container-fluid">
                      <div class="row">
                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <div class="logo-pro">
                                  <a href="index.php">Home<img class="main-logo" src="" alt="" /></a>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="header-advance-area">


                      <div class="breadcome-area">
                          <div class="container-fluid">
                              <div class="row">
                                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                      <div class="breadcome-list single-page-breadcome">
                                          <div class="row">
                                              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                  <div class="breadcome-heading">
                                                      <form role="search" class="sr-input-func">
                                                          <input type="text" placeholder="Search..." class="search-int form-control">
                                                          <a href="#"><i class="fa fa-search"></i></a>
                                                      </form>
                                                  </div>
                                              </div>
                                              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                  <ul class="breadcome-menu">
                                                      <li><a href="#">Dashobard</a> <span class="bread-slash">/</span>
                                                      </li>
                                                      <li><span class="bread-blod">Home</span>
                                                      </li>
                                                  </ul>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>

      <div class="analytics-sparkle-area">
        <div class="product-sales-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">

                  <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                      <div class="white-box"> <div class="stats-icon pull-right">
                              <i class="educate-icon educate-professor"></i>
                          </div>
                          <h3 class="box-title">Members Info</h3>
                          <ul class="basic-list">
                              <li>Total Members <span class="pull-right label-danger label-1 label"><span class="counter"><?=$webmaster->count('cgc_members','email');?></span></span></li>
                          </ul>
                      </div>
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                      <div class="white-box"> <div class="stats-icon pull-right">
                            <i class="educate-icon educate-library"></i>
                          </div>
                          <h3 class="box-title">Library Info</h3>
                          <ul class="basic-list">
                              <li>Total Books <span class="pull-right label-warning label-1 label"><span class="counter"><?=$webmaster->count('cgc_books','id');?></span></span></li>
                          </ul>
                      </div>
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                      <div class="white-box"> <div class="stats-icon pull-right">
                              <i class="educate-icon educate-data-table"></i>
                          </div>
                          <h3 class="box-title">News Info</h3>
                          <ul class="basic-list">
                              <li>Total News <span class="pull-right label-purple label-2 label"><span class="counter"><?=$webmaster->count('cgc_news','id');?></span></span></li>
                          </ul>
                          <ul class="basic-list">
                              <li>Total Events <span class="pull-right label-purple label-2 label"><span class="counter"><?=$webmaster->count('cgc_events','id');?></span></span></li>
                          </ul>
                      </div>
                  </div>
                </div>
            </div>
        </div>

        <div class="library-book-area mg-t-30">
            <div class="container-fluid">
                <div class="row">



                </div>
            </div>
        </div>
        <div class="courses-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="white-box res-mg-t-30 table-mg-t-pro-n">
                            <h3 class="box-title">Visits from countries</h3>
                            <ul class="country-state">
                                <li>
                                    <h2><span class="counter">1250</span></h2> <small>From Australia</small>
                                    <div class="pull-right">75% <i class="fa fa-level-up text-danger ctn-ic-1"></i></div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-danger ctn-vs-1" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:75%;"> <span class="sr-only">75% Complete</span></div>
                                    </div>
                                </li>
                                <li>
                                    <h2><span class="counter">1050</span></h2> <small>From USA</small>
                                    <div class="pull-right">48% <i class="fa fa-level-up text-success ctn-ic-2"></i></div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-info ctn-vs-2" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:48%;"> <span class="sr-only">48% Complete</span></div>
                                    </div>
                                </li>
                                <li>
                                    <h2><span class="counter">6350</span></h2> <small>From Canada</small>
                                    <div class="pull-right">55% <i class="fa fa-level-up text-success ctn-ic-3"></i></div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success ctn-vs-3" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:55%;"> <span class="sr-only">55% Complete</span></div>
                                    </div>
                                </li>
                                <li>
                                    <h2><span class="counter">950</span></h2> <small>From India</small>
                                    <div class="pull-right">33% <i class="fa fa-level-down text-success ctn-ic-4"></i></div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-success ctn-vs-4" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:33%;"> <span class="sr-only">33% Complete</span></div>
                                    </div>
                                </li>
                                <li>
                                    <h2><span class="counter">3250</span></h2> <small>From Bangladesh</small>
                                    <div class="pull-right">60% <i class="fa fa-level-up text-success ctn-ic-5"></i></div>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-inverse ctn-vs-5" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:60%;"> <span class="sr-only">60% Complete</span></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
    <!-- < Footer Area > -->
<?php include "footer.php";?>
