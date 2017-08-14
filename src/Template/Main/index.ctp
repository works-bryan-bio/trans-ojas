<!-- CONTENT -->
<section class="home-content-section">
	<div class="home-content-section-inner">
		<div class="wrapper">
			<div class="row">
				<div class="col-md-12">
					<div class="illustration-image">
						<!-- <img src="images/illustration.png"> -->
						<div class="why-us-button">
							<a href="<?php echo $this->Url->build('/why_us'); ?>">Why Us?</a>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="home-titles">
									<a href="<?php echo $this->Url->build('/candidates/register'); ?>"><span>I'm looking for a</span> Job</a>
								</div>
							</div>
							<div class="col-md-6">
								<div class="transparency-vector">
									<img src="<?= $this->Url->build("/images/now-hiring.png") ?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="transparency-vector">
									<img src="<?= $this->Url->build("/images/smart-people.png") ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="home-titles">
									<a href="<?php echo $this->Url->build('/employers'); ?>"><span>I'm looking for talented</span> People</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</section>

<section class="transparent-nice-things">
	<div class="transparent-nice-things-inner">
		<div class="wrapper">
			<div class="nice-things-title">
				<h2>People say nice things about us!</h2>
			</div>
			<div class="row">



				<div class="col-md-1 left">
					<div class="owl-carousel-arrows">
						<a href="#" class="prev owl-custom-nav glyphicon glyphicon-chevron-left" onclick="return false;"></a>
					</div>
				</div>

				<div class="col-md-10 left">
					<div id="carousel-testimonials">
					<?php foreach( $testimonials as $t ){ ?>
						<div class="item">
							<div class="transparent-testimonial">
								<p><?php echo $t->content; ?><p>
								<h4><?php echo $t->name; ?></h4>
								<h5><?php echo $t->position; ?></h5>
							</div>
						</div>
					<?php } ?>				
					</div>
				</div>

				<div class="col-md-1 left">
					<div class="owl-carousel-arrows push-top">
							<a href="#" class="next owl-custom-nav glyphicon glyphicon-chevron-right" onclick="return false;" style="position:absolute;z-index:23;"></a>
					</div>
				</div>
			


			</div>
		</div>
	</div>
</section>