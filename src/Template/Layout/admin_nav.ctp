<?php 
	$nav_selected = $this->NavigationSelector->selectedMainNavigation($nav_selected[0]);
	if (!empty($sub_nav_selected)) {
		$sub_nav_selected = $this->NavigationSelector->selectedSubNavigation($sub_nav_selected['parent'],$sub_nav_selected['child']);
	}else{
		$sub_nav_selected = array();
	}
	
?>
<aside class="left-side sidebar-offcanvas">
	<section class="sidebar">
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu">
			<li class="<?= $nav_selected["dashboard"] ?>">
				<?= $this->Html->link('<i class="fa fa-dashboard"></i> <span>' . __('Dashboard') . '</span> ',["controller" => "users", "action" => "dashboard"],["escape" => false]) ?>
			</li>
			<li class="<?= $nav_selected["patients"] ?>">
				<?= $this->Html->link('<i class="fa fa-user"></i> <span>' . __("Patient's Record") . '</span> ',["controller" => "patient", "action" => "index"],["escape" => false]) ?>
			</li>						
			<li class="<?= $nav_selected["payment_histories"] ?>">
				<?= $this->Html->link('<i class="fa fa-list-alt"></i> <span>' . __('Payment History') . '</span> ',["controller" => "payment_history", "action" => "index"],["escape" => false]) ?>
			</li>	
			<li class="<?= $nav_selected["appointments"] ?>">
				<?= $this->Html->link('<i class="fa fa-list-alt"></i> <span>' . __('Calendar Appointment') . '</span> ',["controller" => "calendar_appointment", "action" => "index"],["escape" => false]) ?>
			</li>
			<li class="<?= $nav_selected["settings"] ?>">
				<?= $this->Html->link('<i class="fa fa-list-alt"></i> <span>' . __('Settings') . '</span> ',["controller" => "settings", "action" => "index"],["escape" => false]) ?>
			</li>			
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>