<?php include('front_header.ctp'); ?>
<?php include('front_menu_wrapper_b.ctp'); ?>
<section class="job-listing-section">
	<div class="job-listing-inner">
		<div class="listing-header">
			<div class="">
				<div class="row">
					<div class="col-md-4 col-sm-12">
						<div class="listing-menu">
							<ul>
								<li><a href="<?php echo $this->Url->build(['controller' => 'submit_resume']); ?>">Submit Resume</a></li>
								<li><a href="<?php echo $this->Url->build(['controller' => 'member_login']); ?>">Member Login</a></li>
								<li><a href="<?php echo $this->Url->build(['controller' => 'candidates', 'action' => 'register']); ?>">Register with us</a></li>
								<li><a href="<?php echo $this->Url->build(['controller' => 'job_list', 'action' => 'search']); ?>">Advance Search</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-8 col-sm-12">
						<div class="papercrack-top">
							<img src="<?= $this->Url->build("/images/paper-crack-b.png") ?>">
						</div>
						<div class="listing-caption">
							<h2>So you're looking for a job...</h2>
							<p>We serve our candidates.. they appreciate the honest, transparent feedback we give them and advice on how to know their personal brand, grow their career and present themselves in the best possible light. We dont just source talented IT people, we ignite their passion. Please connect with us through this site and perhaps we can inspire you too.</p>
						</div>
						<div class="paper-crack-bottom">
							<img src="<?= $this->Url->build("/images/paper-crack-bottom-b.png") ?>">
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php echo $this->fetch('content') ?>
	</div>
</section>
<?php include('front_footer.ctp'); ?>