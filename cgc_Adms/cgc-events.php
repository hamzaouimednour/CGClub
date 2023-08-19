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
                                            <li><span class="bread-blod">Events</span>
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
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">

                          <?php
                          $save = $_GET['save'];
                          if(!empty($save) && $save =='success' ){
                            $alert->alert('success', 'Your Event added successfully');
                          }
                          if(!empty($save) && $save !='success' ){
                            $alert->alert('error', $dance->xss($GLOBALS[$save]));
                          }
                          if($_POST){
                            $webmaster->resetai('cgc_events');
                            $photo = $_FILES['photo'];
                            $phname = md5(time().uniqid(rand()));
                            $objfile = new Upload($photo);
                            $objfile->typesValides(array('image/jpg','image/jpeg','image/png','image/gif'));
                            $objfile->extValides(array('jpg','jpeg','png','gif'));
                            $objfile->changeName($phname);
                            $active = (empty($_POST['active'])) ? 'off' : 'on';
                            $event_data = array(
                            'title'=>$_POST['title'],
                            'date_event'=>$dance->sqli($_POST['date_event']),
                            'description'=>$_POST['description'],
                            'prix'=>$dance->sqli($_POST['prix']) ,
                            'photo'=>$dance->sqli($objfile->nom),
                            'active'=> $active );

                            $objevent = new EventCgc();
                            $objevent->eventItem($event_data);
                            if(!$objfile->uploadfichier('../images/events/',5*MB )){
                              $dance->redirect($_SERVER['PHP_SELF'].'?act=add&save='.$objfile->error);
                              exit;
                            }
                            if($webmaster->add_event($objevent)){
                              $dance->redirect($_SERVER['PHP_SELF'].'?act=add&save=success');
                              exit;
                            }else{
                              unlink('../images/events/'.$objfile->nom);
                              $dance->redirect($_SERVER['PHP_SELF'].'?act=add&save=error');
                              exit;
                            }
                          }

                          ?>
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Event Details</a></li>
                            </ul>

                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div class="pro-ad addcoursepro">
                                                    <form action="" class="needsclick form-validation" method="post" enctype="multipart/form-data" autocomplete="off" accept="image/*">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                    <input name="title" type="text" class="form-control" placeholder="Event Title" required>
                                                                </div>

                                                                <div class="form-group">
                                                                    <input name="prix" type="number" class="form-control" placeholder="Event Price" min="0">

                                                                </div>
                                                                <div class="form-group">
                                                                  <div id="Settings" class="tab-pane fade active in"><div class="checkbox-setting-pro">
                                                                                <div class="checkbox-title-pro">
                                                                                    <h2 class="text-info"><strong> Enabled <i class="glyphicon glyphicon-eye-close"></i> : </strong></h2>
                                                                                    <div class="ts-custom-check">
                                                                                        <div class="onoffswitch">
                                                                                            <input class="onoffswitch-checkbox" id="example2" type="checkbox" name="active" checked>
                                                                                          <label class="onoffswitch-label" for="example2">
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
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                              <div class="form-group">
                                                                  <input name="date_event" id="finish" type="text" class="form-control" placeholder="Event Start Date" required>
                                                              </div>
                                                              <div class="form-group">
                                                                    <div class="file-upload-inner ts-forms">
                                                                        <div class="input prepend-big-btn">
                                                                            <label class="icon-right" for="prepend-big-btn">
                                                                              <i class="fa fa-upload"></i>
                                                                            </label>
                                                                            <div class="file-button">
                                                                                Browse
                                                                                <input type="file" onchange="document.getElementById('prepend-big-btn').value = this.value;" name ="photo">
                                                                            </div>
                                                                            <input type="text" id="prepend-big-btn" readonly="" placeholder="no file selected"  disabled required>
                                                                        </div>
                                                                    </div>
                                                              </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <textarea name="description" id="summernote4" placeholder="Description"></textarea>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                              <div class="payment-adress">
                                                                <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                                                <button type="reset" class="btn btn-warning waves-effect waves-light">Reset</button>
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
                    </div>
                </div>
            </div>
        </div>
        <?php
      }else if ($act == 'edit') {
        $id = $dance->sqli($_GET['id']);
        $event = $webmaster->view_events($id);
?>

<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-payment-inner-st">
                  <?php
                  $save = $_GET['save'];
                  if(!empty($save) && $save =='success' ){
                    $alert->alert('success', 'Your Event updated successfully');
                  }
                  if(!empty($save) && $save !='success' ){
                    $alert->alert('error', $dance->xss($GLOBALS[$save]));
                  }
                  if($_POST){
                    $photo = $_FILES['photo'];
                    $objfile = new Upload($photo);
                    $objfile->typesValides(array('image/jpg','image/jpeg','image/png','image/gif'));
                    $objfile->extValides(array('jpg','jpeg','png','gif'));
                    if(!empty($photo['name'])){
                      $phname = md5(time().uniqid(rand()));
                      $objfile->changeName($phname);
                    }
                    $active = (empty($_POST['active'])) ? 'off' : 'on';
                    $event_data = array( 'id'=>$dance->sqli($id),
                    'title'=>$dance->sqli($_POST['title']),
                    'date_event'=>$dance->sqli($_POST['date_event']),
                    'description'=>$dance->sqli($_POST['description']),
                    'prix'=>$dance->sqli($_POST['prix']) ,
                    'photo'=>$dance->sqli($objfile->nom),
                    'active'=> $active );

                    $objevent = new EventCgc();
                    $objevent->eventItem($event_data);
                    if(!empty($photo['name'])){
                      if(!$objfile->uploadfichier('../images/events/',5*MB )){
                        $dance->redirect($_SERVER['PHP_SELF'].'?act=edit&id='.$id.'&save='.$objfile->error);
                        exit;
                      }
                      if($webmaster->update_events($objevent)){
                        $dance->redirect($_SERVER['PHP_SELF'].'?act=edit&id='.$id.'&save=success');
                        exit;
                      }else{
                        $dance->redirect($_SERVER['PHP_SELF'].'?act=edit&id='.$id.'&save=error');
                        exit;
                      }
                  }else {
                    if($webmaster->update_events($objevent)){
                      $dance->redirect($_SERVER['PHP_SELF'].'?act=edit&id='.$id.'&save=success');
                      exit;
                    }else{
                      $dance->redirect($_SERVER['PHP_SELF'].'?act=edit&id='.$id.'&save=error');
                      exit;
                    }
                  }
                  }

                  ?>
                    <ul id="myTabedu1" class="tab-review-design">
                        <li class="active"><a href="#description">Event Details</a></li>
                    </ul>

                    <div id="myTabContent" class="tab-content custom-product-edit">
                        <div class="product-tab-list tab-pane fade active in" id="description">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <div class="pro-ad addcoursepro">
                                            <form action="" class="needsclick form-validation" method="post" enctype="multipart/form-data" autocomplete="off" accept="image/*">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                            <input name="title" type="text" class="form-control" placeholder="Event Title" value="<?=$event[0]->gettitle();?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <input name="date_event" id="finish" type="text" class="form-control" placeholder="Event Start Date" value="<?=$event[0]->getdate_event();?>">
                                                        </div>
                                                        <div class="form-group">
                                                            <input name="prix" type="number" class="form-control" placeholder="Event Price" min="0" value="<?=$event[0]->getprix();?>">
                                                        </div>
                                                        <div class="form-group">
                                                              <div class="file-upload-inner ts-forms">
                                                                  <div class="input prepend-big-btn">
                                                                      <label class="icon-right" for="prepend-big-btn">
                                                                        <i class="fa fa-upload"></i>
                                                                      </label>
                                                                      <div class="file-button">
                                                                          Browse
                                                                          <input type="file" onchange="document.getElementById('prepend-big-btn').value = this.value;" name ="photo">
                                                                      </div>
                                                                      <input type="text" id="prepend-big-btn" readonly="" placeholder="No file selected"  disabled>
                                                                  </div>
                                                              </div>
                                                        </div>
                                                        <div class="form-group">
                                                          <div id="Settings" class="tab-pane fade active in"><div class="checkbox-setting-pro">
                                                                        <div class="checkbox-title-pro">
                                                                            <h2 class="text-info"><strong> Enabled <i class="glyphicon glyphicon-eye-close"></i> : </strong></h2>
                                                                            <div class="ts-custom-check">
                                                                                <div class="onoffswitch">
                                                                                    <?php
                                                                                    if($event[0]->getactive()=="on"){
                                                                                      echo '<input class="onoffswitch-checkbox" id="example2" type="checkbox" name="active" checked>';
                                                                                    }else{
                                                                                      echo '<input class="onoffswitch-checkbox" id="example2" type="checkbox" name="active" >';
                                                                                    }
                                                                                     ?>
                                                                                  <label class="onoffswitch-label" for="example2">
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
                                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                      <div class="form-group">
                                                        <img class="img-thumbnail" src="../images/events/<?=$event[0]->getphoto();?>"/>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <textarea name="description" id="summernote4" placeholder="Description"><?=stripslashes($event[0]->getdescription());?></textarea>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                      <div align="center">
                                                        <button type="button" onclick="window.history.go(-1); return false;" class="btn btn-custon-rounded-four btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i> Return</button>
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save Change</button>
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
            </div>
        </div>
    </div>
</div>
<?php

    }else{
        $events = $webmaster->view_events();
         ?>
        <!-- Static Table Start -->
        <div class="courses-area">
            <div class="container-fluid">
<div id="msg"></div>
                <div class="row">
                  <?php
                  foreach ($events as $event) {

                   ?>
                  <div id="<?=$event->getid();?>" class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                      <div class="courses-inner mg-t-30">
                          <div class="courses-title">
                              <a href="#"><img src="../images/events/<?=$event->getphoto();?>" alt=""></a>
                              <h2 class="text"><?=$event->gettitle();?></h2>
                          </div>
                          <div class="courses-alaltic">
                              <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-bookmark"></i></span> <?=$event->getid();?></span>
                              <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-eye-slash"></i></span> <?=ucfirst($event->getactive());?></span>
                              <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-dollar"></i></span> <?=$event->getprix();?></span>
                          </div>
                          <div class="course-des">
                              <p><span><i class="fa fa-clock"></i></span> <b>Date : </b><?=$event->getdate_event();?></p>
                              <p><span><i class="fa fa-clock"></i></span> <b>Students : </b> <?=$webmaster->sqlcount("cgc_inscription","id","event_id",$event->getid());?></p>
                          </div>
                          <div class="product-buttons">
                              <a href="cgc-events.php?act=edit&id=<?=$event->getid();?>"><button type="button" class="button-default cart-btn">Read More</button></a>
                              <button  type="submit" id="name" title="Delete" class="pull-right" data-original-title="Trash" onclick="deleteevent('event',<?=$event->getid();?>);"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                          </div>
                      </div>
                  </div>
                  <?php
                  }
                   ?>
            </div>
        </div>
        <!-- Static Table End -->
      <?php } ?>
        </div>
      </div>
  </div>
<script>
function deleteevent(item, id) {
$.ajax({
  method: "POST",
  url: "cgc-delete.php",
  data: { item: item, id: id }
})
  .done(function() {
    $('#msg').html('<div class="alert alert-success alert-success-style1 alert-success-stylenone"><button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close"><span class="icon-sc-cl" aria-hidden="true">&times;</span></button><i class="fa fa-check edu-checked-pro admin-check-sucess admin-check-pro-none" aria-hidden="true"></i><p class="message-alert-none"><strong> Success ! </strong>item '+id+' Deleted Successfully</p></div>');
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
