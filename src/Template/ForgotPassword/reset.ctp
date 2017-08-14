<div class="row">
  <div class="col-md-12">
    <div class="register-title">
      <h2>Reset Password</h2>
      <p>Lorem ipsum dolor sit amet, te eos essent intellegebat, vel del delectus iracundia</p>
    </div>    
    <div class="member-register-form">
      <?= $this->Flash->render() ?>
      <?= $this->Flash->render('auth') ?>
      <?php if( $is_code_valid ){ ?>
        <?= $this->Form->create(null,['class' => 'form-horizontal']) ?>
          <div class="member-register-input">
            <input type="password" name="password" required="" placeholder="New Password">
          </div>      
          <div class="member-register-input">
            <input type="password" name="repassword" required="" placeholder="Confirm Password">
          </div>      
          <div class="member-submit">
            <input type="submit" name="" value="Submit">
          </div>
        <?= $this->Form->end() ?>
      <?php } ?>
      <div class="register-foot-note">
        <p>Lorem ipsum dolor sit amet, te eos essent intellegebat, vel delectus iracundia 
  voluptatum id.</p>
      </div>
    </div>
  </div>
  </div>