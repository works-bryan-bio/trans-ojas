<section class="content-header">
    <h1><?= __('Edit User') ?></h1>
    <ol class="breadcrumb">
        <li><?= $this->Html->link("<i class='fa fa-dashboard'></i>" . __("Home"), ['controller' => 'users', 'action' => 'dashboard'],['escape' => false]) ?></li>
        <li><?= $this->Html->link("<i class='fa fa-dashboard'></i>" . __('Users'), ['controller' => 'users', 'action' => 'dashboard'],['escape' => false]) ?></li>
        <li class="active"><?= __('Edit') ?></li>
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
                    <?= $this->Form->create($user,['id' => 'frm-default-add', 'data-toggle' => 'validator', 'role' => 'form','class' => 'form-horizontal']) ?>
                    <fieldset>        
                        <?php
                                                            echo "
                                    <div class='form-group'>
                                        <label for='username' class='col-sm-2 control-label'>" . __('Username') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('username', ['class' => 'form-control', 'id' => 'username', 'label' => false]);                
                                    echo " </div></div>";    
                                    
                                                            echo "
                                    <div class='form-group'>
                                        <label for='password' class='col-sm-2 control-label'>" . __('Password') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('password', ['class' => 'form-control', 'id' => 'password', 'label' => false]);                
                                    echo " </div></div>";    
                                    
                                                            echo "
                                    <div class='form-group'>
                                        <label for='group_id' class='col-sm-2 control-label'>" . __('Group Id') . "</label>
                                        <div class='col-sm-6'>";
                                         echo $this->Form->input('group_id', ['class' => 'form-control', 'id' => 'group_id', 'label' => false, 'options' => $groups]);                 
                                    echo " </div></div>";    
                                                            echo "
                                    <div class='form-group'>
                                        <label for='is_archive' class='col-sm-2 control-label'>" . __('Is Archive') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('is_archive', ['class' => 'form-control', 'id' => 'is_archive', 'label' => false]);                
                                    echo " </div></div>";    
                                    
                                                            echo "
                                    <div class='form-group'>
                                        <label for='reset_code' class='col-sm-2 control-label'>" . __('Reset Code') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('reset_code', ['class' => 'form-control', 'id' => 'reset_code', 'label' => false]);                
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