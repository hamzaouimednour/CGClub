<?php
$newsid = $dance->clean($dance->sqli($_GET['act_id']));
if(empty($newsid)) $dance->redirect('index.php?component=1');
$id = hex2bin($newsid-3);
$news = $webmaster->view_news($id);
if(empty($news)) $dance->redirect('index.php?component=1');
require "header.php";
?>
		<!--************************************
				Header End
		*************************************-->
		<!--************************************
				Inner Banner Start
		*************************************-->
		<div class="tg-innerbanner tg-haslayout tg-parallax tg-bginnerbanner" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/slider/act.jpg">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="tg-innerbannercontent">
							<h1>Actualités & articles</h1>
							<ol class="tg-breadcrumb">
								<li><a href="index.php">Accueil</a></li>
								<li><a href="index.php?component=1">Actualités</a></li>
								<li class="tg-active">Description</li>
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
					News Grid Start
			*************************************-->
			<div class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div id="tg-twocolumns" class="tg-twocolumns">
							<div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 pull-right">
								<figure class="tg-newsdetailimg">
									<img src="images/news/cover/<?=$news[0]->getphoto2();?>" alt="image description">
									<figcaption class="tg-author">
										<img src="images/001-user.png" width="50">
										<div class="tg-authorinfo">
											<span class="tg-bookwriter">Publié par : <a href="javascript:void(0);">Admin</a></span>
											<ul class="tg-postmetadata">
												<li><a href="javascript:void(0);"><i class="fa fa-calendar-o"></i><?=$alert->changedate($news[0]->getdate_news());?></a></li>
												<li><a href="javascript:void(0);"><i class="fa fa-eye"></i><i><?=$alert->counter(bin2hex($news[0]->getid()+3),"NewsCounter.json");?> Vues</i></a></li>
											</ul>
										</div>
									</figcaption>
								</figure>
								<div id="tg-content" class="tg-content">
									<div class="tg-newsdetail">
										<ul class="tg-bookscategories">
										</ul>
										<div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
										<div class="tg-posttitle">
											<h3><a href="javascript:void(0);"><?=stripslashes($news[0]->gettitle());?></a></h3>
										</div>
										<div class="tg-description" style="">
											<?=stripslashes($news[0]->getdescription());?>
										</div>
										<div class="tg-tagsshare">
											<div class="tg-tags">
												<span>Tags :</span>
												<div class="tg-tagholder">
													<?php
													$tags = explode(',', $news[0]->gettags());
													foreach ($tags as $tag){
														echo '<a class="tg-tag" href="javascript:void(0);">'.$tag.'</a>';
													}
														?>
												</div>
											</div>
											<div class="tg-socialshare">
												<span>Partager :</span>
												<ul class="tg-socialicons">
													<li class="tg-facebook"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>" target="_blank" ><i class="fa fa-facebook"></i></a></li>
													<li class="tg-twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
													<li class="tg-linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
													<li class="tg-googleplus"><a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a></li>
													<li class="tg-rss"><a href="javascript:void(0);"><i class="fa fa-rss"></i></a></li>
												</ul>
											</div>
										</div>

										<div class="tg-leaveyourcomment">
											<div class="tg-sectionhead">
												<h2>Laissez un commentaire</h2>
											</div>
											<form class="tg-formtheme tg-formleavecomment">
												<fieldset>
													<div class="form-group">
														<input type="text" name="full name" class="form-control" placeholder="First Name*">
													</div>
													<div class="form-group">
														<input type="text" name="last name" class="form-control" placeholder="Last Name*">
													</div>
													<div class="form-group">
														<input type="email" name="email address" class="form-control" placeholder="Email*">
													</div>
													<div class="form-group">
														<input type="text" name="subject" class="form-control" placeholder="Subject (optional)">
													</div>
													<div class="form-group">
														<textarea placeholder="Comment"></textarea>
													</div>
													<div class="form-group">
														<a class="tg-btn tg-active" href="javascript:void(0);">Submit</a>
													</div>
												</fieldset>
											</form>
										</div>
									</div>
								</div>
							</div>
							<?php require_once('newssidebar.php');?>
						</div>
					</div>
				</div>
			</div>
			<!--************************************
					News Grid End
			*************************************-->
		</main>
		<!--************************************
				Main End
		*************************************-->
		<?php
		require "footer.php";
		?>
