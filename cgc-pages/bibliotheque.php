<?php
require "header.php";
?>
		<!--************************************
				Header End
		*************************************-->
		<!--************************************
				Inner Banner Start
		*************************************-->
		<div class="tg-innerbanner tg-haslayout tg-parallax tg-bginnerbanner" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/slider/dev-1.jpg">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="tg-innerbannercontent">
							<h1>Bibliothèque</h1>
							<ol class="tg-breadcrumb">
								<li><a href="index.php">Accueil</a></li>
								<li class="tg-active">Bibliothèque</li>
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
									<div class="tg-products">
										<div class="tg-sectionhead">
											<h2><span>meilleur choix</span>
												<?php
												$id_cat = $dance->clean($dance->sqli($_GET['id_cat']));

												if(empty($id_cat))
													echo"Tous Les Livres</h2>";
												else{
													$id_cat = hex2bin($id_cat-1);
													$cat = $webmaster->view_category($id_cat);
													if(empty($cat)) {
														$dance->redirect('index.php?component=3');
													}
													echo stripslashes($cat[0]->gettitle())."</h2>";
												}
												?>
										</div>

										<div class="tg-productgrid">
											<div class="tg-refinesearch">
											</div>
											<?php
											if(empty($id_cat)){
												$books = $webmaster->view_books();
							                    foreach ($books as $book) {
													if($book->getactive() == "on"){
											 ?>
											<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
												<div class="tg-postbook">
													<figure class="tg-featureimg">
														<div class="tg-bookimg">
															<div class="tg-frontcover"><img src="images/books/<?=$book->getphoto();?>" alt="image description"></div>
															<div class="tg-backcover"><img src="images/books/<?=$book->getphoto();?>" alt="image description"></div>
														</div>
														<a class="tg-btnaddtowishlist" href="index.php?component=4&id=<?=bin2hex($book->getid())+5;?>">
															<i class="icon-heart"></i>
															<span>Lire Description</span>
														</a>
													</figure>
													<div class="tg-postbookcontent">
														<ul class="tg-bookscategories">
															<li><a href="javascript:void(0);"><?=$webmaster->sqlview('cgc_category','id',$dance->sqli($book->getid_category()))["title"];?></a></li>
														</ul>
														<div class="tg-themetagbox"><span class="tg-themetag">FREE</span></div>
														<div class="tg-booktitle">
															<?php
															if(strlen($book->gettitle())>30)
																 $title = substr(stripslashes($book->gettitle()), 0, 30).'...';
															else
																$title = stripslashes($book->gettitle());
															?>
															<h3><a href="index.php?component=4&id=<?=bin2hex($book->getid())+5;?>"><?=$title;?></a></h3>
														</div>
														<span class="tg-bookwriter"><a href="javascript:void(0);"><?=stripslashes($book->getauthor());?></a></span>
														<span class="tg-stars"><span></span></span>
														<a class="tg-btn tg-btnstyletwo" href="index.php?component=4&id=<?=bin2hex($book->getid())+5;?>">
															<i class="fa fa-download"></i>
															<em>Télecharger</em>
														</a>
													</div>
												</div>
											</div>
										<?php
											}
										}
										}else{
										$books = $webmaster->sqlselect('cgc_books','WHERE id_category = '.($id_cat)) ;
										if(!empty($books)){
										foreach ($books as $book) {
											if($book['active'] == "on"){
										?>
										<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
											<div class="tg-postbook">
												<figure class="tg-featureimg">
													<div class="tg-bookimg">
														<div class="tg-frontcover"><img src="images/books/<?=$book['photo'];?>" alt="image description"></div>
														<div class="tg-backcover"><img src="images/books/<?=$book['photo'];?>" alt="image description"></div>
													</div>
													<a class="tg-btnaddtowishlist" href="index.php?component=4&id=<?=bin2hex($book['id'])+5;?>">
														<i class="icon-heart"></i>
														<span>Lire Description</span>
													</a>
												</figure>
												<div class="tg-postbookcontent">
													<ul class="tg-bookscategories">
														<li><a href="javascript:void(0);"><?=$webmaster->sqlview('cgc_category','id',$dance->sqli($book['id_category']))["title"];?></a></li>
													</ul>
													<div class="tg-themetagbox"><span class="tg-themetag">FREE</span></div>
													<div class="tg-booktitle">
														<h3><a href="index.php?component=4&id=<?=bin2hex($book['id'])+5;?>"><?=stripslashes($book['title']);?></a></h3>
													</div>
													<span class="tg-bookwriter"><a href="javascript:void(0);"><?=stripslashes($book['author']);?></a></span>
													<span class="tg-stars"><span></span></span>
													<a class="tg-btn tg-btnstyletwo" href="index.php?component=4&id=<?=bin2hex($book['id'])+5;?>">
														<i class="fa fa-download"></i>
														<em>Télecharger</em>
													</a>
												</div>
											</div>
										</div>
										<?php
										}
									}
								}else {
										$alert->alertbig('info','Cette categorie ne contient pas des livres, arrive bientôt !');
									}
								}
										?>
										</div>
									</div>
								</div>
							</div>
							<?php require_once('sidebar.php');?>
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
