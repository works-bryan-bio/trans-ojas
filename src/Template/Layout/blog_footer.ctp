<!-- FOOTER -->
<section class="transparency-footer">
  <div class="transparency-footer-inner">
    <div class="wrapper">
      <div class="row">
        <div class="col-md-6 col-xs-12">
          <div class="footer-contacts">
            <div class="footer-contacts-title">
              <h2>stay in touch...</h2>
            </div>
            <div class="contact-information">
              <ul>
                <li class="phone-number"><i class="fa fa-phone" aria-hidden="true"></i>1300 70 40 55</li>
                <li class="address"><i class="fa fa-home" aria-hidden="true"></i>Suite 9, 125 Melville Parade Como Western Australia 6152</li>
                <li class="email-add"><i class="fa fa-envelope" aria-hidden="true"></i>jobs@transparencyit.com</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-xs-12">
          <div class="social-media-section">
            <div class="footer-logo">
              <img src="<?= $this->Url->build("/images/transparency-footer-logo.png") ?>">
            </div>
            <div class="social-media-icons">
              <ul>
                <li>
                  <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                </li>
                <li>
                  <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                </li>
                <!-- <li>
                  <a href="#"><i class="fa fa-tumblr" aria-hidden="true"></i></a>
                </li> -->
                <li>
                  <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="copyright-section">
            <p style="text-align:center;">© <a href="#">2017 Transparency IT Consulting</a> (ABN 44 131 923 469)<br/>All rights Reserved</p>
          </div>
        </div>  
      </div>
    </div>
  </div>
</section>
<?php 
  echo $this->Html->script('bootstrap/js/bootstrap.min.js');
  echo $this->Html->script('themeA/jquery-1.11.1.js');
  echo $this->Html->script('themeA/java.js');
  echo $this->Html->script('plugins/datepicker/bootstrap-datepicker.js');
  echo $this->Html->script('owlcarousel/owl.carousel.min.js');
?>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = '//transparencyit.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

<script type="text/javascript">  
var base_url = "<?= $base_url; ?>";
  $(function () {   
    $('#login-trigger').click(function(){
      $(this).next('#login-content').slideToggle();
      $(this).toggleClass('active');          
      
      if ($(this).hasClass('active')) {
        $(this).find('span').html('&#x25B2;');
        $('#login-content').removeClass("hide");
        $('#login-content').addClass("show");
        $('#login-trigger').removeClass("login-off");        
        $('#login-trigger').addClass("login-on");
      }
      else { 
        $(this).find('span').html('&#x25BC;');
        $('#login-content').removeClass("show");
        $('#login-content').removeClass("hide");
        $('#login-trigger').addClass("login-off");        
        $('#login-trigger').removeClass("login-on");
      }
    }); 
    //Testimonials 
    $("#carousel-testimonials").owlCarousel({
      autoPlay: 3000,
      items : 3
    });

    // Custom Navigation Events
    $("a.next").click(function() {
        $("#carousel-testimonials").trigger('owl.next');
    });
  
    $("a.prev").click(function() {
        $("#carousel-testimonials").trigger('owl.prev');
    });

    //Job search classification
    $("#search-classification").change(function(){
      var selected_classification = $(this).val();

      $.ajax({
         type: "GET",         
         url: base_url + 'opportunities/ajax_load_sub_classifications',               
         data: {industry_id:selected_classification}, 
         beforeSend: function() {            
          $(".sub-classification-container").html("<small>loading...</small>");
        },
         success: function(o)
         {
            $(".sub-classification-container").html(o);        
         }
      });
    });

    //Date picker       
    $('.default-datepicker').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
    });

    $("#contactus-form").submit(function(e){        
        var url = base_url + "pages/ajax_email_inquiry";
        $.ajax({
           type: "POST",
           dataType: "json",
           url: url,               
           data: $("#contactus-form").serialize(), 
           beforeSend: function() {            
            $(".btn-contactus-send").text("Sending...");
            $(".btn-contactus-send").attr('disabled', true);             
          },
           success: function(o)
           {
              if( o.is_success ){       
                $(".contact-input").val("");            
                $("#contactus-form").html(o.message);
              }else{                
                $(".contactus-msg").html(o.message);
              }     
              $(".btn-contactus-send").removeAttr('disabled');                
              $(".btn-contactus-send").text("Send");         
           }
        }); 
        e.preventDefault();
    });
    
  });
</script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5888c170ad57a5f0"></script>
</body>
</html>