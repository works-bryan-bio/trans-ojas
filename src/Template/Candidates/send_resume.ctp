<div class="row">
  <div class="col-md-12">
    <div class="jobpost-title">
      <h2>Submit Resume</h2>
      <p>Lorem ipsum dolor sit amet, te eos essent intellegebat, vel del delectus iracundia</p>
    </div>

    <div class="member-register-form">
    <?php echo $this->Flash->render() ?>
    <?= $this->Form->create(null,['type' => 'file', 'id' => 'frm-submit-resume', 'data-toggle' => 'validator', 'role' => 'form','class' => 'form-horizontal']) ?>
      <!-- jobpost inputs -->
      <div class="member-register-input">
        <input type="text" name="full_name" required="" placeholder="Full Name">
      </div>

      <div class="member-register-input">
        <input type="email" name="email" required="" placeholder="Email">
      </div>

      <div class="member-register-input">
        <input type="text" name="contact_number" required="" placeholder="Contact Number">
      </div>

      <div class="attach-resume">
        <h4>Attach Resume *</h4>
        <input type="file" name="attachment" id="fileToUpload">
      </div>

      <div class="member-register-input">
        <h4>Comments</h4>
        <textarea name="comment"></textarea>
      </div>

      <div class="member-register-input">
        <input type="submit" name="" value="Submit">
      </div>
      <?= $this->Form->end() ?>
    </div>    
  </div>
</div>