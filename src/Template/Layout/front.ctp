<?php include('front_header.ctp'); ?>
<?php include('front_menu_wrapper.ctp'); ?>
<div class="papercrack-top">
	<img src="<?= $this->Url->build("/images/paper-crack.png") ?>">
</div>
<div class="register-box">
  <?php echo $this->Flash->render() ?>
  <?php echo $this->fetch('content') ?>
</div>
<?php include('front_footer.ctp'); ?>