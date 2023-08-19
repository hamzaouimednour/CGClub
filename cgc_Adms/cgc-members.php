<?php
require "header.php";
$members = $webmaster->view_members();
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
                                  <a href="index.php"><img class="main-logo" src="" alt="" /></a><br>
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
                                                      <li><span class="bread-blod">Members</span>
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
                  <!-- Static Table Start -->
<?php
if($_GET['act'] == 'edit'){
  $member = $webmaster->view_members($dance->sqli($crypt->decode($_GET['sid'])));
?>
<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
</div>
<div class="single-pro-review-area mt-t-30 mg-b-15 " >
            <div class="container-fluid">
<div class="row ">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <div class="sparkline12-list">
                            <div class="sparkline12-hd">
                                <div class="main-sparkline12-hd">
                                    <h1>Edit Member</h1>
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
                                                                <label class="login2 pull-right pull-right-pro">Nom - Prenom</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <div class="row">

                                                                    <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="form-select-list basic-ele-mg-t-10">
                                                                          <div class="input-group">
                                                                              <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                                                              <input type="text" name="nom" placeholder="Nom - Prenom" class="form-control" value="<?=$member[0]->getnom();?>">
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
                                                                <label class="login2 pull-right pull-right-pro">E-mail</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <div class="row">

                                                                    <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="form-select-list basic-ele-mg-t-10">
                                                                          <div class="input-group">
                                                                              <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                                                                              <input type="text" name="email" placeholder="E-mail" class="form-control" value="<?=$member[0]->getemail();?>">
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
                                                                <label class="login2 pull-right pull-right-pro">Phone</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <div class="row">

                                                                    <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="form-select-list basic-ele-mg-t-10">
                                                                          <div class="input-group">
                                                                              <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                                                              <input type="text" name="phone" placeholder="Phone" class="form-control" value="<?=$member[0]->gettel();?>">
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
                                                                <label class="login2 pull-right pull-right-pro">Filiére</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <div class="row">

                                                                    <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="form-select-list basic-ele-mg-t-10">
                                                                          <div class="input-group">
                                                                              <span class="input-group-addon"><i class="fa fa-graduation-cap" aria-hidden="true"></i></span>
                                                                              <input type="text" name="filiere" placeholder="Filiére" class="form-control" value="<?=$member[0]->getfiliere();?>">
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
?>
                  <div class="data-table-area mg-b-15">
                      <div class="container-fluid">
                          <div class="row">
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                  <div class="sparkline13-list">
                                      <div class="sparkline13-hd">
                                          <div class="main-sparkline13-hd">
                                              <h1>Members <span class="table-project-n">Data</span> Table</h1>
                                          </div>
                                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                          <div id="msg"></div>
                                          </div>
                                      </div>

                                      <div class="sparkline13-graph">
                                          <div class="datatable-dashv1-list custom-datatable-overright">
                                              <div id="toolbar">

                                              </div>
                                              <table data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-resizable="true" data-show-export="true"  data-toolbar="#toolbar">
                                                  <thead>
                                                      <tr>
                                                          <th data-field="state" data-checkbox="true"></th>
                                                          <th data-field="name" data-editable="true">Email</th>
                                                          <th data-field="email" data-editable="true">Nom - Prenom</th>
                                                          <th data-field="phone" data-editable="true">Phone</th>
                                                          <th data-field="price" data-editable="true">Filiére</th>
                                                          <th data-field="action">Action</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                    <?php foreach ($members as $member) {

                                                    ?>
                                                      <tr class="<?=$member->getemail();?>">
                                                          <td></td>
                                                          <td><?=$member->getemail();?></td>
                                                          <td><?=$member->getnom();?></td>
                                                          <td class="datatable-ct"><?=$member->gettel();?></td>
                                                          <td><?=$member->getfiliere();?></td>
                                                          <td>
                                                            <a href="cgc-members.php?act=edit&sid=<?=$crypt->encode($member->getemail());?>"><button class="pd-setting-ed" type="submit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                                            <button data-toggle="tooltip" class="pd-setting-ed" data-original-title="Trash" onclick="deletemember('member','<?=$member->getemail();?>')"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>
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
                  </div>
                  <!-- Static Table End -->
<?php } ?>
    </div>

      <script>

      function deletemember(item, email) {
      $.ajax({
        method: "POST",
        url: "cgc-delete.php",
        data: { item: item, email: email }
      })
        .done(function() {
          $('#msg').html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><strong>Success!</strong> <em>'+email+'</em> Deleted Successfully</p></div>');
setTimeout(function(){
          $("."+email).remove();
},250);
setTimeout(function(){
          $("#msg").empty();
},850);
setTimeout(function() {
    location.reload();
}, 1850);
        });
      }
</script>
<?php include "footer.php";?>
