<div class="row">
  <div class="col-md-12">
    <div class="register-title">
      <h2>Forgot Password</h2>
      <p>Lorem ipsum dolor sit amet, te eos essent intellegebat, vel del delectus iracundia</p>
    </div>    
    <div class="member-register-form">
      <div class="register-form-title">
        <p>Enter your registered email address and we will send to you instructions on how to reset your password</p>
      </div>
      <?= $this->Flash->render() ?>
      <?= $this->Flash->render('auth') ?>
      <?= $this->Form->create(null,['class' => 'form-horizontal']) ?>
      <!-- register inputs -->      
      <div class="member-register-input">
        <input type="email" name="email" required="" placeholder="Email Address">
      </div>      
      <div class="member-submit">
        <input type="submit" name="" value="Send">
      </div>
      <?= $this->Form->end() ?>
      <div class="register-foot-note">
        <p>Lorem ipsum dolor sit amet, te eos essent intellegebat, vel delectus iracundia 
  voluptatum id.</p>
      </div>
    </div>
  </div>
  </div>