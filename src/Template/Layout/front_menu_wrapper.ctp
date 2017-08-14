<section class="transparency-header">
    <div class="transparency-header-inner">
        <div class="wrapper">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <div class="logo">
                        <img src="<?= $this->Url->build("/images/transparency-logo.png") ?>">
                    </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="transparency-tel-number">
                        <!-- <h2><span>TEL:</span> 1300 70 40 55</h2> -->
                        <p style="text-align:right;">A boutique IT recruitment agency based in Australia, selecting, tracking and nurturing IT talent for IT companies and forward thinking IT Departments.</p>
                    </div>
                </div>
            </div>
            <div class="transparency-menu">
                <div class="row">
                    <div class="col-md-12">
                        <div class="menu-area">
                            <ul class="menu-list">
                                <li>
                                    <a href="<?php echo $this->Url->build("/"); ?>">Home</a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->Url->build("/candidates/register"); ?>">Candidates</a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->Url->build("/job_list"); ?>">Jobs</a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->Url->build("/employers"); ?>">Employers</a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->Url->build("/blog_list"); ?>">Blog</a>
                                </li>                                
                                <li>
                                    <a href="<?php echo $this->Url->build("/why_us"); ?>">Why Us</a>
                                </li>                                
                                <li>
                                    <a href="<?php echo $this->Url->build("/about_us"); ?>">About Us</a>
                                </li>
                                <li>
                                    <a href="<?php echo $this->Url->build("/contact_us"); ?>">Contact</a>
                                </li>
                                <li class="last-menu-item">
                                    <?php if( !$is_logged ){ ?>
                                    <a id="login-trigger" class="login-off" style="" href="#">Login<span>▼</span></a>
                                     <div id="login-content" class="hide" style="position: absolute;top: 24px;background-color: #1475C2;padding: 20px;">                                        
                                        <?= $this->Form->create(null,[                          
                                            'url' => ['controller' => 'users','action' => 'login'],
                                            'id' => 'login-input',
                                            'type' => 'POST'
                                        ]) ?>
                                          <fieldset id="inputs">
                                            <input id="username" type="email" class="form-control" name="username" placeholder="Your email address" required style="margin-bottom:10px;">   
                                            <input id="password" type="password" name="password" class="form-control" placeholder="Password" required style="margin-bottom:10px;">
                                          </fieldset>
                                          <fieldset id="actions">
                                            <input type="submit" id="submit" value="Log in">
                                          </fieldset>
                                        <?= $this->Form->end() ?>
                                  </div>                                            
                                  <?php }else{ ?>
                                    <a href="<?php echo $this->Url->build("/users/dashboard"); ?>">Dashboard</a>
                                  <?php } ?>
                                </li>
                            </ul>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</section>