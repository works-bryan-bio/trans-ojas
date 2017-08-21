<?php use Cake\Utility\Inflector; ?>
<?php use Cake\Utility\Text; ?>
<div class="apply-for-job-search">
    <div class="apply-for-job-search-inner">
        <div class="wrapper">
            <?= $this->Form->create(null,[                          
                                'url' => ['controller' => 'job_list','action' => 'search_result'],
                                'class' => 'form-horizontal',
                                'type' => 'GET'
                            ]) ?>                     
                                <p>Enter your search criteria below to find your next perfect job. Fill in as many fields as possible for the most accurate results.</p>
                                 <div class='form-group'>
                                    <label for='industry_id' class='col-sm-2 control-label'><?php echo __('Keywords'); ?></label>
                                    <div class='col-sm-6'>
                                        <input type="text" class="form-control" name="keywords" placeholder="Keywords">
                                    </div>
                                 </div>
                                 <div class='form-group'>
                                    <label for='industry_id' class='col-sm-2 control-label'><?php echo __('Location'); ?></label>
                                    <div class='col-sm-6'>
                                        <select class="form-control" name="location_id">
                                            <?php foreach( $countries as $c ){ ?>
                                                <optgroup label="<?php echo $c->name; ?>">
                                                    <?php foreach( $c->states as $s ){ ?>
                                                        <option value="<?php echo $s->id; ?>"><?php echo $s->name; ?></option>
                                                    <?php } ?>
                                                </optgroup>
                                            <?php } ?>
                                        </select>
                                    </div>
                                 </div>
                                 <div class='form-group'>
                                    <label for='industry_group_id' class='col-sm-2 control-label'><?php echo __('Classification'); ?></label>
                                    <div class='col-sm-6'>
                                        <select class="form-control" name="industry_group_id" id="search-classification">
                                            <option value="0">-- Select Classification --</option>
                                            <?php foreach( $industryGroups as $key => $value ){ ?> 
                                                <option <?php echo( $default_industry_group_id == $key ? 'selected="selected"' : '' ); ?>  value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                 </div>
                                 <div class='form-group'>
                                    <label for='industry_id' class='col-sm-2 control-label'><?php echo __('Sub Classification'); ?></label>
                                    <div class='col-sm-6 sub-classification-container'>
                                        <select class="form-control" name="industry_id">
                                            <option>-- Select Sub classification --</option>
                                        </select>
                                    </div>
                                 </div>
                                 <div class='form-group'>
                                    <label for='industry_id' class='col-sm-2 control-label'><?php echo __('Work Type'); ?></label>
                                    <div class='col-sm-6'>
                                        <select class="form-control" name="work_type_id">
                                            <?php foreach( $workTypes as $key => $value ){ ?> 
                                                <option value="<?php echo $key ?>"><?php echo $value; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                 </div>
                                 <div class='form-group'>
                                    <label for='industry_id' class='col-sm-2 control-label'><?php echo __('Salary'); ?></label>
                                    <div class='col-sm-6'>
                                        <select class="form-control" name="salary_type_id">
                                            <?php foreach( $salaryTypes as $key => $value ){ ?> 
                                                <option value="<?php echo $key ?>"><?php echo $value; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                 </div>
                                 <div class='form-group'>
                                    <label for='industry_id' class='col-sm-2 control-label'><?php echo __('Minimum Salary'); ?></label>
                                    <div class='col-sm-6'>
                                        <input type="text" class="form-control" name="min_salary" placeholder="Minimum Salary">
                                    </div>
                                 </div>
                                 <div class='form-group'>
                                    <label for='industry_id' class='col-sm-2 control-label'><?php echo __('Maximum Salary'); ?></label>
                                    <div class='col-sm-6'>
                                        <input type="text" class="form-control" name="max_salary" placeholder="Maximum Salary">
                                    </div>
                                 </div>
                                <div class="form-group" style="margin-top: 10px;">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <div class="action-fixed-bottom">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                        </div>
                                    </div>
                                </div>
                             <?= $this->Form->end() ?>
        </div>
    </div>
</div>