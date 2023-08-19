<?php
require "header.php";
?>
		<!--************************************
				Inner Banner Start
		*************************************-->
		<div class="tg-innerbanner tg-haslayout tg-parallax tg-bginnerbanner" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/slider/dev-1.jpg">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="tg-innerbannercontent">
							<h1>Livre details</h1>
							<ol class="tg-breadcrumb">
								<li><a href="index.php">home</a></li>
								<li><a href="index.php?component=3">Bibliothèque</a></li>
								<li class="tg-active">Livre details</li>
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
							<div class="col-xs-12 col-sm-10 col-md-10 col-lg-9 pull-right">
								<div id="tg-content" class="tg-content">
									<?php
									$id = $dance->clean($dance->sqli($_GET['id']));
									if(!empty($id)){
										$id = hex2bin($id-5);
							        	$book = $webmaster->view_books($id);
									if(empty($book))
										$dance->redirect('index.php?component=3');
									$cat = $webmaster->view_category($book[0]->getid_category());
									$alert->counter(bin2hex($book[0]->getid()+5),"BooksCounter.json",1);
									?>
									<div class="tg-productdetail">
										<div class="row">
											<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
												<div class="tg-postbook">
													<figure class="tg-featureimg"><img src="images/books/<?=$book[0]->getphoto();?>" alt="image description"></figure>
													<div class="tg-postbookcontent">
														<a class="tg-btn tg-active tg-btn-lg" href="<?=$book[0]->getlink();?>" target="_blank"><i class="fa fa-download"></i> Telecharger</a>
														<a class="tg-btnaddtowishlist" href="index.php?component=3&id_cat=<?=bin2hex($book[0]->getid_category())+1?>">
															<span>livres similaires</span>
														</a>
													</div>
												</div>
											</div>
											<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
												<div class="tg-productcontent">
													<ul class="tg-bookscategories">
														<li><a href="index.php?component=3&id_cat=<?=bin2hex(stripslashes($cat[0]->getid()))+1;?>"><?=stripslashes($cat[0]->gettitle());?></a></li>
													</ul>
													<div class="tg-themetagbox"><span class="tg-themetag">GRATUIT</span></div>
													<div class="tg-booktitle">
														<h3 style="line-height: 1.2">
															<?=stripslashes($book[0]->gettitle());?>
														</h3>
													</div>
													<span class="tg-bookwriter">Auteur(s) : <a href="javascript:void(0);"><?=stripslashes($book[0]->getauthor());?></a></span>
													<div class="tg-share">
													</div>
													<ul class="tg-productinfo">
														<li><span>Format :</span><span>PDF</span></li>
														<li><span>Publié le :</span><span><?=$alert->changedate(stripslashes($book[0]->getdate_book()));?></span></li>
														<li><span>Catégorie :</span><span><?=stripslashes($cat[0]->gettitle());?></span></li>
													</ul>
													<div class="tg-share">
														<span>Partager:</span>
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
												<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
												<div class="tg-productcontent">
													<div class="tg-sectionhead"></div>
													<div class="tg-description">
														<div class="tg-productdescription">
																<ul class="tg-themetabs" role="tablist">
																	<li role="presentation" class="active"><a href="#description" data-toggle="tab">Description</a></li>
																</ul>
																<div class="tg-tab-content tab-content">
																	<div role="tabpanel" class="tg-tab-pane tab-pane active" id="description">
																		<div class="tg-description"><?=stripslashes($book[0]->getdescription());?></div>

																</div>
															</div>
														</div>
													</div>
												</div>
											</div>


											<div class="tg-relatedproducts">
												<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
													<div class="tg-sectionhead">
														<h2><span>Livres connexes</span>Tu pourrais aussi aimer</h2>
														<a class="tg-btn" href="index.php?component=3">Voir tous</a>
													</div>
												</div>
												<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
													<div id="tg-relatedproductslider" class="tg-relatedproductslider tg-relatedbooks owl-carousel">
														<?php
														$similars = $webmaster->sqlselect('cgc_books',"WHERE id != ".$book[0]->getid()." ORDER BY id_category = ".$book[0]->getid_category()." DESC");
														foreach ($similars as $similar) {
														?>
														<div class="item">
															<div class="tg-postbook">
																<figure class="tg-featureimg">
																	<div class="tg-bookimg">
																		<div class="tg-frontcover"><img src="./images/books/<?=$similar['photo'];?>" alt="image description"></div>
																		<div class="tg-backcover"><img src="./images/books/<?=$similar['photo'];?>" alt="image description"></div>
																	</div>
																	<a class="tg-btnaddtowishlist" href="index.php?component=4&id=<?=bin2hex($similar['id'])+5;?>">
																		<i class="icon-heart"></i>
																		<span>Lire description</span>
																	</a>
																</figure>
																<div class="tg-postbookcontent">
																	<ul class="tg-bookscategories">
																		<li><a href="index.php?component=3&id_cat=<?=bin2hex($similar['id_category'])+1?>"><?=$webmaster->sqlview('cgc_category','id',$dance->sqli($similar['id_category']))["title"];?></a></li>
																	</ul>
																	<div class="tg-themetagbox"><span class="tg-themetag">FREE</span></div>
																	<div class="tg-booktitle">
																		<h3><a href="index.php?component=4&id=<?=bin2hex($similar['id'])+5;?>"><?=substr(stripslashes($similar['title']),0,30);?>...</a></h3>
																	</div>
																	<span class="tg-bookwriter"><a href="javascript:void(0);"><?=stripslashes($similar['author']);?></a></span>
																	<span class="tg-stars"><span></span></span>
																	<a class="tg-btn tg-btnstyletwo" href="index.php?component=4&id=<<?=bin2hex($similar['id'])+5;?>">
																		<i class="fa fa-download"></i>
																		<em>Télecharger</em>
																	</a>
																</div>
															</div>
														</div>
														<?php
															}
									                    ?>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php require_once('sidebar.php');
						}else {
							$dance->redirect('index.php?component=3');
						}?>
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
