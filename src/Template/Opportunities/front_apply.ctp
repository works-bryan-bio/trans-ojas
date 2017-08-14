<?php use Cake\Utility\Inflector; ?>
<style>
a{
    color:#5da5af;
    text-decoration: none;
}
</style>
<div class="apply-for-broker">
    <div class="apply-for-broker-inner">
        <div class="wrapper">
            <div class="broker-title">
                <h2>Apply for <?php echo $opportunity->title; ?></h2>
            </div>
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <div class="broker-form">
                        <table class="table">
                          <tbody>
                            <tr>
                              <th scope="row">Job Title:</th>
                              <td><?php echo $opportunity->title; ?></td>
                            </tr>
                            <tr>
                              <th scope="row">Job Type:</th>
                              <td><?php echo $opportunity->work_type->name; ?></td>
                            </tr>
                            <tr>
                              <th scope="row">Location:</th>
                              <td><?php echo $opportunity->country->name . " - " . $opportunity->location; ?></td>
                            </tr>
                            <tr>
                              <th scope="row">Industry:</th>
                              <td><?php echo $opportunity->industry->name; ?></td>
                            </tr>
                            <tr>
                              <th scope="row">Expertise:</th>
                              <td><?php echo $opportunity->opportunity_type->name; ?></td>
                            </tr>
                            <tr>
                              <th scope="row">Salary Type:</th>
                              <td><?php echo $opportunity->salary_type->name; ?></td>
                            </tr>
                            <tr>
                              <th scope="row">Salary:</th>
                              <td><?php echo $opportunity->salary_details_displayed; ?></td>
                            </tr>
                            <tr>
                              <th scope="row">Job Published:</th>
                              <td><?php echo $opportunity->created->format("Y-m-d"); ?></td>
                            </tr>
                            <tr>
                              <th scope="row">Job ID:</th>
                              <td><?php echo $opportunity->uid; ?></td>
                            </tr>
                            <?php if( $opportunity->publish_contact == 1 ){ ?>
                            <tr>
                              <th scope="row">Contact Name:</th>
                              <td><?php echo $opportunity->contact_name; ?></td>
                            </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="broker-application">
                        <?= $this->Form->create(null,['type' => 'file', 'id' => 'frm-candidate-apply', 'data-toggle' => 'validator', 'role' => 'form','class' => 'form-horizontal']) ?>                        
                            <!-- Uploads -->
                            <div class="broker-upload">
                                <h4>Upload Resume</h4>
                                <input type="file" name="fileToUploadResume" id="fileToUpload">
                                <small>File (doc,docx, pdf, rtf) must be less than 2MB</small>
                            </div>
                            <div class="broker-upload">
                                <h4>Upload Cover Letter (Optional)</h4>
                                <input type="file" name="fileToUploadCoverPhoto" id="fileToUpload">
                                <small>File (doc,docx, pdf, rtf) must be less than 2MB</small>
                            </div>


                            <!-- input broker info -->
                            <div class="broker-input">
                                <label>First Name</label>
                                <input type="text" name="firstname" placeholder="">
                            </div>
                            <div class="broker-input">
                                <label>Last Name</label>
                                <input type="text" name="lastname" placeholder="">
                            </div>
                            <div class="broker-input">
                                <label>Email</label>
                                <input type="text" name="email" placeholder="">
                            </div>
                            <div class="broker-input">
                                <label>Phone Number</label>
                                <input type="text" name="phone_number" placeholder="">
                            </div>
                            <div class="broker-input">
                                <label>My Postcode or Location</label>
                                <input type="text" name="postcode_location" placeholder="">
                            </div>
                            <div class="broker-input">
                                <label>Free Type Text Field</label>
                                <textarea name="free_text"></textarea>
                            </div>


                            <!-- SUBMIT FORM -->
                            <div class="broker-submit">
                                <input type="submit" name="" value="Submit">
                            </div>

                       <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>