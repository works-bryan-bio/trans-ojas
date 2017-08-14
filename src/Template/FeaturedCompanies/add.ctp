<section class="content-header">
    <h1><?= __('Add Featured Company') ?></h1>
    <ol class="breadcrumb">
        <li><?= $this->Html->link("<i class='fa fa-dashboard'></i>" . __("Home"), ['controller' => 'users', 'action' => 'dashboard'],['escape' => false]) ?></li>
        <li><?= $this->Html->link("<i class='fa fa-dashboard'></i>" . __('Featured Companies'), ['controller' => 'users', 'action' => 'dashboard'],['escape' => false]) ?></li>
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
                    <?= $this->Form->create($featuredCompany,['id' => 'frm-default-add', 'data-toggle' => 'validator', 'role' => 'form','class' => 'form-horizontal']) ?>
                    <fieldset>        
                        <?php
                                                            echo "
                                    <div class='form-group'>
                                        <label for='entity_id' class='col-sm-2 control-label'>" . __('Entity Id') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('entity_id', ['class' => 'form-control', 'id' => 'entity_id', 'label' => false]);                
                                    echo " </div></div>";    
                                    
                                                            echo "
                                    <div class='form-group'>
                                        <label for='cover' class='col-sm-2 control-label'>" . __('Cover') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('cover', ['class' => 'form-control', 'id' => 'cover', 'label' => false]);                
                                    echo " </div></div>";    
                                    
                                                            echo "
                                    <div class='form-group'>
                                        <label for='map' class='col-sm-2 control-label'>" . __('Map') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('map', ['class' => 'form-control', 'id' => 'map', 'label' => false]);                
                                    echo " </div></div>";    
                                    
                                                            echo "
                                    <div class='form-group'>
                                        <label for='value' class='col-sm-2 control-label'>" . __('Value') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('value', ['class' => 'form-control', 'id' => 'value', 'label' => false]);                
                                    echo " </div></div>";    
                                    
                                                            echo "
                                    <div class='form-group'>
                                        <label for='gallery' class='col-sm-2 control-label'>" . __('Gallery') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('gallery', ['class' => 'form-control', 'id' => 'gallery', 'label' => false]);                
                                    echo " </div></div>";    
                                    
                                                            echo "
                                    <div class='form-group'>
                                        <label for='testimonial' class='col-sm-2 control-label'>" . __('Testimonial') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('testimonial', ['class' => 'form-control', 'id' => 'testimonial', 'label' => false]);                
                                    echo " </div></div>";    
                                    
                                                            echo "
                                    <div class='form-group'>
                                        <label for='website' class='col-sm-2 control-label'>" . __('Website') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('website', ['class' => 'form-control', 'id' => 'website', 'label' => false]);                
                                    echo " </div></div>";    
                                    
                                                            echo "
                                    <div class='form-group'>
                                        <label for='hide' class='col-sm-2 control-label'>" . __('Hide') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('hide', ['class' => 'form-control', 'id' => 'hide', 'label' => false]);                
                                    echo " </div></div>";    
                                    
                                                            echo "
                                    <div class='form-group'>
                                        <label for='publish' class='col-sm-2 control-label'>" . __('Publish') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('publish', ['class' => 'form-control', 'id' => 'publish', 'label' => false]);                
                                    echo " </div></div>";    
                                    
                                                            echo "
                                    <div class='form-group'>
                                        <label for='sorting' class='col-sm-2 control-label'>" . __('Sorting') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('sorting', ['class' => 'form-control', 'id' => 'sorting', 'label' => false]);                
                                    echo " </div></div>";    
                                    
                                                            echo "
                                    <div class='form-group'>
                                        <label for='vcount' class='col-sm-2 control-label'>" . __('Vcount') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('vcount', ['class' => 'form-control', 'id' => 'vcount', 'label' => false]);                
                                    echo " </div></div>";    
                                    
                                                ?>
                    </fieldset>
                    <div class="form-group" style="margin-top: 80px;">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div class="action-fixed-bottom">
                                <?= $this->Form->button('<i class="fa fa-save"></i> ' . __('Save'),['name' => 'save', 'value' => 'save', 'class' => 'btn btn-success', 'escape' => false]) ?>
                                <?= $this->Form->button('<i class="fa fa-edit"></i> ' . __('Save and Continue'),['name' => 'save', 'value' => 'edit', 'class' => 'btn btn-info', 'escape' => false]) ?>
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