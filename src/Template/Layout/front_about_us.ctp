<?php include('front_header.ctp'); ?>
<?php include('front_menu_wrapper.ctp'); ?>
<!-- CONTENT -->
<div class="papercrack-top">
	<img src="<?= $this->Url->build("/images/paper-crack.png") ?>">
</div>
<?php echo $this->fetch('content') ?>
<?php include('front_footer.ctp'); ?>