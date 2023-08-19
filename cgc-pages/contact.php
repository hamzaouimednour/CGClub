<?php
require "header.php";
?>
		<!--************************************
				Header End
		*************************************-->
		<!--************************************
				Inner Banner Start
		*************************************-->
		<div class="tg-innerbanner tg-haslayout tg-parallax tg-bginnerbanner" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/slider/img001.jpg">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="tg-innerbannercontent">
							<h1>Contactez nous</h1>
							<ol class="tg-breadcrumb">
								<li><a href="javascript:void(0);">Accueil</a></li>
								<li class="tg-active">Contactez nous</li>
							</ol>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--************************************
				Inner Banner End
		*************************************-->
		<!--************************************
				Main Start
		*************************************-->
		<main id="tg-main" class="tg-main tg-haslayout">
			<!--************************************
					Contact Us Start
			*************************************-->
			<div class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="tg-contactus">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="tg-sectionhead">
									<h2>Prenez contact avec nous</h2>
								</div>
							</div>

							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
								<div class="tg-locationmap tg-map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3278.8573550089563!2d10.706712050879622!3d34.73398978884597!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13002b56317b303b%3A0xa91709bccec71bf8!2sEcole+Superieure+de+Commerce+ESC+Sfax!5e0!3m2!1sfr!2stn!4v1543411764320" width="600" height="700" frameborder="0" style="border:0" allowfullscreen></iframe></div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <?php
                                $save = $_GET['envoie'];
                                if(!empty($save) && $save =='oui' ){
                                  $alert->alertbig('success', 'Votre message a été envoyé avec succès ');
                                }
                                if(!empty($save) && $save =='non' ){
                                  $alert->alertbig('error', $dance->xss($GLOBALS[$_GET['erreur']]));
                                }
                                if($_POST){
                                    $webmaster->resetai('cgc_contact');
                                    $contact_data = array(
                                    'nom_prenom'=> $dance->sqli(strip_tags($_POST['nom_prenom'])),
                                    'sender_email'=> $dance->sqli(strip_tags($_POST['email'])),
                                    'sujet'=> $dance->sqli(strip_tags($_POST['sujet'])),
                                    'msg'=> $dance->sqli(strip_tags($_POST['message'])),
                                    'date_msg'=> date('Y-m-d H:i:s'),
                                    'send_ip'=> $dance->ip() );
                                $objcontact = new ContactCgc();
                                $objcontact->contactItem($contact_data);
                                if($webmaster->add_contact($objcontact)){
                                  $dance->redirect('index.php?component=5&envoie=oui');
                                  exit;
                                }else{
                                  $dance->redirect('index.php?component=5&envoie=non&erreur=1');
                                  exit;
                                }
                            }
                                ?>
								<form class="tg-formtheme tg-formcontactus" method="post">
									<fieldset>
										<div class="form-group tg-hastextarea">
											<input type="text" name="nom_prenom" class="form-control" placeholder="Nom & Prénom" required>
										</div>
										<div class="form-group tg-hastextarea">
											<input type="email" name="email" class="form-control" placeholder="E-mail" required>
										</div>
										<div class="form-group tg-hastextarea">
											<input type="text" name="sujet" class="form-control" placeholder="Sujet" required>
										</div>
										<div class="form-group tg-hastextarea">
											<textarea name="message" placeholder="Votre message ..." required></textarea>
										</div>
										<div class="form-group">
											<button type="submit" class="tg-btn tg-active">Submit</button>
										</div>
									</fieldset>
								</form>
								<div class="tg-contactdetail">
									<div class="tg-sectionhead"></div>
									<ul class="tg-contactinfo">
										<li>
											<i class="icon-apartment"></i>
											<address>Route de l'aéroport km 4,5 - B.P. n° 1081 - 3018 ESCS Sfax</address>
										</li>
										<li>
											<i class="icon-envelope"></i>
											<span>
												<em><a href="mailto:computergeekclub@cgc-escs.club">computergeekclub@cgc-escs.club</a></em>
											</span>
										</li>
									</ul>
									<ul class="tg-socialicons">
										<li class="tg-facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
										<li class="tg-twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
										<li class="tg-linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
										<li class="tg-googleplus"><a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a></li>
										<li class="tg-rss"><a href="javascript:void(0);"><i class="fa fa-rss"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--************************************
					Contact Us End
			*************************************-->
		</main>
		<!--************************************
				Main End
		*************************************-->
        <?php
		require "footer.php";
		?>
