<?php
ob_start();
require "header.php";
?>

<body>
	<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center m-b-md custom-login">
				<h3>LOGIN TO CGC DASHBOARD</h3>
				<p>{ Learn To Create }</p>
			</div>
			<?php
			if($_POST){
				$user = $dance->sqli($dance->clean($_POST['email']));
				$pwd = $crypt->encode($dance->encrypt($dance->sqli($_POST['pwd'])));
				if($webmaster->check_login($user,$pwd)){
					session_start();
					$_SESSION['user'] = $crypt->encode($user);
					$date = new datetime;
					$adm_data = array(
					'email' => $user,
					'last_log'=>$date->format('Y-m-d H:i:s') ,
					'log_ip'=>$dance->ip());
					$objadm = new AdminCgc();
					$objadm->adminItem($adm_data);
					$webmaster->update_logadmin($objadm);
					$dance->redirect('index.php');
					exit;
				}else {
					$alert->alert('error', 'Username / Password Incorrect !');
				}
			}
			 ?>
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
											<?php
											if(!empty($_SESSION['user'])){
												$adm = $webmaster->view_admin($crypt->decode($_SESSION['user']));
											?>
											                        <div class="single-cards-item">
											                            <div class="single-product-image">
											                                <img src="img/limit.gif" alt="">
											                            </div>
											                            <div class="single-product-text">
											                                <img src="img/02.jpg" alt="">
											                                <h4><?=$adm[0]->getnom()?></h4>
											                                <h4 class="text-primary"><?php
																											if($adm[0]->getlevel()==0){
																												echo "Super Admin";
																											}else {
																												echo "Editeur";
																											}

																											?></h4>
											                                <a class="follow-cards" href="index.php"><i class="fa fa-share"></i> Dashboard</a>
																											<a class="follow-cards"  href="cgc-logout.php"><i class="fa fa-lock" aria-hidden="true"></i> Logout</a>
											                            </div>
											                        </div>
											<?php
											}else {
											 ?>
                        <form method="post" id="loginForm">
                            <div class="form-group">
                                <label class="control-label" for="username">Username</label>
                                <input type="email" placeholder="example@gmail.com" required="" value="" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="pwd" id="password" class="form-control">
                            </div>
                            <div class="checkbox login-checkbox">
                            </div>
                            <button class="btn btn-success btn-block loginbtn" type="submit">Login</button>
                        </form>
												<?php
												}
												 ?>
                    </div>
                </div>
			</div>
			<div class="text-center login-footer">
				<p>Copyright © 2018. Coded by BX19</p>
			</div>
		</div>
    </div>
		<?php include "footer.php"; ob_end_flush(); ?>
