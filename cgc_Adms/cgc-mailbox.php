<?php
// error_reporting(1);
ob_start();
require "header.php";
$act = $dance->xss($_GET['act']);
$id = $dance->clean($dance->sqli($_GET['id']));

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
                        <br><br><br>
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
                                            <li><span class="bread-blod">Inbox</span>
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
        <!--  -->

        <div class="mailbox-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3 col-md-3 col-sm-3 col-xs-12">

                        <div class="hpanel responsive-mg-b-30">
                            <div class="panel-body">
                              <a href="cgc-mailbox.php?act=compose" class="btn btn-success compose-btn btn-block m-b-md">Compose</a><br>
                                <ul class="mailbox-list">
                                  <?php
                                  if($act != "sent"){
                                   ?>
                                    <li class="active">
                                        <a href="cgc-mailbox.php">
                        <span class="pull-right"><?=$webmaster->count('cgc_contact','id');?></span>
                        <i class="fa fa-envelope"></i> Inbox
                      </a>
                                    </li>
                                    <li>
                                        <a href="cgc-mailbox.php?act=sent"><i class="fa fa-paper-plane"></i> Sent <span class="pull-right"><small>
                                        <?=$webmaster->sqlcount('cgc_contact','id','nom_prenom','Computer Geek Club');?></small></span></a>
                                    </li>
                                    <?php
                                  }else{
                                     ?>
                                     <li >
                                         <a href="cgc-mailbox.php">
                         <span class="pull-right"><small><?=$webmaster->count('cgc_contact','id');?></small></span>
                         <i class="fa fa-envelope"></i> Inbox
                       </a>
                                     </li>
                                     <li class="active">
                                         <a href="cgc-mailbox.php?act=sent"><i class="fa fa-paper-plane"></i> Sent <span class="pull-right">
                                         <?=$webmaster->sqlcount('cgc_contact','id','nom_prenom','Computer Geek Club');?></span></a>
                                     </li>
                                     <?php
                                   }
                                      ?>
                                    <li>
                                        <a href="#"><i class="fa fa-trash"></i> Trash</a>
                                    </li>
                                </ul>
                                <hr>
                                <ul class="mailbox-list">
                                    <li>
                                        <a href="#"><i class="fa fa-gears"></i> Settings</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-info-circle"></i> Support</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 col-md-9 col-sm-9 col-xs-12">
                      <div id="msg"></div>
                      <!--  -->
                      <!-- Send mail To specific member -->
                      <!--  -->
                      <?php
                      $save = $_GET['send'];
                      if(!empty($save) && $save =='success' ){
                        $alert->alert('success', 'Message has been sent successfully');
                      }
                      if(!empty($save) && $save !='success' ){
                        $alert->alert('error', 'Failed while sending the message !');
                      }
                      if($_GET['err'] == 'failed' ){
                        $alert->alert('error', 'Please choose only one receiver !');
                      }
                      if($_POST['replymsg']){
                        $to = array($_POST['email'] => $_POST['name'] );
                        $lang = $_POST['lang'];
                        $subj = $_POST['subject'];
                        $msg = $_POST['replymsg'];
                        $cgc = 'computergeekclub@cgc-escs.club';
                        $send =  $dance->mailer($to,$subj,$msg,$cgc,$cgc,$lang); //mailer(array $to, $subject, $msg, $sender, $replyto,$lang)
                        if($send['type']=='error'){
                          if($_GET['sent']==1){
                          $dance->redirect($_SERVER['PHP_SELF'].'?act=view&sent=1&id='.$id.'&send=failed');
                          exit;
                        }else {
                          $dance->redirect($_SERVER['PHP_SELF'].'?act=view&id='.$id.'&send=failed');
                          exit;
                        }
                      }else{
                        $webmaster->resetai('cgc_contact');
                        $date = new datetime;
                        $contact_data = array('nom_prenom' =>'Computer Geek Club' ,
                        'sender_email' => $_POST['email'] ,
                        'sujet' => $subj ,
                        'msg' => $msg ,
                        'date_msg' => $date->format('Y-m-d H:i:s') ,
                        'send_ip' => $dance->ip() );
                        $objcontact = new ContactCgc();
                        $objcontact->contactItem($contact_data);
                        $webmaster->add_contact($objcontact);
                        if($_GET['sent']==1){
                          $dance->redirect($_SERVER['PHP_SELF'].'?act=view&sent=1&id='.$id.'&send=success');
                          exit;
                        }else {
                          $dance->redirect($_SERVER['PHP_SELF'].'?act=view&id='.$id.'&send=success');
                          exit;
                        }
                      }
                      }









                      if($_POST['contentmsg']) {
                        if((empty($_POST['massmail']) and !empty($_POST['choosemail']))  or ($_POST['massmail'] == 1 and empty($_POST['choosemail']))){
                        $subj = $_POST['subject'];
                        $msg = $_POST['contentmsg'];
                        $lang = $_POST['lang'];
                        $cgc = 'computergeekclub@cgc-escs.club';
                        if($_POST['massmail'] != 1){
                        $to = $_POST['choosemail']; //$arrayName = array('' => , );
                        $recip = array();
                        foreach($to as $email){
                          $memb = explode( ',',$email );
                          $recip[$memb[1]] =  $memb[0];
                        }

                        $send =  $dance->mailer($recip,$subj,$msg,$cgc,$cgc,$lang); //mailer(array $to, $subject, $msg, $sender, $replyto,$lang)
                        if($send['type']=='error'){
                          $dance->redirect($_SERVER['PHP_SELF'].'?act=compose&send=failed');
                          exit;
                        }else{
                        $webmaster->resetai('cgc_contact');
                        $date = new datetime;
                        $contact_data = array('nom_prenom' =>'Computer Geek Club' ,
                        'sender_email' => implode(",",  array_keys($recip)) ,
                        'sujet' => $subj ,
                        'msg' => $msg ,
                        'date_msg' => $date->format('Y-m-d H:i:s') ,
                        'send_ip' => $dance->ip() );
                        $objcontact = new ContactCgc();
                        $objcontact->contactItem($contact_data);
                        $webmaster->add_contact($objcontact);
                        $dance->redirect($_SERVER['PHP_SELF'].'?act=sent&send=success');
                        exit;
                          }
                        }
                        if($_POST['massmail'] == 1){
                        $to = $webmaster->view_members();
                        $recip = array();
                        foreach($to as $memb){
                          $recip[$memb->getemail()] =  $memb->getnom();
                        }

                        $send =  $dance->mailer($recip,$subj,$msg,$cgc,$cgc,$lang); //mailer(array $to, $subject, $msg, $sender, $replyto,$lang)
                        if($send['type']=='error'){
                          $dance->redirect($_SERVER['PHP_SELF'].'?act=compose&send=failed');
                          exit;
                        }else{
                        $webmaster->resetai('cgc_contact');
                        $date = new datetime;
                        $contact_data = array('nom_prenom' =>'Computer Geek Club' ,
                        'sender_email' => implode(",",  array_keys($recip)) ,
                        'sujet' => $subj ,
                        'msg' => $msg ,
                        'date_msg' => $date->format('Y-m-d H:i:s') ,
                        'send_ip' => $dance->ip() );
                        $objcontact = new ContactCgc();
                        $objcontact->contactItem($contact_data);
                        $webmaster->add_contact($objcontact);
                        $dance->redirect($_SERVER['PHP_SELF'].'?act=sent&send=success');
                        exit;
                          }
                        }
                      }else {
                        $dance->redirect($_SERVER['PHP_SELF'].'?act=compose&err=failed');
                        exit;
                      }
                    }
                       ?>
                      <?php if($act=="compose"){ ?>
                        <div class="hpanel email-compose">
                            <div class="panel-heading hbuilt">
                                <div class="p-xs h4">
                                    New message
                                </div>
                            </div>
                            <div class="panel-heading hbuilt">
                                <div class="p-xs">
                                    <form method="post" class="form-horizontal">
                                      <div class="form-group">
                                      <small class="text-info"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Choose only one : single/mass mail !</small>
                                      </div>
                                        <div class="form-group">
                                            <label class="col-lg-1 control-label text-left">To:</label>
                                            <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">
                                                <div class="chosen-select-single">
                                                    <select data-placeholder="Choose e-mail..." class="chosen-select" multiple="" name="choosemail[]" id="choosemail" >
                                                      <?php
                                                      $mails = $webmaster->view_members();
                                                      foreach ($mails as $member){ ?>
                                                      <option value="<?php echo $member->getnom().",".$member->getemail();?>"><?php echo $member->getnom()." : ".$member->getemail();?></option>
                                                    <?php } ?></select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                          <label class="col-lg-3 control-label text-left">Or To All Members :</label>
                                            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                                              <div class="bt-df-checkbox">
                                                <input class="pull-left" name="massmail" type="checkbox" id="massmail" value="1">
                                              </div>
                                            </div>
                                        </div><hr>
                                        <div class="form-group">
                                            <label class="col-lg-1 control-label text-left">Subject:</label>
                                            <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">
                                                <input type="text" class="form-control input-sm" placeholder="Subject" name="subject">
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="panel-body no-padding">
                              <textarea class="summernote6" id="summernote" name="contentmsg" rows="">
</textarea>
<div class="i-checks pull-left">
    <label><input type="radio" value="fr" name="lang" required> <i></i> French </label>
    <label><input type="radio" value="en" name="lang" required> <i></i> English </label>
</div>
                            </div>
                            <div class="panel-footer">
                                <div class="pull-right">
                                    <div class="btn-group active-hook">
                                        <button class="btn btn-default"><i class="fa fa-edit"></i> Save</button>
                                        <button class="btn btn-default"><i class="fa fa-trash"></i> Discard</button>
                                    </div>
                                </div>
                                <button class="btn btn-primary ft-compse" type="submit" name="sendmail">Send email</button>
                            </div>
                          </form>

                        </div>
                      <?php }elseif ($act=="sent"){ ?>
                        <div class="hpanel">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6 col-md-6 col-sm-6 col-xs-8">
                                        <div class="btn-group ib-btn-gp active-hook mail-btn-sd mg-b-15">
                                          <button id="delete" name="delete" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                                            <a href=""><button  class="btn btn-default btn-sm"><i class="fa fa-refresh"></i> Refresh</button></a>

                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive ib-tb">
                                    <table class="table table-hover table-mailbox">
                                        <tbody>
                                          <?php
                                          $msgs = $webmaster->view_contact();
                                          foreach ($msgs as $msg) {
                                            if($msg->getnom_prenom()=="Computer Geek Club"){
                                           ?>
                                            <tr id="<?=$msg->getid();?>">
                                                <td class="">
                                                    <!-- <div class="checkbox checkbox-single checkbox-success"> -->
                                                        <input type="checkbox" name="selector[]" value="<?=$msg->getid();?>">
                                                        <label></label>
                                                    <!-- </div> -->
                                                </td>
                                                <td ><a class="textsender" href="cgc-mailbox.php?act=view&sent=1&id=<?=$msg->getid();?>">&nbsp;<strong> <?=$dance->xss($msg->getnom_prenom());?> </strong></a></td>
                                                <td><a class="textmail" href="cgc-mailbox.php?act=view&sent=1&id=<?=$msg->getid();?>"> <?=$dance->xss($msg->getsujet());?></a></td>
                                                <td></td>
                                                <td class="text-right mail-date"><span class="textdate"><?=$msg->getdate_msg();?></span></td>
                                            </tr>
                                          <?php }
                                             } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                     <?php }elseif ($act=="view"){
                       $msg = $webmaster->view_contact($id);
                       ?>
                       <div class="hpanel email-compose mailbox-view">
                           <div class="panel-heading hbuilt">

                               <div class="p-xs h4">
                                   <small class="pull-right view-hd-ml">
                     <?=$msg[0]->getdate_msg();?>
                   </small> Read <i class="fa fa-envelope" aria-hidden="true"> °</i> <?=$msg[0]->getid();?>

                               </div>
                           </div>
                           <div class="border-top border-left border-right bg-light">
                               <div class="p-m custom-address-mailbox">

                                   <div>
                                       <span class="font-extra-bold"><i class="fa fa-list-alt" aria-hidden="true"></i> <strong>Subject : </strong></span> <?=$dance->xss($msg[0]->getsujet());?>
                                   </div>
                                   <div>

                                       <?php
                                       if($_GET['sent'] == 1){
                                         echo '<span class="font-extra-bold"><i class="fa fa-paper-plane-o" aria-hidden="true"></i><strong> From :</strong></span>
                                         <a href="#">Computer Geek Club</a>
                                         <span class="font-extra-bold"><strong> To :</strong></span>
                                         <a href="#">'.$dance->xss($msg[0]->getsender_email()).'</a>';
                                       }else {
                                         echo ' <span class="font-extra-bold"><i class="fa fa-paper-plane-o" aria-hidden="true"></i><strong> From :</strong></span>
                                          <a href="#">'.$dance->xss($msg[0]->getsender_email()).'</a>';
                                       } ?>
                                   </div>
                                   <div>
                                       <span class="font-extra-bold"><i class="fa fa-user" aria-hidden="true"></i> <strong>Nom : </strong></span> <?=$dance->xss($msg[0]->getnom_prenom());?>
                                   </div>
                               </div>
                           </div>
                           <div class="panel-body panel-csm">
                               <div><i class="fa fa-quote-left" aria-hidden="true"></i>
                                   <p>
                                     <?=strip_tags($msg[0]->getmsg(),'<p><br>');?>
                                   </p>
                               <i class="fa fa-quote-right" aria-hidden="true"></i></div>
                           </div>
                           <div class="panel-footer ft-pn">

                             <form method="post" >
                               <div class="input-group">
                                  <span class="input-group-addon" title="Subject"><i class="fa fa-list-alt" aria-hidden="true" ></i></span>
                                  <input placeholder="Subject" name="subject" class="form-control" type="text" value="<?=$dance->xss($msg[0]->getsujet());?>" required>
                                </div>
                               <small class="text-danger"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Don't write the Greeting ex : 'Dear/Bonjour,'</small>
                               <textarea class="input-block-level" id="summernote1" name="replymsg" required></textarea>
                               <div class="row">
                                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                  <div class="i-checks pull-left">
                                      <label><input type="radio" value="fr" name="lang" required> <i></i> French </label>
                                      <label><input type="radio" value="en" name="lang" required> <i></i> English </label>
                                  </div>
                                </div>
                              </div>
                               <input type="hidden" name="email" value="<?=strtolower($dance->xss($msg[0]->getsender_email()));?>"/>
                               <input type="hidden" name="name" value="<?=strtolower($dance->xss($msg[0]->getnom_prenom()));?>"/>
                               <div class="btn-group active-hook">
                                   <button class="btn btn-default" type="submit" name="reply"><i class="fa fa-reply"></i> Reply</button>
                                   <button class="btn btn-default" onclick="window.history.go(-1); return false;"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i> Cancel</button>
                                   <button class="btn btn-default" onclick="delredirection(<?=$msg[0]->getid();?>)"><i class="fa fa-trash-o"></i> Remove</button>
                               </div>
                               </form>
                           </div>
                       </div>
                     <?php }else { ?>
                       <!-- Start View All msg -->
                         <div class="hpanel">
                             <div class="panel-body">
                                 <div class="row">
                                     <div class="col-md-6 col-md-6 col-sm-6 col-xs-8">
                                         <div class="btn-group ib-btn-gp active-hook mail-btn-sd mg-b-15">
                                           <button id="delete" name="delete" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                                             <a href=""><button  class="btn btn-default btn-sm"><i class="fa fa-refresh"></i> Refresh</button></a>

                                         </div>
                                     </div>
                                 </div>
                                 <div class="table-responsive ib-tb">
                                     <table class="table table-hover table-mailbox">
                                         <tbody>
                                           <?php
                                           $msgs = $webmaster->view_contact();
                                           foreach ($msgs as $msg) {
                                             if($msg->getnom_prenom()!="Computer Geek Club"){
                                            ?>
                                             <tr id="<?=$msg->getid();?>">
                                                 <td class="">
                                                     <!-- <div class="checkbox checkbox-single checkbox-success"> -->
                                                         <input type="checkbox" name="selector[]" value="<?=$msg->getid();?>">
                                                         <label></label>
                                                     <!-- </div> -->
                                                 </td>
                                                 <td ><a class="textsender" href="cgc-mailbox.php?act=view&id=<?=$msg->getid();?>">&nbsp;<strong> <?=$dance->xss($msg->getnom_prenom());?> </strong></a></td>
                                                 <td><a class="textmail" href="cgc-mailbox.php?act=view&id=<?=$msg->getid();?>"> <?=$dance->xss($msg->getsujet());?></a></td>
                                                 <td></td>
                                                 <td class="text-right mail-date"><span class="textdate"><?=$msg->getdate_msg();?></span></td>
                                             </tr>
                                           <?php }
                                              } ?>
                                         </tbody>
                                     </table>
                                 </div>
                             </div>
                         </div>
                         <!-- View All msg -->
                     <?php } ?>

                    </div>
                </div>
            </div>
        </div>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
        $(document).ready(function(){
          $('#delete').click(function(){
      var val = [];
      $(':checkbox:checked').each(function(i){
        val[i] = $(this).val();
        deletemsg('msg',val[i]);
      });
    });
});
    function delredirection(id){
    deletemsg('msg',id);
    setTimeout(function() {
            location.replace('cgc-mailbox.php');
    }, 1500);

    }
        function deletemsg(item, id) {
        $.ajax({
          method: "POST",
          url: "cgc-delete.php",
          data: { item: item, id: id }
        })
          .done(function() {
            $('#msg').html('<div class="alert alert-success alert-success-style1 alert-success-stylenone"><button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close"><span class="icon-sc-cl" aria-hidden="true">&times;</span></button><i class="fa fa-check edu-checked-pro admin-check-sucess admin-check-pro-none" aria-hidden="true"></i><p class="message-alert-none"><strong> Success ! </strong>Message <em>'+id+'</em> Deleted Successfully</p></div>');
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
