<?php
require "header.php";
?>
		<!--************************************
				Home Slider Start
		*************************************-->
		<div id="tg-homeslider" class="tg-homeslider tg-homeslidervthree tg-haslayout owl-carousel">
			<div class="item" data-vide-bg="poster: images/slider/img003.jpg" data-vide-options="position: 0% 70%">
				<div class="tg-slidercontent">
					<h1>{GEEk CLUB}<span></span> </h1>
					<div class="tg-description">
						<!-- <span class="tg-themetag" style="font-size:15px;">Bienvenue à CGC</span> -->
						<p style="font-size:20px;font-weight: bold;">BIENVENUE à CGC </p><span class="tg-themetag"><b>LEARN 2 CREATE</b></span>
					</div>
					<div class="tg-btns">
						<!-- <a class="tg-btn" href="javascript:void(0);">Lire la suite</a> -->
					</div>
				</div>
			</div>
			<div class="item" data-vide-bg="poster: images/slider/dev-1.jpg" data-vide-options="position: 0% 60%">
				<div class="tg-slidercontent">
					<h1>bibliothèque de<span>  programmation</span> </h1>
					<div class="tg-description">
						<p><b>Nous fournissons les meilleurs livres de programmation (Kotlin , C++ , Android , Python , Java , JS , PHP ... )</b></p>
					</div>
					<div class="tg-btns">
						<a class="tg-btn tg-active" href="index.php?component=3">Lire la suite</a>
					</div>
				</div>
			</div>
			<div class="item" data-vide-bg="poster: images/slider/img008.jpg" data-vide-options="position: 0% 30%">
				<div class="tg-slidercontent">
					<h1>Actualités<span>technologie</span></h1>
					<div class="tg-description">
						<p><b>Toute l'actualité de l'informatique et des technologies.Suivez l'actualite des nouvelles technologies - Les derniers reportages l'actualité high tech et IT ...</b></p>
					</div>
					<div class="tg-btns">
						<a class="tg-btn" href="index.php?component=1">Lire la suite</a>
					</div>
				</div>
			</div>

			</div>
		</div>
		<!--************************************
				Home Slider End
		*************************************-->
		<!--************************************
				Main Start
		*************************************-->
		<main id="tg-main" class="tg-main tg-haslayout">
			<!--************************************
					Best Selling Start
			*************************************-->
			<?php
				$books = $webmaster->view_books();

			 ?>
			<section class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="tg-sectionhead">
								<h2>Livres Gratuit</h2>
								<a class="tg-btn" href="javascript:void(0);">Voir tout</a>
							</div>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div id="tg-bestsellingbooksslider" class="tg-bestsellingbooksslider tg-bestsellingbooks owl-carousel">
								<?php
			                    	foreach ($books as $book) {
			                    ?>
								<div class="item">
									<div class="tg-postbook">
										<figure class="tg-featureimg">
											<div class="tg-bookimg">
												<div class="tg-frontcover"><img src="./images/books/<?=$book->getphoto();?>" alt="image description"></div>
												<div class="tg-backcover"><img src="./images/books/<?=$book->getphoto();?>" alt="image description"></div>
											</div>
											<a class="tg-btnaddtowishlist" href="index.php?component=4&id=<?=bin2hex($book->getid())+5;?>">
												<i class="icon-heart"></i>
												<span>Lire description</span>
											</a>
										</figure>
										<div class="tg-postbookcontent">
											<ul class="tg-bookscategories">
												<li><a href="javascript:void(0);"><?=$webmaster->sqlview('cgc_category','id',$dance->sqli($book->getid_category()))["title"];?></a></li>
											</ul>
											<div class="tg-themetagbox"><span class="tg-themetag">FREE</span></div>
											<div class="tg-booktitle">
												<h3><a href="javascript:void(0);"><?=substr(stripslashes($book->gettitle()), 0, 30);?>...</a></h3>
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
			                    ?>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Best Selling End
			*************************************-->
			<!--************************************
					Featured Item Start
			*************************************-->
			<section class="tg-bglight tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="tg-featureditm">
							<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 hidden-sm hidden-xs">
								<figure><img src="images/geek.png" alt="image description"></figure>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
								<div class="tg-featureditmcontent">
									<div class="tg-themetagbox"><span class="tg-themetag">featured</span></div>
									<div class="tg-booktitle">
										<h3><a href="javascript:void(0);">{ LEARN 2 CREATE }</a></h3>
									</div>
									<span class="tg-bookwriter"><strong>COMPUTER GEEK CLUB</strong></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Featured Item End
			*************************************-->
			<!--************************************
					Picked By Author Start
			*************************************-->
			<section class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="tg-sectionhead">
								<h2><span>Les meilleurs livres</span>les plus télécharger</h2>
							</div>
						</div>
						<div id="tg-pickedbyauthorslider" class="tg-pickedbyauthor tg-pickedbyauthorslider owl-carousel">
						<?php
						$jsonf="BooksCounter.json";
						$json = file_get_contents($jsonf);
						$json = json_decode($json, true);
						arsort($json);
						$i=0;
						foreach ($json as $id => $counter) {
							$i++;
							$bookid = hex2bin($id)-5;
							$book = $webmaster->view_books($bookid);
							$cat = $webmaster->view_category($book[0]->getid_category());
						 ?>
							<div class="item">
								<div class="tg-postbook">
									<figure class="tg-featureimg">
										<div class="tg-bookimg">
											<div class="tg-frontcover"><img src="images/books/<?=$book[0]->getphoto();?>" alt="image description"></div>
										</div>
										<div class="tg-hovercontent">
											<div class="tg-description">
												<p><?=substr(strip_tags(stripslashes($book[0]->getdescription())), 0, 123);?>...</p>
											</div>
											<strong class="tg-bookcategory">Categorie : <a href="index.php?component=3&id_cat=<?=bin2hex(stripslashes($cat[0]->getid()))+1;?>"><?=stripslashes($cat[0]->gettitle());?></a></strong>
											<strong class="tg-bookcategory">Publié le : <?=$alert->changedate($book[0]->getdate_book());?></strong>
											<div class="tg-ratingbox"><span class="tg-stars"><span></span></span></div>
										</div>
									</figure>
									<div class="tg-postbookcontent">
										<div class="tg-booktitle">
											<h3><a href="index.php?component=4&id=<?=bin2hex($book[0]->getid())+5;?>"><?=stripslashes($book[0]->gettitle());?></a></h3>
										</div>
										<span class="tg-bookwriter">Auteur : <a href="javascript:void(0);"><?=stripslashes($book[0]->getauthor());?></a></span>
										<a class="tg-btn tg-btnstyletwo"  href="index.php?component=4&id=<?=bin2hex($book[0]->getid())+5;?>">
											<i class="fa fa-download"></i>
											<em>Télecharger</em>
										</a>
									</div>
								</div>
							</div>
							<?php
							if($i==6) break;
							}
							 ?>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Picked By Author End
			*************************************-->
			<!--************************************
					Latest News Start
			*************************************-->
			<section class="tg-sectionspace tg-haslayout">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="tg-sectionhead">
								<h2> <span>Dernières nouvelles & articles</span> Actualités technologies à la Une</h2>
								<a class="tg-btn" href="index.php?component=1">Voir Tous</a>
							</div>
						</div>

						<div id="tg-postslider" class="tg-postslider tg-blogpost owl-carousel">
							<?php
							$news = $webmaster->view_news();
							foreach ($news as $new) {
								if($new->getactive()=="on"){
								$tags = explode(',', $new->gettags());
							?>
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
							<?php
								}
							}
							?>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Latest News End
			*************************************-->
			<!--************************************
					Call to Action Start
			*************************************-->
			<section class="tg-parallax tg-bgcalltoaction tg-haslayout" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/slider/img001.jpg">
				<div class="tg-sectionspace tg-haslayout">
					<div class="container">
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<div class="tg-calltoaction">
									<h2>Vous avez besoin d'aide ?</h2>
									<h3>si vous avez quelques proposition ou vous  avez besoin d'aide contactez nous.</h3>
									<a class="tg-btn tg-active" href="index.php?component=5">Contactez-nous <i class="icon-envelope"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!--************************************
					Call to Action End
			*************************************-->

		</main>
		<!--************************************
				Main End
		*************************************-->
<?php
require "footer.php";
?>
