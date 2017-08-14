<?php use Cake\Utility\Inflector; ?>
<style>
hr{
  margin-top:15px;
  margin-bottom:15px;
}
</style>
<script>
var BASE_URL = "<?php echo $base_url; ?>";
</script><!-- Main content -->
<section class="content">
  <!-- Info boxes -->  
  <div class="row">
    <div class="col-md-5">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Profile</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <div class="btn-group">
              <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-wrench"></i></button>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo $this->Url->build(['controller' => 'candidates', 'action' => 'edit_profile']); ?>">Edit Profile</a></li>
                <li><a href="<?php echo $this->Url->build(['controller' => 'candidates', 'action' => 'edit_job_roles']); ?>">Update Job Roles</a></li>
                <li><a href="<?php echo $this->Url->build(['controller' => 'candidates', 'action' => 'upload_resume']); ?>">Upload Resume</a></li>                            
              </ul>
            </div>            
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <strong><i class="fa fa-barcode margin-r-5"></i> Candidate ID</strong> : <?php echo $hdr_user_data->candidate->uid; ?>          
            <hr>
            <strong><i class="fa fa-file-text-o margin-r-5"></i> Resume</strong> : <a href="<?= $this->Url->build("/upload/files/resume/" . $hdr_user_data->candidate->id . "/" . $hdr_user_data->candidate->resume) ?>"><?php echo $hdr_user_data->candidate->resume; ?></a>          
            <hr>
            <strong><i class="fa fa-user margin-r-5"></i> Name</strong> : <?php echo $hdr_user_data->firstname . " " . $hdr_user_data->middlename . " " . $hdr_user_data->lastname; ?>          
            <hr>
            <strong><i class="fa fa-globe margin-r-5"></i> Email</strong> : <?php echo $hdr_user_data->candidate->email; ?>          
            <hr>
            <strong><i class="fa fa-calendar margin-r-5"></i> Birthdate</strong> : <?php echo $hdr_user_data->candidate->birthdate; ?>
            <p class="text-muted"></p>
            <hr>
            <strong><i class="fa fa-genderless margin-r-5"></i> Gender</strong> : <?php echo $hdr_user_data->candidate->gender; ?>          
            <hr>
            <strong><i class="fa fa-phone margin-r-5"></i> Contact No.</strong> : <?php echo $hdr_user_data->candidate->contact_no; ?>          
            <hr>
            <strong><i class="fa fa-map-marker margin-r-5"></i> Address</strong>
            <p class="text-muted"><?php echo $hdr_user_data->candidate->address; ?></p>
            <hr>
            <strong><i class="fa fa-pencil margin-r-5"></i> Interested in Job Roles</strong>
            <p>
              <?php foreach( $jobRoles as $jr ){ ?>
                <span class="label label-primary"><?php echo $jr->job_role->name; ?></span>
              <?php } ?>              
            </p>          
        </div>
        <!-- ./box-body -->        
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->

    <div class="col-md-7">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Latest Job Opportunities</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Opportunity ID</th>
                    <th>Title</th>                    
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach( $opportunities as $o ){ ?>
                    <tr>
                      <td><?php echo $o->uid; ?></td>
                      <td><?php echo $o->title; ?></td>
                      <td>
                        <?php $job_slug = Inflector::slug($o->title, "-"); ?>
                        <?= $this->Html->link('View Job Details', ['controller' => 'job_view', 'action' => $o->id . "/" . $job_slug],['target' => '_blank', 'class' => 'btn btn-info','escape' => false]) ?>                                    
                      </td>
                    </tr>
                  <?php } ?>                          
                  </tbody>
                </table>
              </div>
        </div>
        <!-- ./box-body -->        
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>  
  <!-- /.row -->
</section>
<!-- /.content -->
