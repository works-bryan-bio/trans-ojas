<style>
h3{
    padding:10px;
    background-color: #222D32;
    color:#ffffff;
}
</style>
<section class="content-header">
    <h1><?= __('View Opportunity') ?></h1>
    <ol class="breadcrumb">
        <li><?= $this->Html->link("<i class='fa fa-dashboard'></i>" . __("Home"), ['controller' => 'users', 'action' => 'dashboard'],['escape' => false]) ?></li>
        <li><?= $this->Html->link("<i class='fa fa-black-tie'></i>" . __('Opportunities'), ['controller' => 'users', 'action' => 'dashboard'],['escape' => false]) ?></li>
        <li class="active"><?= __('View') ?></li>
    </ol>
</section>

<section class="content">
    <!-- Main Row -->
    <div class="row">
        <section class="col-lg-12 ">
            <div class="box " >
                <div class="box-header">

                </div>
                <div class="box-body">
                    <h3>Opportunity Details</h3>
                    <table class="table table-striped table-bordered table-hover">
                        <tbody>
                            <tr>
                                <th><?= __('Opportunity ID') ?></th>
                                <td><?= h($opportunity->uid) ?></td>
                            </tr>        
                            <tr>
                                <th><?= __('Opportunity Type') ?></th>
                                <td><?= $opportunity->has('opportunity_type') ? $this->Html->link($opportunity->opportunity_type->name, ['controller' => 'OpportunityTypes', 'action' => 'view', $opportunity->opportunity_type->id]) : '' ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Title') ?></th>
                                <td><?= h($opportunity->title) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Country') ?></th>
                                <td><?= $opportunity->has('country') ? $this->Html->link($opportunity->country->name, ['controller' => 'Countries', 'action' => 'view', $opportunity->country->id]) : '' ?></td>
                            </tr>
                            <tr>
                                <th><?= __('State') ?></th>
                                <td><?= $opportunity->has('state') ? $this->Html->link($opportunity->state->name, ['controller' => 'States', 'action' => 'view', $opportunity->state->id]) : '' ?></td>
                            </tr>
                            <tr>
                                <th><?= __('City') ?></th>
                                <td><?= h($opportunity->city) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Opportunity Status') ?></th>
                                <td><?= $opportunity->has('opportunity_status') ? $this->Html->link($opportunity->opportunity_status->name, ['controller' => 'OpportunityStatuses', 'action' => 'view', $opportunity->opportunity_status->id]) : '' ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Id') ?></th>
                                <td><?= $this->Number->format($opportunity->id) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Industry') ?></th>
                                <td><?= $opportunity->industry->name ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Min Salary') ?></th>
                                <td><?= $this->Number->format($opportunity->min_salary) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Visit Count') ?></th>
                                <td><?= $this->Number->format($opportunity->visit_count) ?></td>
                            </tr>
                        <tr>
                            <th><?= __('Description') ?></th>
                            <td><?= $this->Text->autoParagraph($opportunity->description); ?></td>        
                        </tr>
                        <tr>
                            <th><?= __('Requirements') ?></th>
                            <td><?= $this->Text->autoParagraph(h($opportunity->requirements)); ?></td>        
                        </tr>
                        <tr>
                            <th><?= __('Admin Remark') ?></th>
                            <td><?= $this->Text->autoParagraph(h($opportunity->admin_remark)); ?></td>        
                        </tr>
                            <tr>
                                <th><?= __('End Date') ?></th>
                                <td><?= h($opportunity->end_date) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Created') ?></th>
                                <td><?= h($opportunity->created) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Modified') ?></th>
                                <td><?= h($opportunity->modified) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Publish Contact') ?></th>
                                <td><?= $opportunity->publish_contact ? __('Yes') : __('No'); ?></td>
                             </tr>
                        </tbody>
                    </table>
                    <h3>Selling Points</h3>
                    <?php foreach( $opportunity->opportunity_selling_points as $sp ){ ?>
                        <div class="col-sm-5" style="margin:10px;">
                            <input class="form-control" readonly="readonly" disabled="disabled" placeholder="Key Selling Points" value="<?php echo $sp->key_selling_points; ?>" />
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    </div>
</section>