<?php
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
                                            <li><span class="bread-blod">Admin Users</span>
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
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <?php
                    $save = $_GET['save'];
                    if(!empty($save) && $save =='success' ){
                      $alert->alert('success', 'Admin Add successfully');
                    }
                    if(!empty($save) && $save !='success' ){
                      $alert->alert('error', $dance->xss($GLOBALS[$save]));
                    }
                    if($_POST){
                      if($_POST['pwd'] != $_POST['pwd2']){
                        $dance->redirect($_SERVER['PHP_SELF'].'?act=add&save=errpwd');
                        exit;
                      }else {
                      $adm_data = array(
                      'email'=>$dance->sqli($_POST['email']),
                      'nom'=>$dance->sqli($_POST['nom']),
                      'pwd'=>$crypt->encode($dance->encrypt($_POST['pwd'])),
                      'level'=>$_POST['level']);

                      $objadm = new AdminCgc();
                      $objadm->adminItem($adm_data);
                        if($webmaster->add_admin($objadm)){
                          $dance->redirect($_SERVER['PHP_SELF'].'?act=add&save=success');
                          exit;
                        }else{
                          $dance->redirect($_SERVER['PHP_SELF'].'?act=add&save=error');
                          exit;
                        }
                    }
                  }

                    ?>
                      <div class="sparkline9-list mg-t-30">
                          <div class="sparkline9-hd">
                              <div class="main-sparkline9-hd">
                                  <h1>Add User {Admin}</h1>
                              </div>
                          </div>
                          <div class="sparkline9-graph">
                              <div id="pwd-container4">
                                <form action="" class="needsclick form-validation" method="post" autocomplete="off">
                                  <div class="form-group">
                                      <label for="name">Name</label>
                                      <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                        <input name="nom" placeholder="Name" class="form-control" type="text" required>
                                     </div>
                                  </div>
                                  <div class="form-group">
                                      <label for="email">E-mail</label>
                                      <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                        <input name="email" placeholder="E-mail" class="form-control" type="email" required>
                                      </div>
                                  </div>
                                    <div class="form-group">
                                  <div class="sparkline12-graph">
                                      <div id="pwd-container1">
                                          <div class="form-group">
                                              <label for="password1">Password </label><small> (8-12 characters included Uppercase,numbers)</small>
                                              <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                              <input name="pwd" type="password" class="form-control example1" id="password1" placeholder="Password" required>
                                              <input name="pwd2" type="password" class="form-control" placeholder="Repeat Password" required>
                                          </div>
                                        </div>
                                          <div class="form-group mg-b-pass">
                                              <div class="pwstrength_viewport_progress"></div>
                                          </div>
                                      </div>
                                  </div>
                                </div>
                                  <div class="form-group">
                                    <label for="email">User Level</label>
                                <div class="form-select-list">
                                    <select class="form-control custom-select-value" name="level" required>
                                      <option value="0">Super Admin</option>
                                      <option value="1" selected >Editor</option>
                                    </select>
                                  </div>
                                </div>
                                <div align="center">
                                  <button type="reset" class="btn btn-custon-rounded-four btn-warning"><i class="fa fa-undo" aria-hidden="true"></i> Reset</button>
                                  <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="fa fa-floppy-o" aria-hidden="true"></i> Add user</button>
                                </div>
                              </form>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
            </div>
        </div>
        <?php
      }else if ($act == 'edit') {
        $id = $dance->sqli($crypt->decode($_GET['sid']));
        $adm = $webmaster->view_admin($id);
?>

<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
<div class="single-pro-review-area mt-t-30 mg-b-15">
    <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <?php
            $save = $_GET['save'];
            if(!empty($save) && $save =='success' ){
              $alert->alert('success', 'Admin Add successfully');
            }
            if(!empty($save) && $save !='success' ){
              $alert->alert('error', $dance->xss($GLOBALS[$save]));
            }
            if($_POST){
              $oldpwd = $webmaster->view_admin($_POST['email']);
              if($_POST['pwd'] != $_POST['pwd2']){
                $dance->redirect($_SERVER['PHP_SELF'].'?act=edit&sid='.$_GET['sid'].'&save=errpwd');
                exit;
              }elseif ($oldpwd[0]->getpwd() != $crypt->encode($dance->encrypt($_POST['oldpwd'])) or empty($oldpwd)) {
                $dance->redirect($_SERVER['PHP_SELF'].'?act=edit&sid='.$_GET['sid'].'&save=erropwd');
                exit;
              }else{
              $adm_data = array(
              'email'=>$dance->sqli($_POST['email']),
              'nom'=>$dance->sqli($_POST['nom']),
              'pwd'=>$crypt->encode($dance->encrypt($_POST['pwd'])),
              'level'=>$_POST['level']);

              $objadm = new AdminCgc();
              $objadm->adminItem($adm_data);
                if($webmaster->update_admin($objadm)){
                  $dance->redirect($_SERVER['PHP_SELF'].'?act=edit&sid='.$_GET['sid'].'&save=success');
                  exit;
                }else{
                  $dance->redirect($_SERVER['PHP_SELF'].'?act=edit&sid='.$_GET['sid'].'&save=error');
                  exit;
                }
            }
          }

            ?>
              <div class="sparkline9-list mg-t-30">
                  <div class="sparkline9-hd">
                      <div class="main-sparkline9-hd">
                          <h1>Edit User {Admin}</h1>
                      </div>
                  </div>
                  <div class="sparkline9-graph">
                      <div id="pwd-container4">
                        <form action="" class="needsclick form-validation" method="post" autocomplete="off">
                          <div class="form-group">
                              <label for="name">Name</label>
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                <input name="nom" placeholder="Name" class="form-control" type="text" value="<?=$adm[0]->getnom();?>" required>
                             </div>
                          </div>
                          <div class="form-group">
                              <label for="email">E-mail</label>
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input name="emaildisable" placeholder="E-mail" class="form-control" type="email" value="<?=$adm[0]->getemail();?>" disabled="" required>
                                <input name="email" type="hidden" value="<?=$adm[0]->getemail();?>">
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="email">Old Password</label>
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input name="oldpwd" placeholder="Old Password" class="form-control" type="password" required>
                              </div>
                          </div>
                            <div class="form-group">
                          <div class="sparkline12-graph">
                              <div id="pwd-container1">
                                  <div class="form-group">
                                      <label for="password1">New Password </label><small> (8-12 characters included Uppercase,numbers)</small>
                                      <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                      <input name="pwd" type="password" class="form-control example1" id="password1" placeholder="Password" required>
                                      <input name="pwd2" type="password" class="form-control" placeholder="Repeat Password" required>
                                  </div>
                                </div>
                                  <div class="form-group mg-b-pass">
                                      <div class="pwstrength_viewport_progress"></div>
                                  </div>
                              </div>
                          </div>
                        </div>
                          <div class="form-group">
                            <label for="email">User Level</label>
                        <div class="form-select-list">
                            <select class="form-control custom-select-value" name="level" required>
                              <?php
                              if($adm[0]->getlevel()==0)
                                echo "<option value=\"0\" selected >Super Admin</option>
                                <option value=\"1\" >Editor</option>";
                              else
                                echo "<option value=\"0\" >Super Admin</option>
                                <option value=\"1\" selected >Editor</option>";
                               ?>
                            </select>
                          </div>
                        </div>
                        <div align="center">
                          <button type="button" onclick="window.history.go(-1); return false;" class="btn btn-custon-rounded-four btn-warning"><i class="fa fa-undo" aria-hidden="true"></i> Cancel</button>
                          <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save Change</button>
                        </div>
                      </form>
                      </div>
                  </div>
              </div>
          </div>
        </div>
    </div>
</div>
<?php

    }else{
        $adms = $webmaster->view_admin();
         ?>
        <!-- Static Table Start -->
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12"></div>
        <div class="courses-area">
            <div class="container-fluid">

                <div class="row">
                  <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                    <div id="msg"></div>
                        <div class="sparkline8-list">
                            <div class="sparkline8-hd">
                                <div class="main-sparkline8-hd">
                                    <h1>Admin Users Table</h1>
                                </div>
                                <div class="product-buttons">
                              <a href="cgc-admin.php?act=add" class="pull-right"><button type="button" class="button-default cart-btn"><i class="fa fa-plus" aria-hidden="true"></i> Admin</button></a>
                          </div>
                            </div>
                            <div class="sparkline8-graph">
                                <div class="static-table-list">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>E-mail</th>
                                                <th>Admin Name</th>
                                                <th>Level</th>
                                                <th>Last Login</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                            foreach ($adms as $adm) {
                                            ?>
                                            <tr id="<?=$crypt->encode($adm->getemail());?>">
                                                 <td><?=$adm->getemail();?></td>
                                                 <td><?=$adm->getnom();?></td>
                                                 <?php
                                                 if($adm->getlevel()==1)
                                                  echo"<td>Editor</td>";
                                                 else
                                                   echo"<td>Super Admin</td>";

                                                if(empty($adm->getlast_log()))
                                                  echo"<td><small>Empty logs</small></td>";
                                                 else
                                                   echo"<td><small>".$adm->getlast_log()."</small></td>";
                                                 ?>
                                                 <td><a href="cgc-admin.php?act=edit&sid=<?=$crypt->encode($adm->getemail());?>"><button class="pd-setting-ed" type="submit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                                   <?php if($adm->getdel()=="yes"){ ?>
                                                 <button data-toggle="tooltip" class="pd-setting-ed" data-original-title="Trash" onclick="deleteadmin('admin','<?=$crypt->encode($adm->getemail());?>')"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>
                                               <?php } ?>
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

function deleteadmin(item, id) {
$.ajax({
  method: "POST",
  url: "cgc-delete.php",
  data: { item: item, id: id }
})
  .done(function() {
    $('#msg').html('<div class="alert alert-success alert-success-style1 alert-success-stylenone"><button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close"><span class="icon-sc-cl" aria-hidden="true">&times;</span></button><i class="fa fa-check edu-checked-pro admin-check-sucess admin-check-pro-none" aria-hidden="true"></i><p class="message-alert-none"><strong> Success ! </strong>Admin <em>'+id+'</em> Deleted Successfully</p></div>');
    setTimeout(function() {
        $("#"+id).fadeTo(50, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 250);
setTimeout(function() {
        $("#msg").empty();
}, 1500);
  });
}
</script>

<?php include "footer.php"; ob_end_flush(); ?>
