<section class="content-header">
    <h1><?= __('Add Blog') ?></h1>
    <ol class="breadcrumb">
        <li><?= $this->Html->link("<i class='fa fa-dashboard'></i>" . __("Home"), ['controller' => 'users', 'action' => 'dashboard'],['escape' => false]) ?></li>
        <li><?= $this->Html->link("<i class='fa fa-dashboard'></i>" . __('Blogs'), ['action' => 'index'],['escape' => false]) ?></li>
        <li class="active"><?= __('Add') ?></li>
    </ol>
</section>

<section class="content">
    <!-- Main Row -->
    <div class="row">
        <section class="col-lg-12 ">
            <div class="box " >
                <div class="box-header">

                </div>
                <div class="box-body">
                    <?= $this->Form->create($blog,['id' => 'frm-default-add', 'data-toggle' => 'validator', 'role' => 'form','class' => 'form-horizontal']) ?>
                    <fieldset>        
                        <?php
                                    echo "
                                    <div class='form-group'>
                                        <label for='blog_category_id' class='col-sm-2 control-label'>" . __('Blog Category') . "</label>
                                        <div class='col-sm-6'>";
                                         echo $this->Form->input('blog_category_id', ['class' => 'form-control', 'id' => 'blog_category_id', 'label' => false, 'options' => $blogCategories]);                 
                                    echo " </div></div>";   
                                    echo "
                                    <div class='form-group'>
                                        <label for='title' class='col-sm-2 control-label'>" . __('Title') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('title', ['class' => 'form-control', 'id' => 'title', 'label' => false]);                
                                    echo " </div></div>";    
                                    
                                    echo "
                                    <div class='form-group'>
                                        <label for='excerpt' class='col-sm-2 control-label'>" . __('Excerpt') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('excerpt', ['type' => 'textarea', 'class' => 'form-control ckeditor', 'id' => 'excerpt', 'label' => false]);                
                                    echo " </div></div>";    
                                    
                                                            echo "
                                    <div class='form-group'>
                                        <label for='body' class='col-sm-2 control-label'>" . __('Body') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('body', ['class' => 'form-control ckeditor', 'id' => 'body', 'label' => false]);                
                                    echo " </div></div>";    
                                    
                                                            echo "
                                    <div class='form-group'>
                                        <label for='thumbnail' class='col-sm-2 control-label'>" . __('Thumbnail') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('thumbnail', ['class' => 'form-control has-ck-finder', 'id' => 'thumbnail', 'readonly' => 'readonly', 'label' => false]);                                         
                                    echo " </div></div>";    
                                    echo "
                                    <div class='form-group'>
                                        <label for='publish' class='col-sm-2 control-label'>" . __('Is Publish') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->select('publish',["1" => "Yes", "0" => "No"],['class' => 'form-control', 'id' => 'publish', 'label' => false]);
                                    echo " </div></div>";    
                                    
                                                ?>
                    </fieldset>
                    <div class="form-group" style="margin-top: 80px;">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div class="action-fixed-bottom">
                                <?= $this->Form->button('<i class="fa fa-save"></i> ' . __('Save'),['name' => 'save', 'value' => 'save', 'class' => 'btn btn-success', 'escape' => false]) ?>
                                <?= $this->Form->button('<i class="fa fa-edit"></i> ' . __('Save and Continue adding'),['name' => 'save', 'value' => 'edit', 'class' => 'btn btn-info', 'escape' => false]) ?>
                                <?= $this->Html->link('<i class="fa fa-angle-left"> </i> ' . __('Back To list'), ['action' => 'index'],['class' => 'btn btn-warning', 'escape' => false]) ?>
                            </div>
                        </div>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </section>
    </div>
</section>