<style>
.job-role-list{
    list-style: none;
}
.job-role-list li{
    display: inline-block;
    min-width: 200px;
    margin:10px 15px;
}
</style>
<section class="content-header">
    <h1><?= __('Edit Profile') ?></h1>
    <ol class="breadcrumb">
        <li><?= $this->Html->link("<i class='fa fa-dashboard'></i>" . __("Home"), ['controller' => 'users', 'action' => 'dashboard'],['escape' => false]) ?></li>
        <li><?= $this->Html->link("<i class='fa fa-user'></i>" . __('Candidates'), ['controller' => 'users', 'action' => 'dashboard'],['escape' => false]) ?></li>
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
                    <?= $this->Form->create(null,['id' => 'frm-default-add', 'data-toggle' => 'validator', 'role' => 'form','class' => 'form-horizontal']) ?>
                    <fieldset>  
                        <div class="callout callout-info">
                            <h4 style="margin-left:20px;">Job Roles</h4> 
                        </div>      
                        <ul class="job-role-list">
                            <?php foreach($jobRoles as $jr){ ?>
                                <?php 
                                    $is_checked = "";
                                    if( in_array($jr->id, $selected_job_roles) ){
                                        $is_checked = "checked=checked";
                                    }
                                ?>
                                <li><label class="checkbox"><input name="selectedJobRoles[<?php echo $jr->id; ?>]" <?php echo $is_checked; ?> type="checkbox" /><?php echo $jr->name; ?></label></li>
                            <?php } ?>
                        </ul>
                    </fieldset>
                    <div class="form-group" style="margin-top: 80px;">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div class="action-fixed-bottom">
                                <?= $this->Form->button('<i class="fa fa-save"></i> ' . __('Save'),['name' => 'save', 'value' => 'save', 'class' => 'btn btn-success', 'escape' => false]) ?>                                
                                <?= $this->Html->link('<i class="fa fa-angle-left"> </i> ' . __('Cancel'), ['controller' => 'users', 'action' => 'candidate_dashboard'],['class' => 'btn btn-warning', 'escape' => false]) ?>
                            </div>
                        </div>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </section>
    </div>
</section>