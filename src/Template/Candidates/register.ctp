<?php use Cake\Utility\Inflector; ?>
<style>
.job-table {
  padding:0px;
}
</style>
<!-- JOB LISTING -->
<section class="job-listing-section">
  <div class="job-listing-inner">
    <div class="listing-header">
      <div class="">
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <div class="papercrack-top">
              <img src="<?= $this->Url->build("/images/paper-crack.png") ?>">
            </div>
            <div class="listing-caption">
              <div class="wrapper">
                <h2>So you're looking for a job...</h2>
                <p><span class="employer-cursive">We serve</span> our candidates.. they appreciate the honest, transparent feedback we give them and advice on how to know their personal brand, grow their career and present themselves in the best possible light. We dont just source talented IT people, we ignite their passion. Please connect with us through this site and perhaps we can inspire you too.</p>
              </div>
            </div>
            <div class="paper-crack-bottom">
              <img src="<?= $this->Url->build("/images/paper-crack-bottom.png") ?>">
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="job-listing-table">
      <div class="wrapper">
        <div class="job-search">
          <div class="row">
            <div class="col-md-12 col-sm-12">
              <div class="job-search-title">
                <h4><a href="<?php echo $this->Url->build('/job_list'); ?>">Click Here</a> for our list of current jobs... or register with us below and tell us what jobs you are interested in. For career, cv, interview advice and much more, head to our blog page <a href="<?php echo $this->Url->build('/blog_list'); ?>">here</a> and click on the candidate category.</h4>
              </div>
            </div>            
          </div>
        </div>
      </div>
    </div>

    <div class="job-table">
      <div class="job-table-inner"></div>
    </div>
  </div>
</section>
<!-- JOB LISTING END -->





<div class="papercrack-top">
  <img src="<?= $this->Url->build("/images/paper-crack.png") ?>">
</div>

<section class="register-content-section">
  <div class="register-content-section-inner">
    <div class="wrapper">
      <div class="row">
        <div class="col-md-12">
          <div class="register-title">
            <h2>Register with us</h2>
            <p>To keep up to date with the latest jobs we have and to help us find the most relevant jobs for you, please register with us!</p>
          </div>
          <!-- <div class="linkedin-register">
            <button><span><i class="fa fa-linkedin" aria-hidden="true"></i></span> Sign in with Linkedin</button>
          </div> -->

          <div class="member-register-form">
            <div class="register-form-title">
              <h2>Login Details</h2>
            </div>
            <?php echo $this->Flash->render() ?>
            <?= $this->Form->create($candidate,['type' => 'file', 'id' => 'frm-default-add', 'data-toggle' => 'validator', 'role' => 'form','class' => 'form-horizontal']) ?>
            <!-- register inputs -->
            <div class="member-register-input">
              <input type="text" name="firstname" required="" placeholder="First Name">
            </div>
            <div class="member-register-input">
              <input type="text" name="lastname" required="" placeholder="Last Name">
            </div>
            <div class="member-register-input">
              <input type="email" name="email" required="" placeholder="Email Address">
            </div>
            <div class="member-register-input">
              <input type="password" name="password" required="" placeholder="Password">
            </div>
            <div class="member-register-input">
              <input type="password" name="repassword" required="" placeholder="Confirm Password">
            </div>
            <div class="member-register-input-file">
              <h4>Upload Resume</h4>
              <input type="file" name="attachment" id="fileToUpload">
            </div>
            <div class="member-register-input-check">
              <h5>I have worked at a Managed Service Provider looking after small and medium sized business.</h5>
              <label style="margin-right:10px;"><input type="checkbox" name="option_service_provider" id="option_service_provider_yes" value="Yes"> Yes</label> 
              <label><input type="checkbox" name="option_service_provider" id="option_service_provider_no" value="No"> No</label><br>
              <div class="option-free-text member-register-input hidden"><br><input type="text" id="input-service-provider" name="service_provider" placeholder="Which one?"></div>
            </div>

            <h5>Positions I'm interested in...</h5>
            <div class="member-register-roles">
              <ul class="position-desired">
                <?php foreach($jobRoles as $jr){ ?>
                    <li><label class="checkbox"><input name="jobRoles[<?php echo $jr->id; ?>]" type="checkbox" /><?php echo $jr->name; ?></label></li>
                <?php } ?>
              </ul>
            </div>

            <div class="member-submit">
              <input type="submit" name="" value="Register">              
              <input type="button" id="register-login-button" value="Login">
            </div>
            <?= $this->Form->end() ?>
            <div class="register-foot-note">
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="paper-crack-bottom">
  <img src="<?= $this->Url->build("/images/paper-crack-bottom.png") ?>">
</div>
<!-- CONTENT END -->
