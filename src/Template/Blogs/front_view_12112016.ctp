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
</style>
<?php use Cake\Utility\Inflector; ?>
<div class="job-listing-table">
    <div class="wrapper">
        <div class="col-md-12" style="float:left;padding: 0px;">
              <div class="job-search-title">             
                  <h2 class="job-search-title"><?php echo $blog->title; ?></h2> 
                  <p class="detail"><span style="color: #2398a5;"><?php echo $blog->blog_category->title; ?> </span> | <?php echo $blog->created->format("d F Y"); ?></p>   
              </div>
        </div>
        <br style="clear:both;">
        <div class="col-md-8" style="float:left;padding: 0px;">
                <center><img src="<?php echo $blog->thumbnail; ?>" alt="<?php echo $blog->title; ?>" class="blog-image-v2" /></center>
                <div class="box">                
                    <div class="box-body">
                        <br/>
                        <div><?php echo $blog->body; ?></div>
                        <hr/>                            
                        <br/>
                        <div>
                            <?= $this->Html->link('<i class="fa fa-angle-left"> </i> Back To list', ['controller' => 'blog_list'],['class' => 'btn btn-warning', 'escape' => false]) ?>
                        </div>
                    </div>
                </div>
                <br/><br/><br/>
                <div class="col-md-11" style="padding: 0px;">
                      <h2> LEAVE A COMMENT</h2>
                      <?php echo $this->Flash->render() ?>
                      <br/>
                      <div class="gray-box">                          
                          <?= $this->Form->create(null,[
                                'url' => ['controller' => 'blogs','action' => 'post_comment'],
                                'id' => 'frm-blog-leave-comment', 
                                'data-toggle' => 'validator', 
                                'role' => 'form'
                            ]) ?>
                            <?php echo $this->Form->hidden('blog_id',['value' => $blog->id]) ?>
                            <?php echo $this->Form->hidden('blog_slug',['value' => Inflector::slug($blog->title, "-")]) ?>
                            <h4>Comment *</h4>
                            <textarea name="comment" required="" placeholder="Enter your comment"></textarea>
                            <br/><br/>
                            <h4>Name *</h4>
                            <input type="text" name="name" required="" placeholder="Enter your Fullname" />
                            <br/><br/>
                            <h4>Email *</h4>
                            <input type="text" name="email" required="" placeholder="Enter your Email Address" />
                            <br/><br/>
                            <h4>Website *</h4>
                            <input type="text" name="website" required="" placeholder="Enter your Website" />
                            <br/><br/>
                            <input type="submit" value="Post Comment" />
                            <br/><br/>  
                          <?= $this->Form->end() ?>
                      </div>
                </div>

        </div>
        <div class="col-md-3 secondary" style="float:left;padding: 0px;">
                <div class="searchbox">
                        <ul class="social">
                            <li> <a class="fa fa-facebook-square" href=""> </a> </li>
                            <li> <a class="fa fa-rss" href=""> </a> </li>
                            <li> <a class="fa fa-twitter" href=" https://twitter.com/"> </a> </li>
                        </ul>
                        <form method="get" id="searchform" action="" role="search">
                            <input type="text" class="field search" name="s" id="s" placeholder="Search …">
                        </form>
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
                                <li><?php echo $this->Html->link($bc->title, ['controller' => 'blog_category', 'action' => $bc->id ]); ?></li>
                            <?php } ?>                  
                        </ul>
                    </div>
        </div>
    </div>
</div>




<div class="paper-crack-bottom">
    <img src="<?= $this->Url->build("/images/paper-crack-bottom-b.png") ?>">
</div>