<?php use Cake\Utility\Inflector; ?>
<?php 
    $nav_selected = $this->NavigationSelector->selectedMainNavigation($nav_selected[0]);
    if (!empty($sub_nav_selected)) {
        $sub_nav_selected = $this->NavigationSelector->selectedSubNavigation($sub_nav_selected['parent'],$sub_nav_selected['child']);
    }else{
        $sub_nav_selected = array();
    }
    
?>

<aside class="main-sidebar">    
    <section class="sidebar">      
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li id="users_nav" title="Users" class="<?= $nav_selected["dashboard"] ?>">
            <?= $this->Html->link('<i class="fa fa-dashboard"></i><span>' . __("Dashboard") . "</span>",["controller" => "users", "action" => "dashboard"],["escape" => false]) ?>
        </li>        
        <li id="users_nav" title="Users" class="<?= $nav_selected["opportunities"] ?>">
            <?= $this->Html->link('<i class="fa fa-black-tie"></i><span>' . __("Opportunities") . "</span>",["controller" => "opportunities", "action" => "index"],["escape" => false]) ?>
        </li>
        <li id="users_nav" title="Users" class="<?= $nav_selected["candidates"] ?>">
            <?= $this->Html->link('<i class="fa fa-user"></i><span>' . __("Candidates") . "</span>",["controller" => "candidates", "action" => "index"],["escape" => false]) ?>
        </li>        
        <li id="users_nav" title="Users" class="<?= $nav_selected["web"] ?>">
            <?= $this->Html->link('<i class="fa fa-globe"></i><span>' . __("Website") . "</span>",["controller" => "main", "action" => "index"],["escape" => false]) ?>
        </li>     
      </ul>
    </section>    
</aside>