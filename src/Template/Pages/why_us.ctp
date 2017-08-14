<style>
.job-role-description{
	padding:10px;
	margin-top:10px;
}
.apply-for-job-search-inner p{
font-family: 'open sans';
font-size: 22px;
color: #3c3c3c !important;
font-weight: 400;
}
h2{
    font-family: dosis;
    font-weight: bold;
}
</style>
<?php use Cake\Utility\Inflector; ?>
<div class="apply-for-job-search">
    <div class="apply-for-job-search-inner">
        <div class="wrapper">
        	<section class="linden-section" style="background-color: white;">
				<div class="row">
					<div class="col-md-12">
						<div class="employer-title">
							<h2><?php echo $page_title; ?></h2>
						</div>
					</div>
				</div>
				<br/>
				<div style="position: relative;right: 20px;">
					<div class="row" style="position: relative;bottom: 60px;">
						<div class="col-md-12">
							<div class="col-md-8 left">
								<ul class="why-bullet why-theme">
								    <li><p class="why-text">We’re totally transparent – no smoke and mirrors – no fake jobs – no fake resumes – we like to keep it real and say it how it is...</p></li>
								</ul>
							</div>
							<div class="col-md-4 left">
							       <img src="<?= $this->Url->build("/images/why_banner_1a.png") ?>" style="width:63%;"/>
							</div>
						</div>
					</div>
					<div class="row" style="position: relative;bottom: 65px;">
						<div class="col-md-12">
							<div class="col-md-5 left">
							       <img src="<?= $this->Url->build("/images/why_banner_2.png") ?>" style="width:110%;"/>
							</div>
							<div class="col-md-7 left">
								<ul class="why-bullet why-theme">
								    <li><p class="why-text">We know IT – we don’t just know the IT industry and know where the talent lies. We’ve built servers, coded apps and employed IT people ourselves. We’re seasoned IT people, not fly-by-night recruiters..</p></li>
								</ul>
							</div>
						</div>
					</div>
					<br/>
					<div class="row" style="position: relative;bottom: 65px;">
						<div class="col-md-12">
							<div class="col-md-7 left">
								<ul class="why-bullet why-theme">
								    <li><p class="why-text">We’re big on emotional intelligence. Most IT positions require more than just skills, knowledge and experience.. being able to pick the emotionally intelligent ones is where we thrive.</p></li>
								</ul>
							</div>
							<div class="col-md-5 left">
							       <img src="<?= $this->Url->build("/images/why_banner_3.png") ?>" style="width:110%;"/>
							</div>
						</div>
					</div>
			</div>
			</section>
        </div>
    </div>
</div>
