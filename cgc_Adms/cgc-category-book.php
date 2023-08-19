<?php
error_reporting(0);
ob_start();
require "header.php";
$act = $dance->xss($_GET['act']);
?>

<body>
  <!-- Start Left menu area -->
  <?php require "sidebar.php";?>
  <!-- End Left menu area -->

    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <br><br>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
          <!-- Start Top Bar -->
            <?php include "topbar.php";?>
            <!-- End Top Bar -->
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
                                            <li><a href="index.php">Dashboard</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Category</span>
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
        <!-- Add new Eent -->
        <?php
        if($act == 'add'){

        ?>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
        </div>
        <div class="single-pro-review-area mt-t-30 mg-b-15 " >
                    <div class="container-fluid">
        <div class="row ">
                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                              <?php
                              $save = $_GET['save'];
                              if(!empty($save) && $save =='success' ){
                                $alert->alert('success', 'Your Category added successfully');
                              }
                              if(!empty($save) && $save !='success' ){
                                $alert->alert('error', $dance->xss($GLOBALS[$save]));
                              }
                              if($_POST){
                                $webmaster->resetai('cgc_category');
                                $active = (empty($_POST['active'])) ? 'off' : 'on';
                                $cat_data = array(
                                'title'=> $_POST['title'],
                                'active'=> $active );
                                $objcat = new CategoryCgc();
                                $objcat->categoryItem($cat_data);

                                if($webmaster->add_category($objcat)){
                                  $dance->redirect($_SERVER['PHP_SELF'].'?act=add&save=success');
                                  exit;
                                }else{
                                  $dance->redirect($_SERVER['PHP_SELF'].'?act=add&save=error');
                                  exit;
                                }
                              }

                              ?>
                                <div class="sparkline12-list">
                                    <div class="sparkline12-hd">
                                        <div class="main-sparkline12-hd">
                                          <ul id="myTabedu1" class="tab-review-design">
                              <li class="active"><a href="#description">Create Book Category</a></li>
                          </ul>
                                        </div>
                                    </div>
                                    <div class="sparkline12-graph">
                                        <div class="basic-login-form-ad">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="all-form-element-inner">
                                                        <form action="" method="post" autocomplete="off">
                                                          <div class="form-group-inner">
                                                              <div class="row">
                                                                  <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                                                      <label class="login2 pull-right pull-right-pro"></label>
                                                                  </div>
                                                                  <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                      <div class="row">

                                                                          <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">
                                                                              <div class="form-select-list basic-ele-mg-t-10">

                                                                              </div>
                                                                          </div>
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                            <div class="form-group-inner">
                                                                <div class="row">
                                                                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                                                        <label class="login2 pull-right pull-right-pro">Category</label>
                                                                    </div>
                                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                        <div class="row">

                                                                            <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">
                                                                                <div class="form-select-list basic-ele-mg-t-10">
                                                                                  <div class="input-group">
                                                                                      <span class="input-group-addon"><i class="fa fa-newspaper-o" aria-hidden="true"></i></span>
                                                                                      <input type="text" name="title" placeholder="Category Title" class="form-control" value="">
                                                                                  </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group-inner">
                                                                <div class="row">
                                                                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                                                        <label class="login2 pull-right pull-right-pro">Activation</label>
                                                                    </div>
                                                                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                        <div class="row">

                                                                            <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">
                                                                                <div class="form-select-list basic-ele-mg-t-10">
                                                                                  <div class="form-group">
                                                                                  <div class="checkbox-setting-pro">
                                                                                      <div class="checkbox-title-pro">
                                                                                        <div class="onoffswitch">
                                                                                            <input type="checkbox" name="active" class="onoffswitch-checkbox" id="example"  checked>
                                                                                            <label class="onoffswitch-label" for="example">
                                                                                              <span class="onoffswitch-inner"></span>
                                                                                              <span class="onoffswitch-switch"></span>
                                                                                            </label>
                                                                                        </div>

                                                                                      </div>
                                                                                  </div>
                                                                              </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="form-group-inner">
                                                                <div class="login-btn-inner">
                                                                    <div class="row">
                                                                        <div class="col-lg-3"></div>
                                                                        <div class="col-lg-9">
                                                                            <div class="login-horizental cancel-wp pull-left form-bc-ele">
                                                                                <button onclick="window.history.go(-1); return false;" class="btn btn-white">Cancel</button>
                                                                                <button class="btn btn-sm btn-primary login-submit-cs" type="submit">Save Change</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              </div>
                          </div></div>
                      </div>
        <?php
      }else if ($act == 'edit') {
        $id = $dance->clean($dance->sqli($_GET['id']));
        $cat = $webmaster->view_category($id);
?>

<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
</div>
<div class="single-pro-review-area mt-t-30 mg-b-15 " >
            <div class="container-fluid">
<div class="row ">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                      <?php
                      $save = $_GET['save'];
                      if(!empty($save) && $save =='success' ){
                        $alert->alert('success', 'Your Category updated successfully');
                      }
                      if(!empty($save) && $save !='success' ){
                        $alert->alert('error', $dance->xss($GLOBALS[$save]));
                      }
                      if($_POST){
                        $active = (empty($_POST['active'])) ? 'off' : 'on';
                        $cat_data = array(
                        'id'=> $id,
                        'title'=> $_POST['title'],
                        'active'=> $active );
                        $objcat = new CategoryCgc();
                        $objcat->categoryItem($cat_data);

                        if($webmaster->update_category($objcat)){
                          $dance->redirect($_SERVER['PHP_SELF'].'?act=edit&id='.$id.'&save=success');
                          exit;
                        }else{
                          $dance->redirect($_SERVER['PHP_SELF'].'?act=edit&id='.$id.'&save=error');
                          exit;
                        }
                      }

                      ?>
                        <div class="sparkline12-list">
                            <div class="sparkline12-hd">
                                <div class="main-sparkline12-hd">
                                  <ul id="myTabedu1" class="tab-review-design">
                      <li class="active"><a href="#description">Create Book Category</a></li>
                  </ul>
                                </div>
                            </div>
                            <div class="sparkline12-graph">
                                <div class="basic-login-form-ad">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="all-form-element-inner">
                                                <form action="" method="post" autocomplete="off">
                                                  <div class="form-group-inner">
                                                      <div class="row">
                                                          <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                                              <label class="login2 pull-right pull-right-pro"></label>
                                                          </div>
                                                          <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                              <div class="row">

                                                                  <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">
                                                                      <div class="form-select-list basic-ele-mg-t-10">

                                                                      </div>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Category</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <div class="row">

                                                                    <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="form-select-list basic-ele-mg-t-10">
                                                                          <div class="input-group">
                                                                              <span class="input-group-addon"><i class="fa fa-newspaper-o" aria-hidden="true"></i></span>
                                                                              <input type="text" name="title" placeholder="Category Title" class="form-control" value="<?=$cat[0]->gettitle();?>">
                                                                          </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Activation</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <div class="row">

                                                                    <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="form-select-list basic-ele-mg-t-10">
                                                                          <div class="form-group">
                                                                          <div class="checkbox-setting-pro">
                                                                              <div class="checkbox-title-pro">
                                                                                <div class="onoffswitch">
                                                                                  <?php
                                                                                  if($cat[0]->getactive()=="on"){
                                                                                    echo '<input type="checkbox" name="active" class="onoffswitch-checkbox" id="example"  checked>';
                                                                                  }else{
                                                                                    echo '<input type="checkbox" name="active" class="onoffswitch-checkbox" id="example">';
                                                                                  }
                                                                                   ?>
                                                                                    <label class="onoffswitch-label" for="example">
                                                                                      <span class="onoffswitch-inner"></span>
                                                                                      <span class="onoffswitch-switch"></span>
                                                                                    </label>
                                                                                </div>

                                                                              </div>
                                                                          </div>
                                                                      </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="form-group-inner">
                                                        <div class="login-btn-inner">
                                                            <div class="row">
                                                                <div class="col-lg-3"></div>
                                                                <div class="col-lg-9">
                                                                    <div class="login-horizental cancel-wp pull-left form-bc-ele">
                                                                        <button onclick="window.history.go(-1); return false;" class="btn btn-white">Cancel</button>
                                                                        <button class="btn btn-sm btn-primary login-submit-cs" type="submit">Save Change</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                  </div></div>
              </div>
<?php

    }else{
        $cats = $webmaster->view_category();
         ?>
        <!-- Static Table Start -->
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12"></div>
        <div class="courses-area">
            <div class="container-fluid">

                <div class="row">
                  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div id="msg"></div>
                        <div class="sparkline8-list">
                            <div class="sparkline8-hd">
                                <div class="main-sparkline8-hd">
                                    <h1>Category Table</h1>
                                </div>
                                <div class="product-buttons">
                              <a href="cgc-category-book.php?act=add" class="pull-right"><button type="button" class="button-default cart-btn"><i class="fa fa-plus" aria-hidden="true"></i> Category</button></a>
                          </div>
                            </div>
                            <div class="sparkline8-graph">
                                <div class="static-table-list">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Category name</th>
                                                <th>Total books</th>
                                                <th>Active</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                            foreach ($cats as $cat) {
                                            ?>
                                             <tr id="<?=$cat->getid();?>">
                                                 <td><?=$cat->getid();?></td>
                                                 <td><?=$cat->gettitle();?></td>
                                                 <td><?=$webmaster->sqlcount('cgc_books','id','id_category',$dance->sqli($cat->getid()));?></td>
                                                 <td><?=$cat->getactive();?></td>
                                                 <td><a href="cgc-category-book.php?act=edit&id=<?=$cat->getid();?>"><button class="pd-setting-ed" type="submit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                                 <button data-toggle="tooltip" class="pd-setting-ed" data-original-title="Trash" onclick="deletecategory('category',<?=$cat->getid();?>)"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>

                                             </tr>
                                             <?php
                                             }
                                              ?>
                                         </tbody>
                                     </table>
                                 </div>
                             </div>
                         </div>
                     </div>

            </div>
        </div>
        <!-- Static Table End -->
      <?php } ?>
        </div>
      </div>
  </div>

<script>

function deletecategory(item, id) {
$.ajax({
  method: "POST",
  url: "cgc-delete.php",
  data: { item: item, id: id }
})
  .done(function() {
    $('#msg').html('<div class="alert alert-success alert-success-style1 alert-success-stylenone"><button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close"><span class="icon-sc-cl" aria-hidden="true">&times;</span></button><i class="fa fa-check edu-checked-pro admin-check-sucess admin-check-pro-none" aria-hidden="true"></i><p class="message-alert-none"><strong> Success ! </strong>Category '+id+' Deleted Successfully</p></div>');
setTimeout(function(){
    $("#"+id).remove();
},250);
setTimeout(function(){
          $("#msg").empty();
},1050);
  });
}
</script>

<?php include "footer.php"; ob_end_flush(); ?>
