<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 pull-left">
	<aside id="tg-sidebar" class="tg-sidebar">
		<div class="tg-widget tg-widgetsearch">
			<form action="#" class="tg-formtheme tg-formsearch">
				<div class="form-group">
					<button type="button"><i class="icon-magnifier"></i></button>
					<input type="search" name="search" class="form-group" placeholder="Rechercher par mot clé...">
				</div>
			</form>
		</div>
		<div class="tg-widget tg-catagories">
			<div class="tg-widgettitle">
				<h3>Catégories</h3>
			</div>
			<div class="tg-widgetcontent">
				<ul>
					<?php
					$cats = $webmaster->sqlselect('cgc_category','WHERE active="on" ORDER BY title');
					$books = $webmaster->view_books();
					echo "<li><a href=\"index.php?component=3\"><span>Tous</span><em>".sizeof($books)."</em></a></li>";
					foreach ($cats as $cat) {
					?>
					<li><a href="index.php?component=3&id_cat=<?=bin2hex(stripslashes($cat['id']))+1;?>"><span><?=stripslashes($cat['title']);?></span><em><?=$webmaster->sqlcount('cgc_books','id','id_category',$dance->sqli($cat['id']));?></em></a></li>
					<?php } ?>
				</ul>
			</div>
		</div>
		<div class="tg-widget tg-widgettrending">
			<div class="tg-widgettitle">
				<h3>Livres Récents</h3>
			</div>
			<div class="tg-widgetcontent">
				<ul>
					<?php
					$books = $webmaster->sqlselect('cgc_books','WHERE active="on" ORDER BY id DESC LIMIT 4');
					foreach ($books as $book) { ?>
					<li>
						<article class="tg-post">
							<figure><a href="index.php?component=4&id=<?=bin2hex($book['id'])+5;?>"><img src="images/books/<?=$book['photo'];?>" ></a></figure>
							<div class="tg-postcontent">
								<div class="tg-posttitle">
									<h3><a href="index.php?component=4&id=<?=bin2hex($book['id'])+5;?>"><?=substr(stripslashes($book['title']), 0, 20);?>...</a></h3>
								</div>
								<span class="tg-bookwriter"><a href="javascript:void(0);"><?=$book['author'];?></a></span>
							</div>
						</article>
					</li>
				<?php } ?>
				</ul>
			</div>
			<div class="tg-widgettitle">
				<h3></h3>
			</div>
		</div>
	</aside>
</div>
