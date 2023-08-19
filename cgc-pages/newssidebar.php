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

		<div class="tg-widget tg-widgettrending">
			<div class="tg-widgettitle">
				<h3>Actualités Récents</h3>
			</div>
			<div class="tg-widgetcontent">
				<ul>
					<?php
					$news = $webmaster->sqlselect('cgc_news','WHERE active="on" ORDER BY date_news DESC LIMIT 4');
					foreach ($news as $new) {
					?>
					<li>
						<article class="tg-post">
							<figure><a href="index.php?component=2&act_id=<?=bin2hex($new['id'])+3;?>"><img class="img-thumbnail" src="images/news/main/<?=$new['photo'];?>" ></a></figure>
							<div class="tg-postcontent">
								<div class="tg-posttitle">
									<h3><a href="index.php?component=2&act_id=<?=bin2hex($new['id'])+3;?>"><?=substr(stripslashes($new['title']), 0, 13);?>...</a></h3>
								</div>
								<span class="tg-bookwriter"><small><i class="fa fa-calendar-o"></i> <?=date("d/m/Y", strtotime($new['date_news']));?> <i class="fa fa-comment-o"></i> 0</small></span>
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
		<div class="tg-widget tg-catagories">
			<div class="tg-widgettitle">
				<h3>Catégories des Livres</h3>
			</div>
			<div class="tg-widgetcontent">
				<ul>
					<?php
					$cats = $webmaster->sqlselect('cgc_category','ORDER BY title');
					$books = $webmaster->view_books();
					echo "<li><a href=\"index.php?component=3\"><span>Tous</span><em>".sizeof($books)."</em></a></li>";
					foreach ($cats as $cat) {
					?>
					<li><a href="index.php?component=3&id_cat=<?=bin2hex(stripslashes($cat['id']))+1;?>"><span><?=stripslashes($cat['title']);?></span><em><?=$webmaster->sqlcount('cgc_books','id','id_category',$dance->sqli($cat['id']));?></em></a></li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</aside>
</div>
