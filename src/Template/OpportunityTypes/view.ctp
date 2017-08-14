
<section class="content-header">
    <h1><?= __('View Job Classification') ?></h1>
</section>

<section class="content">   
    <table class="table table-striped table-bordered table-hover">
    <tbody>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($opportunityType->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($opportunityType->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($opportunityType->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($opportunityType->modified) ?></td>
        </tr>
    </tbody>
    </table>

    <div class="form-group" style="margin-top: 80px;">
    <div class="col-sm-offset-2 col-sm-10">
        <div class="action-fixed-bottom">        
        <?= $this->Html->link('<i class="fa fa-angle-left"> </i> Back To list', ['action' => 'index'],['class' => 'btn btn-warning', 'escape' => false]) ?>
        </div>
    </div>
    </div>
    <div class="related">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?= __('Related Opportunities') ?></h3>
            </div>
        </div>        
        <?php if (!empty($opportunityType->opportunities)): ?>
        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Uid') ?></th>
                <th><?= __('Company Id') ?></th>
                <th><?= __('Opportunity Type Id') ?></th>
                <th><?= __('Title') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Requirements') ?></th>
                <th><?= __('Country Id') ?></th>
                <th><?= __('State Id') ?></th>
                <th><?= __('City') ?></th>
                <th><?= __('End Date') ?></th>
                <th><?= __('Opportunity Status Id') ?></th>
                <th><?= __('Publish Contact') ?></th>
                <th><?= __('Admin Remark') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Min Salary') ?></th>
                <th><?= __('Visit Count') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($opportunityType->opportunities as $opportunities): ?>
            <tr>
                <td><?= h($opportunities->id) ?></td>
                <td><?= h($opportunities->uid) ?></td>
                <td><?= h($opportunities->company_id) ?></td>
                <td><?= h($opportunities->opportunity_type_id) ?></td>
                <td><?= h($opportunities->title) ?></td>
                <td><?= h($opportunities->description) ?></td>
                <td><?= h($opportunities->requirements) ?></td>
                <td><?= h($opportunities->country_id) ?></td>
                <td><?= h($opportunities->state_id) ?></td>
                <td><?= h($opportunities->city) ?></td>
                <td><?= h($opportunities->end_date) ?></td>
                <td><?= h($opportunities->opportunity_status_id) ?></td>
                <td><?= h($opportunities->publish_contact) ?></td>
                <td><?= h($opportunities->admin_remark) ?></td>
                <td><?= h($opportunities->created) ?></td>
                <td><?= h($opportunities->modified) ?></td>
                <td><?= h($opportunities->min_salary) ?></td>
                <td><?= h($opportunities->visit_count) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller' => 'Opportunities', 'action' => 'view', $opportunities->id], ['class' => 'btn btn-info', 'escape' => false]) ?>

                    <?= $this->Html->link('<i class="fa fa-pencil"></i>', ['controller' => 'Opportunities', 'action' => 'edit', $opportunities->id], ['class' => 'btn btn-success', 'escape' => false]) ?>

                    <?= $this->Form->postLink('<i class="fa fa-trash"></i>', ['controller' => 'Opportunities', 'action' => 'delete', $opportunities->id], ['class' => 'btn btn-danger', 'escape' => false], ['confirm' => __('Are you sure you want to delete # {0}?', $opportunities->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>      
            </tbody>      
        </table>
    <?php endif; ?>
    </div>
</section>
