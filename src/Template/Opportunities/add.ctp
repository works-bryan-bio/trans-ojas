<style>
h3{
    padding:10px;
    background-color: #222D32;
    color:#ffffff;
}
</style>
<section class="content-header">
    <h1><?= __('Add Opportunity') ?></h1>
    <ol class="breadcrumb">
        <li><?= $this->Html->link("<i class='fa fa-dashboard'></i>" . __("Home"), ['controller' => 'users', 'action' => 'dashboard'],['escape' => false]) ?></li>
        <li><?= $this->Html->link("<i class='fa fa-black-tie'></i>" . __('Opportunities'), ['controller' => 'users', 'action' => 'dashboard'],['escape' => false]) ?></li>
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
                    <?= $this->Form->create($opportunity,['id' => 'frm-default-add', 'data-toggle' => 'validator', 'role' => 'form','class' => 'form-horizontal']) ?>
                    <fieldset>        
                        <h3>Job Details</h3>
                        <?php                                
                                                            echo "
                                    <div class='form-group'>
                                        <label for='industry_id' class='col-sm-2 control-label'>" . __('Industry') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('industry_id', ['class' => 'form-control', 'id' => 'industry_id', 'label' => false, 'options' => $industries]);                
                                    echo " </div></div>";    
                                    
                                                            echo "
                                    <div class='form-group'>
                                        <label for='opportunity_type_id' class='col-sm-2 control-label'>" . __('Job classification') . "</label>
                                        <div class='col-sm-6'>";
                                         echo $this->Form->input('opportunity_type_id', ['class' => 'form-control', 'id' => 'opportunity_type_id', 'label' => false, 'options' => $opportunityTypes]);                 
                                    echo " </div></div>";

                                    echo "
                                    <div class='form-group'>
                                        <label for='work_type_id' class='col-sm-2 control-label'>" . __('Work Type') . "</label>
                                        <div class='col-sm-6'>";
                                         echo $this->Form->input('work_type_id', ['class' => 'form-control', 'id' => 'work_type_id', 'label' => false, 'options' => $workTypes]);                 
                                    echo " </div></div>";

                                                            echo "
                                    <div class='form-group'>
                                        <label for='title' class='col-sm-2 control-label'>" . __('Job Title') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('title', ['class' => 'form-control', 'id' => 'title', 'label' => false]);                
                                    echo " </div></div>";    
                                    
                                                            echo "
                                    <div class='form-group'>
                                        <label for='description' class='col-sm-2 control-label'>" . __('Description') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('description', ['class' => 'form-control ckeditor', 'id' => 'description', 'label' => false]);                
                                    echo " </div></div>";    
                                    
                                                            echo "
                                    <div class='form-group'>
                                        <label for='requirements' class='col-sm-2 control-label'>" . __('Requirements') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('requirements', ['class' => 'form-control', 'id' => 'requirements', 'label' => false]);                
                                    echo " </div></div>";

                                    echo "
                                    <div class='form-group'>
                                        <label for='job_location' class='col-sm-2 control-label'>" . __('Job Location') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('address', ['class' => 'form-control', 'id' => 'address', 'label' => false]);                
                                    echo " </div></div>";

                                    echo "
                                    <div class='form-group'>
                                        <label for='title' class='col-sm-2 control-label'>" . __('Contact Name') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('contact_name', ['class' => 'form-control', 'id' => 'contact_name', 'label' => false]);                
                                    echo " </div></div>";  

                                    echo "
                                    <div class='form-group'>
                                        <label for='display_salary_on_ads' class='col-sm-2 control-label'>" . __('Publish Contact') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('publish_contact', ['class' => 'form-control', 'id' => 'publish_contact', 'options' => [1 => 'Yes', 0 => 'No'], 'label' => false]);                
                                    echo " </div></div>";
                        ?>                        
                        <h3>Salary Details</h3>
                        <?php 
                                     echo "
                                    <div class='form-group'>
                                        <label for='salary_type_id' class='col-sm-2 control-label'>" . __('Salary Type') . "</label>
                                        <div class='col-sm-6'>";
                                         echo $this->Form->input('salary_type_id', ['class' => 'form-control', 'id' => 'salary_type_id', 'label' => false, 'options' => $salaryTypes]);                 
                                    echo " </div></div>";

                                    echo "
                                    <div class='form-group'>
                                        <label for='min_salary' class='col-sm-2 control-label'>" . __('Minimum Salary') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('min_salary', ['class' => 'form-control', 'id' => 'min_salary', 'label' => false]);                
                                    echo " </div></div>";

                                    echo "
                                    <div class='form-group'>
                                        <label for='max_salary' class='col-sm-2 control-label'>" . __('Maximum Salary') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('max_salary', ['class' => 'form-control', 'id' => 'max_salary', 'label' => false]);                
                                    echo " </div></div>";

                                    echo "
                                    <div class='form-group'>
                                        <label for='display_salary_on_ads' class='col-sm-2 control-label'>" . __('Display Salary on Ads') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('display_salary_on_ads', ['class' => 'form-control', 'id' => 'display_salary_on_ads', 'options' => [1 => 'Yes', 0 => 'No'], 'label' => false]);                
                                    echo " </div></div>";    

                                    echo "
                                    <div class='form-group'>
                                        <label for='salary_details_displayed' class='col-sm-2 control-label'>" . __('Salary Details Displayed') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('salary_details_displayed', ['type' => 'text', 'class' => 'form-control', 'id' => 'salary_details_displayed', 'label' => false]);                
                                    echo " </div></div>";
                                    
                                                            echo "
                                    <div class='form-group'>
                                        <label for='country_id' class='col-sm-2 control-label'>" . __('Country') . "</label>
                                        <div class='col-sm-6'>";
                                         echo $this->Form->input('country_id', ['class' => 'form-control', 'id' => 'country_id', 'label' => false, 'options' => $countries]);                 
                                    echo " </div></div>";    
                                                            echo "
                                    <div class='form-group'>
                                        <label for='state_id' class='col-sm-2 control-label'>" . __('State') . "</label>
                                        <div class='col-sm-6'>";
                                         echo $this->Form->input('state_id', ['class' => 'form-control', 'id' => 'state_id', 'label' => false, 'options' => $states]);                 
                                    echo " </div></div>";    
                                                            echo "
                                    <div class='form-group'>
                                        <label for='city' class='col-sm-2 control-label'>" . __('City') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('city', ['class' => 'form-control', 'id' => 'city', 'label' => false]);                
                                    echo " </div></div>";    
                                    
                                                            echo "
                                    <div class='form-group'>
                                        <label for='end_date' class='col-sm-2 control-label'>" . __('End Date') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('end_date', ['type' => 'text', 'class' => 'form-control default-datepicker', 'id' => 'end_date', 'label' => false]);                
                                    echo " </div></div>";    
                                    
                                                            echo "
                                    <div class='form-group'>
                                        <label for='opportunity_status_id' class='col-sm-2 control-label'>" . __('Opportunity Status') . "</label>
                                        <div class='col-sm-6'>";
                                         echo $this->Form->input('opportunity_status_id', ['class' => 'form-control', 'id' => 'opportunity_status_id', 'label' => false, 'options' => $opportunityStatuses]);                 
                                    echo " </div></div>";                                                               
                                    
                                                            echo "
                                    <div class='form-group'>
                                        <label for='admin_remark' class='col-sm-2 control-label'>" . __('Admin Remark') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('admin_remark', ['class' => 'form-control', 'id' => 'admin_remark', 'label' => false]);                
                                    echo " </div></div>";                            
                                                ?>
                                    <h3>Selling Points</h3>
                                    <?php for( $x=1;$x<=$maxSellingPoints;$x++ ){ ?>
                                        <div class="col-sm-5" style="margin:10px;">
                                            <input class="form-control" name="keySellingPoints[]" placeholder="Key Selling Points" />
                                        </div>
                                    <?php } ?>
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