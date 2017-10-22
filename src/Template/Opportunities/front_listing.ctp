<?php use Cake\Utility\Inflector; ?>
<?php use Cake\Utility\Text; ?>
<div class="apply-for-job-search">
    <div class="apply-for-job-search-inner">
        <div class="wrapper">
            <div class="job-search-title">
                <h2>Job Search</h2>
            </div>

            <!-- search form -->
            <div class="search-form">
                <?= $this->Form->create(null,[                          
                    'url' => ['controller' => 'job_list','action' => 'search'],
                    'class' => 'form-horizontal',
                    'type' => 'GET'
                ]) ?>
                    <div class="row">
                        <div class="col-md-10 col-xs-12">
                            <div class="row">
                                <div class="col-md-6 col-xs-12">
                                    <div class="search-jobs">
                                        <input type="text" name="job_query" placeholder="Job Title Search">
                                    </div>
                                </div>
                                <div class="col-md-6 col-xs-12">
                                    <div class="search-job-location">
                                        <select name="job_location">
                                          <option value="">Job Location..</option>
                                          <?php foreach( $states as $key => $value ){ ?>
                                            <option value="<?php echo $key; ?>"><?php echo $value ?></option>
                                          <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-xs-12">
                            <div class="button-search">
                                <button type="submit">Search</button>                                
                            </div>
                        </div>
                    </div>
                </form>
            </div>


            <!-- SKIP QUEUE -->
            <div class="skip-submit">
                <a href="<?php echo $this->Url->build('/job_list/advance_search'); ?>"><button>Advanced Search</button></a>
            </div>
            <!-- SKIP QUEUE -->
            <div class="skip-submit">
                <a href="<?php echo $this->Url->build('/submit_resume'); ?>"><button>I just want to submit my resume</button></a>
            </div>


            <!-- SEARCH CONTAINER -->
            <div class="search-container">

                <!-- Search Result -->
                <?php foreach( $opportunities as $opportunity ){ ?>
                    <div class="search-result">
                        <div class="row">
                            <div class="col-md-8 col-xs-12">
                                <h4><?php echo $opportunity->title; ?></h4>
                                <?php echo $opportunity->requirements; ?>                                  
                            </div>                        
                            <div class="col-md-4 col-xs-12">
                                <div class="job-search-components">
                                    <table class="table">
                                      <tbody>
                                        <tr>
                                          <th scope="row">Location:</th>
                                          <td><?php echo $opportunity->country->name; ?></td>
                                        </tr>
                                        <tr>
                                          <th scope="row">Job Type:</th>
                                          <td><?php echo $opportunity->work_type->name; ?></td>
                                        </tr>
                                        <?php if( $opportunity->display_salary_on_ads == 1 ){ ?>
                                            <tr>
                                              <th scope="row">Salary:</th>
                                              <td><?php echo $opportunity->salary_details_displayed; ?></td>
                                            </tr>
                                        <?php } ?>                                        
                                      </tbody>
                                    </table>
                                    <div class="search-component-read-more">
                                        <?php 
                                            $job_slug = Inflector::slug($opportunity->title, "-")
                                        ?>
                                        <?= $this->Html->link('Read More', ['controller' => 'job_view', 'action' => $opportunity->id . "/" . $job_slug],['class' => 'job-read-more','escape' => false]) ?>                                   
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            
        </div>
    </div>
</div>