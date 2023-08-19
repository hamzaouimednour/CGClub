<?php
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
							<h1>Actualités</h1>
							<ol class="tg-breadcrumb">
								<li><a href="index.php">Accueil</a></li>
								<li class="tg-active">Actualités</li>
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
								<div id="tg-content" class="tg-content">
									<div class="tg-newsgrid">
										<div class="tg-sectionhead">
											<h2><span>Dernières nouvelles & articles </span>Actualités technologies à la Une</h2>
										</div>
										<div class="row">
											<?php
											$news = $webmaster->view_news();
											foreach ($news as $new) {
												if($new->getactive()=="on"){
												$tags = explode(',', $new->gettags());
											?>
											<div class="col-xs-6 col-sm-12 col-md-6 col-lg-4">
												<article class="tg-post">
													<figure>
														<a href="index.php?component=2&act_id=<?=bin2hex($new->getid()+3)?>"><img class="img-thumbnail" src="images/news/main/<?=$new->getphoto();?>"></a>

													</figure>

													<div class="tg-postcontent">
														<ul class="tg-bookscategories">
															<?php foreach ($tags as $tag) {
																echo '<span class="label label-info">'.$tag.'</span>&nbsp;&nbsp;';
															} ?>
															<!-- <div class="tg-themetagbox"><span class="tg-themetag">featured</span></div> -->
														</ul>
														<div class="tg-posttitle">
															<h3 class="overflow-title" > <a href="index.php?component=2&act_id=<?=bin2hex($new->getid()+3)?>" title="<?=stripslashes($new->gettitle());?>"><?=stripslashes($new->gettitle());?></a></h3>
														</div>
														<ul class="tg-postmetadata">
															<li><a href="javascript:void(0);"><small><i class="fa fa-calendar-o"></i></small><?=$alert->changedate($new->getdate_news());?></a></li>
															<li><a href="javascript:void(0);"><i class="fa fa-comment-o"></i><i>0 Comments</i></a></li>
														</ul>
													</div>
												</article>
											</div>
											<?php
												}
											}
											?>
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
