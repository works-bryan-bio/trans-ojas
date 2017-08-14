<style>
.sp-list{    
    margin-left: 15px;
    padding: 0px;
}
</style>
<section class="content-header">
    <h1><?= __('Opportunities') ?></h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo $base_url; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?= __('Opportunities') ?></li>
    </ol>
</section>

<section class="content">
    <!-- Main Row -->
    <div class="row">
        <section class="col-lg-12 ">
            <div class="box " >
                <div class="box-header">
                    <?= $this->Html->link(__('Add New Opportunity'), ['action' => 'add'], ['class' => 'btn btn-primary btn-sm', 'escape' => false]) ?>
                    <h3 class="box-title text-black" ></h3>
                </div>
                <div class="box-body">
                    <table id="dt-users-list" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('id') ?></th>
                                <th><?= $this->Paginator->sort('uid') ?></th>                                                
                                <th><?= $this->Paginator->sort('industry_id') ?></th>
                                <th><?= $this->Paginator->sort('opportunity_type_id', __('Job Classification')) ?></th>
                                <th><?= $this->Paginator->sort('title') ?></th>
                                <th><?= $this->Paginator->sort('work_type_id', __('Work Type')) ?></th>                                
                                <th><?= $this->Paginator->sort('salary_type_id', __('Salary Type')) ?></th>
                                <th>Selling Points</th>
                                <th><?= $this->Paginator->sort('country_id') ?></th>
                                <th><?= $this->Paginator->sort('end_date') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($opportunities as $opportunity): ?>
                            <tr>
                                <td><?= $this->Number->format($opportunity->id) ?></td>
                                <td><?= h($opportunity->uid) ?></td>                                                
                                <td><?= $opportunity->industry->name ?></td>
                                <td><?= $opportunity->has('opportunity_type') ? $this->Html->link($opportunity->opportunity_type->name, ['controller' => 'OpportunityTypes', 'action' => 'view', $opportunity->opportunity_type->id]) : '' ?></td>
                                <td><?= h($opportunity->title) ?></td>
                                <td><?= h($opportunity->work_type->name) ?></td>
                                <td><?= h($opportunity->salary_type->name) ?></td>
                                <td>
                                    <ul class="sp-list">
                                    <?php 
                                        $ar_sp = array();
                                        foreach($opportunity->opportunity_selling_points as $sp){
                                            echo "<li>" . $sp->key_selling_points . "</li>";
                                        }
                                    ?>
                                    </ul>
                                </td>
                                <td><?= $opportunity->has('country') ? $this->Html->link($opportunity->country->name, ['controller' => 'Countries', 'action' => 'view', $opportunity->country->id]) : '' ?></td>
                                <td style="text-align:center;">
                                    <?php     
                                        $end_date = date("Y-m-d",strtotime($opportunity->end_date));
                                        if( $end_date == '1970-01-01' ){
                                            echo "-";
                                        }else{
                                            echo date("Y-m-d",strtotime($opportunity->end_date));                                            
                                        }
                                    ?>
                                </td>
                                <td class="actions">
                                    <?= $this->Html->link('<i class="fa fa-eye"></i>', ['action' => 'view', $opportunity->id],['class' => 'btn btn-info','escape' => false]) ?>
                                    <?= $this->Html->link('<i class="fa fa-pencil"></i>', ['action' => 'edit', $opportunity->id],['class' => 'btn btn-success', 'escape' => false]) ?>
                                    <?= $this->Html->link('<i class="fa fa-trash"></i>', '#modal-'.$opportunity->id,['data-toggle' => 'modal', 'class' => 'btn btn-danger', 'escape' => false]) ?>
                                    <div id="modal-<?=$opportunity->id?>" class="modal fade">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title">Delete Confirmation</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p><?= __('Are you sure you want to delete selected entry?') ?></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" data-dismiss="modal" class="btn btn-default">No</button>
                                                <?= $this->Form->postLink(
                                                        'Yes',
                                                        ['action' => 'delete', $opportunity->id],
                                                        ['class' => 'btn btn-danger', 'escape' => false]
                                                    )
                                                ?>
                                            </div>
                                          </div>
                                        </div>                              
                                    </div>                                    
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>                    
                    <div class="paginator" style="text-align:center;">
                        <ul class="pagination">
                        <?= $this->Paginator->prev('«') ?>
                            <?= $this->Paginator->numbers() ?>
                            <?= $this->Paginator->next('»') ?>
                        </ul>
                        <p class="hidden"><?= $this->Paginator->counter() ?></p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>