<section class="content-header">
    <h1><?= __('Add Company') ?></h1>
    <ol class="breadcrumb">
        <li><?= $this->Html->link("<i class='fa fa-dashboard'></i>" . __("Home"), ['controller' => 'users', 'action' => 'dashboard'],['escape' => false]) ?></li>
        <li><?= $this->Html->link("<i class='fa fa-dashboard'></i>" . __('Companies'), ['controller' => 'users', 'action' => 'dashboard'],['escape' => false]) ?></li>
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
                    <?= $this->Form->create($company,['id' => 'frm-default-add', 'data-toggle' => 'validator', 'role' => 'form','class' => 'form-horizontal']) ?>
                    <fieldset>       
                        <div class="callout callout-info">
                            <h4 style="margin-left:20px;">Company Information</h4> 
                        </div> 
                        <?php                                                            
                                                            echo "
                                    <div class='form-group'>
                                        <label for='name' class='col-sm-2 control-label'>" . __('Company Name') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('name', ['class' => 'form-control', 'id' => 'name', 'label' => false]);                
                                    echo " </div></div>";    
                                    
                                                            echo "
                                    <div class='form-group'>
                                        <label for='phone' class='col-sm-2 control-label'>" . __('Phone') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('phone', ['class' => 'form-control', 'id' => 'phone', 'label' => false]);                
                                    echo " </div></div>";    
                                    
                                                            echo "
                                    <div class='form-group'>
                                        <label for='fax' class='col-sm-2 control-label'>" . __('Fax') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('fax', ['class' => 'form-control', 'id' => 'fax', 'label' => false]);                
                                    echo " </div></div>";    
                                    
                                                            echo "
                                    <div class='form-group'>
                                        <label for='photo' class='col-sm-2 control-label'>" . __('Photo') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('photo', ['class' => 'form-control has-ck-finder','readonly' => 'readonly', 'id' => 'photo', 'label' => false]);                
                                    echo " </div></div>";    
                                    
                                                            echo "
                                    <div class='form-group'>
                                        <label for='address' class='col-sm-2 control-label'>" . __('Address') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('address', ['class' => 'form-control', 'id' => 'address', 'label' => false]);                
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
                                        <label for='zipcode' class='col-sm-2 control-label'>" . __('Zipcode') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('zipcode', ['class' => 'form-control', 'id' => 'zipcode', 'label' => false]);                
                                    echo " </div></div>";    
                                    
                                                            echo "
                                    <div class='form-group'>
                                        <label for='description' class='col-sm-2 control-label'>" . __('Remarks') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('description', ['class' => 'form-control', 'id' => 'description', 'label' => false]);                
                                    echo " </div></div>";                                        
                        ?>
                        <div class="callout callout-info">
                            <h4 style="margin-left:20px;">User Information</h4> 
                        </div>

                        <?php
                                                           
                                                            echo "
                                    <div class='form-group'>
                                        <label for='firstname' class='col-sm-2 control-label'>" . __('Firstname') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('firstname', ['class' => 'form-control', 'value' => $company->user->firstname, 'id' => 'firstname', 'label' => false]);                
                                    echo " </div></div>";    
                                    
                                                            echo "
                                    <div class='form-group'>
                                        <label for='middlename' class='col-sm-2 control-label'>" . __('Middlename') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('middlename', ['class' => 'form-control', 'value' => $company->user->middlename, 'id' => 'middlename', 'label' => false]);                
                                    echo " </div></div>";    
                                    
                                                            echo "
                                    <div class='form-group'>
                                        <label for='lastname' class='col-sm-2 control-label'>" . __('Lastname') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('lastname', ['class' => 'form-control', 'value' => $company->user->lastname, 'id' => 'lastname', 'label' => false]);                
                                    echo " </div></div>";        
                                    echo "
                                    <div class='form-group'>
                                        <label for='email' class='col-sm-2 control-label'>" . __('Email') . "</label>
                                        <div class='col-sm-6'>";
                                        echo $this->Form->input('email', ['class' => 'form-control', 'value' => $company->user->username, 'readonly' => 'readonly', 'disabled' => 'disabled', 'id' => 'email', 'required' => 'required', 'label' => false]);                
                                    echo " </div></div>";                                                           
                        ?>
                    </fieldset>
                    <div class="form-group" style="margin-top: 80px;">
                        <div class="col-sm-offset-2 col-sm-10">
                            <div class="action-fixed-bottom">
                                <?= $this->Form->button('<i class="fa fa-save"></i> ' . __('Save'),['name' => 'save', 'value' => 'save', 'class' => 'btn btn-success', 'escape' => false]) ?>
                                <?= $this->Form->button('<i class="fa fa-edit"></i> ' . __('Save and Continue editing'),['name' => 'save', 'value' => 'edit', 'class' => 'btn btn-info', 'escape' => false]) ?>
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