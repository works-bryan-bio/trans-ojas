<?php include('front_header.ctp'); ?>
<?php include('front_menu_wrapper.ctp'); ?>
<!-- CONTENT -->
<div class="papercrack-top">
	<img src="<?= $this->Url->build("/images/paper-crack.png") ?>">
</div>
<?php echo $this->fetch('content') ?>
<div class="paper-crack-bottom">
	<img src="<?= $this->Url->build("/images/paper-crack-bottom.png") ?>">
</div>
<?php include('front_footer.ctp'); ?>