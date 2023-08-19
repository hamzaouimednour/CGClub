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
                                            <li><span class="bread-blod">News</span>
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
                            $alert->alert('success', 'Your News added successfully');
                          }
                          if(!empty($save) && $save !='success' ){
                            $alert->alert('error', $dance->xss($GLOBALS[$save]));
                          }
                          if($_POST){
                            if(empty($_FILES['main']['name']) or empty($_FILES['cover']['name'])){
                              $dance->redirect($_SERVER['PHP_SELF'].'?act=add&save=err0');
                              exit;
                            }else{
                            $webmaster->resetai('cgc_news');
                            $photo_main = $_FILES['main'];
                            $photo_cover = $_FILES['cover'];
                            $phname = md5(time().uniqid(rand()));
                            $objfile = new Upload($photo_main);
                            $objfile->typesValides(array('image/jpg','image/jpeg','image/png','image/gif'));
                            $objfile->extValides(array('jpg','jpeg','png','gif'));
                            $objfile->changeName($phname);

                            $objfile2 = new Upload($photo_cover);
                            $objfile2->typesValides(array('image/jpg','image/jpeg','image/png','image/gif'));
                            $objfile2->extValides(array('jpg','jpeg','png','gif'));
                            $objfile2->changeName($phname);

                            $active = (empty($_POST['active'])) ? 'off' : 'on';
                            $news_data = array(
                            'title'=>$dance->sqli($_POST['title']),
                            'date_news'=>$dance->sqli($_POST['date_news']),
                            'description'=>trim($_POST['description']),
                            'tags'=>$dance->sqli($_POST['tags']),
                            'photo'=>$dance->sqli($objfile->nom),
                            'photo2'=>$dance->sqli($objfile2->nom),
                            'active'=> $active );

                            $objnews = new NewsCgc();
                            $objnews->newsItem($news_data);
                            if(!$objfile->uploadfichier('../images/news/main/',10*MB,1,270,240 )){
                              $dance->redirect($_SERVER['PHP_SELF'].'?act=add&save='.$objfile->error);
                            }
                            if(!$objfile2->uploadfichier('../images/news/cover/',10*MB,1,1170,400 )){
                              $dance->redirect($_SERVER['PHP_SELF'].'?act=add&save='.$objfile2->error);
                            }
                            if($webmaster->add_news($objnews)){
                              $dance->redirect($_SERVER['PHP_SELF'].'?act=add&save=success');
                            }else{
                              unlink('../images/news/main/'.$objfile->nom);
                              unlink('../images/news/cover/'.$objfile2->nom);
                              $dance->redirect($_SERVER['PHP_SELF'].'?act=add&save=error');
                            }
                           }
                          }

                          ?>
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">News Details</a></li>
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
                                                                    <input name="title" type="text" class="form-control" placeholder="News Title" required>
                                                                </div>

                                                                <div class="form-group">
                                                                      <div class="file-upload-inner ts-forms">
                                                                          <div class="input prepend-big-btn">
                                                                              <label class="icon-right" for="prepend-big-btn">
                                                                                <i class="fa fa-upload"></i>
                                                                              </label>
                                                                              <div class="file-button">
                                                                                  Browse
                                                                                  <input type="file" onchange="document.getElementById('prepend-big-btn-main').value = this.value;" name="main" required>
                                                                              </div>
                                                                              <input type="text" id="prepend-big-btn-main" readonly="" placeholder="main picture size (270x240)*" disabled="">
                                                                          </div>
                                                                      </div>
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
                                                                <!-- <div class="form-group">
                                                                <div class="checkbox-setting-pro">
                                                                    <div class="checkbox-title-pro">
                                                                      <small>Activate <i class="glyphicon glyphicon-eye-close"></i></small><div class="onoffswitch">
                                                                          <input type="checkbox" name="active" class="onoffswitch-checkbox" id="example" checked>
                                                                          <label class="onoffswitch-label" for="example">
                                                                            <span class="onoffswitch-inner"></span>
                                                                            <span class="onoffswitch-switch"></span>
                                                                          </label>
                                                                      </div>

                                                                    </div>
                                                                </div>
                                                            </div> -->
                                                          </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                              <div class="form-group">
                                                                  <input name="date_news" id="finish" type="text" class="form-control" placeholder="News Date" value="<?=date('d.m.Y')?>" required>
                                                              </div>
                                                              <div class="form-group">
                                                                    <div class="file-upload-inner ts-forms">
                                                                        <div class="input prepend-big-btn">
                                                                            <label class="icon-right" for="prepend-big-btn">
                                                                              <i class="fa fa-upload"></i>
                                                                            </label>
                                                                            <div class="file-button">
                                                                                Browse
                                                                                <input type="file" onchange="document.getElementById('prepend-big-btn').value = this.value;" name="cover" required>
                                                                            </div>
                                                                            <input type="text" id="prepend-big-btn" readonly="" placeholder="cover picture size (1170x400)*" disabled="">
                                                                        </div>
                                                                    </div>
                                                              </div>
                                                              <div class="form-group">
                                                                  <label>Tags <i class="glyphicon glyphicon-ok"></i> : </label>&nbsp;&nbsp;&nbsp;<input name="tags" class="form-control" type="text" placeholder="tag1, tag2, ..." data-role="tagsinput" />
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
        $id = $dance->clean($dance->sqli($_GET['id']));
        $news = $webmaster->view_news($id);
?>

<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="product-payment-inner-st">
                  <?php
                  $save = $_GET['save'];
                  if(!empty($save) && $save =='success' ){
                    $alert->alert('success', 'Your News updated successfully');
                  }
                  if(!empty($save) && $save !='success' ){
                    $alert->alert('error', $dance->xss($GLOBALS[$save]));
                  }
                  if($_POST){
                    $photo_main = $_FILES['main'];
                    $photo_cover = $_FILES['cover'];
                    $phname = md5(time().uniqid(rand()));

                    if(!empty($photo_main['name'])){
                        $objfile = new Upload($photo_main);
                        $objfile->typesValides(array('image/jpg','image/jpeg','image/png','image/gif'));
                        $objfile->extValides(array('jpg','jpeg','png','gif'));
                        $objfile->changeName($phname);
                    }
                    if(!empty($photo_cover['name'])){
                        $objfile2 = new Upload($photo_cover);
                        $objfile2->typesValides(array('image/jpg','image/jpeg','image/png','image/gif'));
                        $objfile2->extValides(array('jpg','jpeg','png','gif'));
                        $objfile2->changeName($phname);
                    }
                    $active = (empty($_POST['active'])) ? 'off' : 'on';
                    $news_data = array(
                    'id'=>$dance->sqli($id),
                    'title'=>$dance->sqli($_POST['title']),
                    'date_news'=>$dance->sqli($_POST['date_news']),
                    'description'=>trim($_POST['description']),
                    'tags'=>$dance->sqli($_POST['tags']),
                    'photo'=>$objfile->nom,
                    'photo2'=>$objfile2->nom,
                    'active'=> $active );

                    $objnews = new NewsCgc();
                    $objnews->newsItem($news_data);
                    if(!empty($photo_main['name']) and !empty($photo_cover['name'])){
                      if(!$objfile->uploadfichier('../images/news/main/',10*MB,1,270,240 )){
                        $dance->redirect($_SERVER['PHP_SELF'].'?act=edit&id='.$id.'&save='.$objfile->error);
                      }
                     if(!$objfile2->uploadfichier('../images/news/cover/',10*MB,1,1170,400 )){
                        $dance->redirect($_SERVER['PHP_SELF'].'?act=edit&id='.$id.'&save='.$objfile2->error);
                      }
                      if($webmaster->update_news($objnews)){
                        unlink('../images/news/main/'.$news[0]->getphoto());
                        unlink('../images/news/cover/'.$news[0]->getphoto2());
                        $dance->redirect($_SERVER['PHP_SELF'].'?act=edit&id='.$id.'&save=success');
                      }else{
                          unlink('../images/news/main/'.$objfile->nom);
                          unlink('../images/news/cover/'.$objfile2->nom);
                        $dance->redirect($_SERVER['PHP_SELF'].'?act=edit&id='.$id.'&save=error');
                      }
                  }elseif(!empty($photo_main['name']) and empty($photo_cover['name'])){
                      if(!$objfile->uploadfichier('../images/news/main/',10*MB,1,270,230 )){
                        $dance->redirect($_SERVER['PHP_SELF'].'?act=edit&id='.$id.'&save='.$objfile->error);
                      }
                      if($webmaster->update_news($objnews)){
                        unlink('../images/news/main/'.$news[0]->getphoto());
                        $dance->redirect($_SERVER['PHP_SELF'].'?act=edit&id='.$id.'&save=success');
                      }else{
                          unlink('../images/news/main/'.$objfile->nom);
                          unlink('../images/news/cover/'.$objfile2->nom);
                        $dance->redirect($_SERVER['PHP_SELF'].'?act=edit&id='.$id.'&save=error');
                      }
                  }elseif(empty($photo_main['name']) and !empty($photo_cover['name'])){
                      if(!$objfile2->uploadfichier('../images/news/cover/',10*MB,1,1000,420 )){
                        $dance->redirect($_SERVER['PHP_SELF'].'?act=edit&id='.$id.'&save='.$objfile->error);
                      }
                      if($webmaster->update_news($objnews)){
                        unlink('../images/news/cover/'.$news[0]->getphoto2());
                        $dance->redirect($_SERVER['PHP_SELF'].'?act=edit&id='.$id.'&save=success');
                      }else{
                          unlink('../images/news/main/'.$objfile->nom);
                          unlink('../images/news/cover/'.$objfile2->nom);
                        $dance->redirect($_SERVER['PHP_SELF'].'?act=edit&id='.$id.'&save=error');
                      }
                  }else {
                    if($webmaster->update_news($objnews)){
                      $dance->redirect($_SERVER['PHP_SELF'].'?act=edit&id='.$id.'&save=success');
                    }else{
                      $dance->redirect($_SERVER['PHP_SELF'].'?act=edit&id='.$id.'&save=error');
                    }
                  }
                  }

                  ?>
                    <ul id="myTabedu1" class="tab-review-design">
                        <li class="active"><a href="#description">News Details</a> </li>
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
                                                            <input name="title" type="text" class="form-control" placeholder="News Title" value="<?=stripslashes($news[0]->gettitle());?>">
                                                        </div>

                                                        <div class="form-group">
                                                              <div class="file-upload-inner ts-forms">
                                                                  <div class="input prepend-big-btn">
                                                                      <label class="icon-right" for="prepend-big-btn">
                                                                        <i class="fa fa-upload"></i>
                                                                      </label>
                                                                      <div class="file-button">
                                                                          Browse
                                                                          <input type="file" onchange="document.getElementById('prepend-big-btn-main').value = this.value;" name="main">
                                                                      </div>
                                                                      <input type="text" id="prepend-big-btn-main" readonly="" placeholder="main picture size (270x240)*"  disabled required>
                                                                  </div>
                                                              </div>
                                                        </div>
                                                        <div class="form-group">
                                                          <img class="img-thumbnail" src="../images/news/main/<?=$news[0]->getphoto();?>" width="266"/>
                                                      </div>
                                                        <div class="form-group">
                                                          <div id="Settings" class="tab-pane fade active in"><div class="checkbox-setting-pro">
                                                                        <div class="checkbox-title-pro">
                                                                            <h2 class="text-info"><strong> Enabled <i class="glyphicon glyphicon-eye-close"></i> : </strong></h2>
                                                                            <div class="ts-custom-check">
                                                                                <div class="onoffswitch">
                                                                                    <?php
                                                                                    if($news[0]->getactive()=="on"){
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
                                                            <input name="date_news" id="finish" type="text" class="form-control" placeholder="News Date" value="<?=$news[0]->getdate_news();?>">
                                                        </div>
                                                        <div class="form-group">
                                                              <div class="file-upload-inner ts-forms">
                                                                  <div class="input prepend-big-btn">
                                                                      <label class="icon-right" for="prepend-big-btn">
                                                                        <i class="fa fa-upload"></i>
                                                                      </label>
                                                                      <div class="file-button">
                                                                          Browse
                                                                          <input type="file" onchange="document.getElementById('prepend-big-btn').value = this.value;" name ="cover">
                                                                      </div>
                                                                      <input type="text" id="prepend-big-btn" readonly="" placeholder="cover picture size (1170x400)*"  disabled required>
                                                                  </div>
                                                              </div>
                                                        </div>
                                                      <div class="form-group">
                                                        <img class="img-thumbnail" src="../images/news/cover/<?=$news[0]->getphoto2();?>" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tags <i class="glyphicon glyphicon-ok"></i> : </label>&nbsp;&nbsp;&nbsp;<input name="tags" class="form-control" type="text" placeholder="tag1, tag2, ..." data-role="tagsinput"  value="<?=stripslashes($news[0]->gettags());?>"/>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <textarea name="description" id="summernote4" placeholder="Description"><?=stripslashes($news[0]->getdescription());?></textarea>
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
        $news = $webmaster->view_news();
         ?>
        <!-- Static Table Start -->
        <div class="courses-area">
            <div class="container-fluid">
              <div id="msg"></div>
                <div class="row">
                  <?php
                  foreach ($news as $new) {

                   ?>
                  <div id="<?=$new->getid();?>" class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                      <div class="courses-inner mg-t-30">
                          <div class="courses-title">
                              <a href="#"><img src="../images/news/cover/<?=$new->getphoto2();?>" alt="" ></a>
                              <h2 class="text"><?=stripslashes($new->gettitle());?></h2>
                          </div>
                          <div class="courses-alaltic">
                              <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-bookmark"></i></span> <?=$new->getid();?></span>
                              <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-eye-slash"></i></span> <?=strtoupper($new->getactive());?></span>
                          </div>
                          <div class="course-des">
                              <p><span><i class="fa fa-clock"></i></span> <b>Date : </b><?=$new->getdate_news();?></p>
                          </div>
                          <div class="product-buttons">
                              <a href="cgc-news.php?act=edit&id=<?=$new->getid();?>"><button type="button" class="button-default cart-btn">Read More</button></a>
                              <button  type="submit" id="name" title="Delete" class="pull-right" data-original-title="Trash" onclick="deletenews('news',<?=$new->getid();?>);"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
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
function deletenews(item, id) {
$.ajax({
  method: "POST",
  url: "cgc-delete.php",
  data: { item: item, id: id }
})
  .done(function() {
    $('#msg').html('<div class="alert alert-success alert-success-style1 alert-success-stylenone"><button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close"><span class="icon-sc-cl" aria-hidden="true">&times;</span></button><i class="fa fa-check edu-checked-pro admin-check-sucess admin-check-pro-none" aria-hidden="true"></i><p class="message-alert-none"><strong> Success ! </strong>News '+id+' Deleted Successfully</p></div>');
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
