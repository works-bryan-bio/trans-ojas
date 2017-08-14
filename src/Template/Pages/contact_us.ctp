<section class="register-content-section">
<div class="register-content-section-inner">
<div class="apply-for-job-search">
    <div class="apply-for-job-search-inner">
        <div class="wrapper">
          <div class="row">
            <div class="col-md-12">
              <div class="register-title">
                <h2>Contact Us</h2>      
              </div>    
              <div class="member-register-form">      
                <?php echo $this->Flash->render() ?>    
                <div class="col-md-7" style="float:left;">        
                  <form role="form" id="contactus-form">
                    <div class="contactus-msg"></div>
                    <div class="member-register-input">
                      <input type="text" name="name" required="" placeholder="Name">
                    </div>
                    <div class="member-register-input">
                      <input type="text" name="email" required="" placeholder="Email Address">
                    </div>
                    <div class="member-register-input">
                      <input type="text" name="phone" required="" placeholder="Contact Number">
                    </div>
                    <div class="member-register-input">
                      <select class="form-control" name="subject">
                        <option value="I'm looking to hire an IT person">I'm looking to hire an IT person</option>
                        <option value="I'm looking for an IT job">I'm looking for an IT job</option>
                        <option value="I'm looking for IT career advice">I'm looking for IT career advice</option>
                        <option value="I need to complete an IT Project urgently - can you help?">I need to complete an IT Project urgently - can you help?</option>
                        <option value="I need IT contractors or temps - urgently - please help">I need IT contractors or temps - urgently - please help</option>
                        <option value="We are outsourcing our IT, which MSP's should I talk to?">We are outsourcing our IT, which MSP's should I talk to?</option>
                      </select>
                    </div>

                    <div class="jobpost-text-area">              
                      <textarea name="message" placeholder="Message" style="width:100%;"></textarea>
                    </div>            
                    <br/>
                    <button type="submit" class="btn btn-primary btn-contactus-send">Send</button>
                  </form>
                </div>
                <div class="col-md-4" style="float:left;">  
                  <div class="map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3383.8206577128813!2d115.8538232157527!3d-31.992876831574304!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2a32a34da84b0735%3A0xe554450315f7e85e!2sTransparency+IT!5e0!3m2!1sen!2sph!4v1481582776447" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                  </div>
                </div>
              </div>

            </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>
