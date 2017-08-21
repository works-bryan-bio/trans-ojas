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
        <li id="users_nav" title="Users" class="<?= $nav_selected["pages"] ?>">
            <?= $this->Html->link('<i class="fa fa-globe"></i><span>' . __("Pages") . "</span>",["controller" => "pages", "action" => "index"],["escape" => false]) ?>
        </li>
        <li id="users_nav" title="Users" class="<?= $nav_selected["industries"] ?>">
            <?= $this->Html->link('<i class="fa fa-industry"></i><span>' . __("Industries") . "</span>",["controller" => "industries", "action" => "index"],["escape" => false]) ?>
        </li>
        <li id="users_nav" title="Users" class="<?= $nav_selected["companies"] ?>">
            <?= $this->Html->link('<i class="fa fa-building-o"></i><span>' . __("Companies") . "</span>",["controller" => "companies", "action" => "index"],["escape" => false]) ?>
        </li>
        <li id="users_nav" title="Users" class="<?= $nav_selected["opportunities"] ?>">
            <?= $this->Html->link('<i class="fa fa-black-tie"></i><span>' . __("Opportunities") . "</span>",["controller" => "opportunities", "action" => "index"],["escape" => false]) ?>
        </li>
        <li id="users_nav" title="Users" class="<?= $nav_selected["candidates"] ?>">
            <?= $this->Html->link('<i class="fa fa-user"></i><span>' . __("Candidates") . "</span>",["controller" => "candidates", "action" => "index"],["escape" => false]) ?>
        </li>
        <li id="users_nav" title="Users" class="<?= $nav_selected["blogs"] ?>">
            <?= $this->Html->link('<i class="fa fa-newspaper-o"></i><span>' . __("Blogs") . "</span>",["controller" => "blogs", "action" => "index"],["escape" => false]) ?>
        </li>
        <li id="users_nav" title="Users" class="<?= $nav_selected["blog_comments"] ?>">
            <?= $this->Html->link('<i class="fa fa-newspaper-o"></i><span>' . __("Blog Comments") . "</span>",["controller" => "blog_comments", "action" => "index"],["escape" => false]) ?>
        </li>     
        <li id="users_nav" title="Users" class="<?= $nav_selected["testimonials"] ?>">
            <?= $this->Html->link('<i class="fa fa-bullhorn"></i><span>' . __("Testimonials") . "</span>",["controller" => "testimonials", "action" => "index"],["escape" => false]) ?>
        </li>        
        <li id="users_nav" title="Users" class="<?= $nav_selected["slides"] ?>">
            <?= $this->Html->link('<i class="fa fa-image"></i><span>' . __("Slides") . "</span>",["controller" => "slides", "action" => "index"],["escape" => false]) ?>
        </li>     
        <li id="web_nav" title="Website" class="<?= $nav_selected["web"] ?>">
                <?= $this->Html->link('<i class="fa fa-globe"></i><span>' . __("Website") . "</span>",["controller" => "main", "action" => "index"],["target" => "_new", "escape" => false]) ?>
            </li>                  
        <li id="groups_nav" title="Groups" class="treeview <?= $nav_selected["system_settings"] ?>">
            <a href="#">
            <i class="fa fa-gear"></i> <span>System Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="users_nav" title="Users" class="<?= $nav_selected["blog_categories"] ?>">
                <?= $this->Html->link('<i class="fa fa-circle-o"></i><span>' . __("Blog Categories") . "</span>",["controller" => "blog_categories", "action" => "index"],["escape" => false]) ?>
            </li>    
            <li id="users_nav" title="Users" class="<?= $nav_selected["countries"] ?>">
                <?= $this->Html->link('<i class="fa fa-circle-o"></i><span>' . __("Countries") . "</span>",["controller" => "countries", "action" => "index"],["escape" => false]) ?>
            </li>    
            <li id="users_nav" title="Users" class="<?= $nav_selected["states"] ?>">
                <?= $this->Html->link('<i class="fa fa-circle-o"></i><span>' . __("States") . "</span>",["controller" => "states", "action" => "index"],["escape" => false]) ?>
            </li>    
            
            <li id="users_nav" title="Users" class="<?= $nav_selected["locations"] ?>">
                <?= $this->Html->link('<i class="fa fa-circle-o"></i><span>' . __("Locations") . "</span>",["controller" => "locations", "action" => "index"],["escape" => false]) ?>
            </li>
            <li id="users_nav" title="Users" class="<?= $nav_selected["areas"] ?>">
                <?= $this->Html->link('<i class="fa fa-circle-o"></i><span>' . __("Areas") . "</span>",["controller" => "areas", "action" => "index"],["escape" => false]) ?>
            </li>
            <li id="users_nav" title="Users" class="<?= $nav_selected["suburbs"] ?>">
                <?= $this->Html->link('<i class="fa fa-circle-o"></i><span>' . __("Suburbs") . "</span>",["controller" => "suburbs", "action" => "index"],["escape" => false]) ?>
            </li>

            <li id="users_nav" title="Users" class="<?= $nav_selected["opportunity_types"] ?>">
                <?= $this->Html->link('<i class="fa fa-circle-o"></i><span>' . __("Job Classifications") . "</span>",["controller" => "opportunity_types", "action" => "index"],["escape" => false]) ?>
            </li>            
            <li id="users_nav" title="Users" class="<?= $nav_selected["work_types"] ?>">
                <?= $this->Html->link('<i class="fa fa-circle-o"></i><span>' . __("Work Types") . "</span>",["controller" => "work_types", "action" => "index"],["escape" => false]) ?>
            </li> 
            <li id="users_nav" title="Users" class="<?= $nav_selected["job_roles"] ?>">
                <?= $this->Html->link('<i class="fa fa-circle-o"></i><span>' . __("Job Roles") . "</span>",["controller" => "job_roles", "action" => "index"],["escape" => false]) ?>
            </li>            
            <li id="users_nav" title="Users" class="<?= $nav_selected["salary_types"] ?>">
                <?= $this->Html->link('<i class="fa fa-circle-o"></i><span>' . __("Salary Types") . "</span>",["controller" => "salary_types", "action" => "index"],["escape" => false]) ?>
            </li>            
            <li id="users_nav" title="Users" class="<?= $nav_selected["industry_groups"] ?>">
                <?= $this->Html->link('<i class="fa fa-circle-o"></i><span>' . __("Industry Groups") . "</span>",["controller" => "industry_groups", "action" => "index"],["escape" => false]) ?>
            </li>     
            <li id="users_nav" title="Users" class="<?= $nav_selected["groups"] ?>">
                <?= $this->Html->link('<i class="fa fa-circle-o"></i><span>' . __("Groups") . "</span>",["controller" => "groups", "action" => "index"],["escape" => false]) ?>
            </li>  
            
          </ul>
        </li>           
      </ul>
    </section>    
</aside>