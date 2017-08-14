<?php use Cake\Utility\Inflector; ?>	
<style>
p{
	text-align: justify;
}
.sidebar a{
	color:#ffffff;
	text-decoration: none;
}
.blog-list p{
font-family: 'open sans';
font-size: 13px;
color: #3c3c3c !important;
font-weight: 400;
}
.blog-list h3{
    font-family: dosis;
    font-weight: bold;
}
.blog-image-v2{
	margin-top:15px;
}
</style>
<script src="https://use.fontawesome.com/94db9ed091.js"></script>
<div class="wrapper" style="padding-top:50px;">
	<div class="col-md-8 blog-list" style="float:left;padding: 0px;">
		<?php foreach( $blogs as $blog ){ ?>
		<div style="border-top: 1px solid #c2c7c7;margin-bottom:40px;">
			<div class="col-md-4" style="float:left;padding-left: 0px;">
				<img src="<?php echo $blog->thumbnail; ?>" alt="<?php echo $blog->title; ?>" class="blog-image-v2" />
			</div>
			<div class="col-md-8" style="float:left;padding-left: 0px;padding-top: 5px;">
				<h3 style="margin-top: 5px;"><?php echo $blog->title; ?><br/><small><?php echo $blog->blog_category->title; ?> | <?php echo $blog->created->format("d F Y"); ?></small></h3>
				<?php echo $blog->excerpt; ?>
				<p></p>
				<?php echo $this->Html->link('Continue Reading »', array(
					'controller'=>'blogs', 
					'action'=> $blog->id,                    
					 Inflector::slug($blog->title, "-"),
					), array(
                        'class' => 'btn btn-primary',
						'escape' => false,
				)); ?>
			</div>
			<br style="clear:both;" />
		</div>
		<?php } ?>
		<br />
		<div class="paginator" style="text-align:center;">
            <ul class="pagination">
            <?= $this->Paginator->prev('«') ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next('»') ?>
            </ul>
            <p class="hidden"><?= $this->Paginator->counter() ?></p>
        </div>
	</div>
	<div class="col-md-3 secondary" style="float:left;padding: 0px;">
		<div class="searchbox">
				<div class="addthis_inline_share_toolbox" style="padding-top:12px;padding-bottom:5px;"></div>				
				<!-- <ul class="social">
					<li> <a class="fa fa-facebook-square" href=""> </a> </li>
					<li> <a class="fa fa-rss" href=""> </a> </li>
					<li> <a class="fa fa-twitter" href=" https://twitter.com/"> </a> </li>
				</ul> -->
				<?= $this->Form->create(null,[                          
                    'url' => ['controller' => 'blog_list','action'=>'index'],
                    'id' => 'searchform',
                    'type' => 'GET'
                ]) ?>				
					<input type="text" class="field search" name="blog_query" id="s" placeholder="Search …">
				<?= $this->Form->end() ?>
				<div class="clear"></div>
		</div>
		<div class="sidebar">
			<?php foreach( $sideBarRecentBlogs as $sb ){ ?>
				<div class="content">
					<h3 class="sidetitl"><a href="<?php echo $this->Url->build(['controller' => 'blogs', 'action' => $sb->id, Inflector::slug($sb->title, "-")]); ?>"><?php echo $sb->title; ?></a></h3>
					<p class="content-desc"><?php echo $sb->excerpt; ?></p>
				</div>
			<?php } ?>			
			<div class="content">
				<h3 class="sidetitl">CATEGORIES</h3>
				<ul class="category-list">
					<?php foreach( $sideBarblogCategories as $bc ){ ?>
						<li><?php echo $this->Html->link($bc->title, ['controller' => 'blog_category', 'action' => $bc->id, Inflector::slug($bc->title, "-")]); ?></li>
					<?php } ?>					
				</ul>
			</div>
		</div>
	</div>
</div>

<br style="clear:both;" />
<br/><br/><br/>











