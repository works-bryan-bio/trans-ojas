<style>
a{
    color:#5da5af;
    text-decoration: none;
}
.blog-image{
    width: 500px;
    margin: 10px 0px;
}
.detail{
   
    font-size: 17px;
}
p{
    text-align: justify;
}
.gray-box{
    border: 1px solid #e1e1e1;
    height: 100%;
    background-color: #fafafa;
    padding:25px;
}
h4{
    color:#818181;
}
input{
    width:100%;
    padding: 10px;
}
textarea{
    width:100%;
    padding: 10px;
    height:150px;
}
input[type=submit] {
    padding: 14px 15px;
    width: 30%;
    background: #606978;
    font-size: 17px;
    color: white;
    border: 0 none;
    cursor: pointer;
    -webkit-border-radius: 5px;
    border-radius: 5px;
}
.sidebar a{
    color:#ffffff;
    text-decoration: none;
}
.job-listing-table{
    padding: 35px 126px 100px !important;
}
.blog-content p{
font-family: 'open sans';
font-size: 16px;
color: #3c3c3c !important;
font-weight: 400;
}
.blog-content h2{
    font-family: dosis;
    font-weight: bold;
}
</style>
<?php use Cake\Utility\Inflector; ?>
<div class="job-listing-table">
    <div class="wrapper">
        <div class="col-md-12 blog-content" style="float:left;padding: 0px;">
              <div class="job-search-title">             
                  <h2 class="job-search-title"><?php echo $blog->title; ?></h2> 
                  <p class="detail"><span style="color: #2398a5;"><?php echo $blog->blog_category->title; ?> </span> | <?php echo $blog->created->format("d F Y"); ?></p>   
              </div>
        </div>
        <br style="clear:both;">
        <div class="col-md-8 blog-content" style="float:left;padding: 0px;">
                <center><img src="<?php echo $blog->thumbnail; ?>" alt="Image <?php echo $blog->title; ?>" class="blog-image-v2" /></center>
                <div class="box">                
                    <div class="box-body">
                        <br/>
                        <div><?php echo $blog->body; ?></div>
                        <hr/>                            
                        <br/>
                        <div>
                            <?= $this->Html->link('Back To list', ['controller' => 'blog_list'],['class' => 'btn btn-warning', 'escape' => false]) ?>
                        </div>
                    </div>
                </div>
                <br/><br/><br/>
                <div class="col-md-11" style="padding: 0px;">
                      <div id="disqus_thread"></div>
                </div>

        </div>
        <div class="col-md-3 secondary" style="float:left;padding: 0px;">
                <div class="searchbox">
                        <!-- <ul class="social">
                            <li> <a class="fa fa-facebook-square" href=""> </a> </li>
                            <li> <a class="fa fa-rss" href=""> </a> </li>
                            <li> <a class="fa fa-twitter" href=" https://twitter.com/"> </a> </li>
                        </ul> -->
                        <div class="addthis_inline_share_toolbox" style="padding-top:12px;padding-bottom:5px;"></div>   
                        <?= $this->Form->create(null,[                          
                            'url' => ['controller' => 'blog_list','action'=>'index'],
                            'id' => 'searchform',
                            'type' => 'GET'
                        ]) ?>
                            <input type="text" class="field search" name="blog_query" id="s" placeholder="Search …">
                        <?= $this->Form->end() ?>
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




<div class="paper-crack-bottom">
    <img src="<?= $this->Url->build("/images/paper-crack-bottom-b.png") ?>">
</div>