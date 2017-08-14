
<section class="content-header">
    <h1><?= __('View Company') ?></h1>
</section>

<section class="content">   
    <table class="table table-striped table-bordered table-hover">
    <tbody>
        <tr>
            <th><?= __('Uid') ?></th>
            <td><?= h($company->uid) ?></td>
        </tr>
        <tr>
            <th><?= __('User Entity') ?></th>
            <td><?= $company->has('user_entity') ? $this->Html->link($company->user_entity->id, ['controller' => 'UserEntities', 'action' => 'view', $company->user_entity->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($company->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Phone') ?></th>
            <td><?= h($company->phone) ?></td>
        </tr>
        <tr>
            <th><?= __('Fax') ?></th>
            <td><?= h($company->fax) ?></td>
        </tr>
        <tr>
            <th><?= __('Photo') ?></th>
            <td><?= h($company->photo) ?></td>
        </tr>
        <tr>
            <th><?= __('Address') ?></th>
            <td><?= h($company->address) ?></td>
        </tr>
        <tr>
            <th><?= __('Country') ?></th>
            <td><?= $company->has('country') ? $this->Html->link($company->country->name, ['controller' => 'Countries', 'action' => 'view', $company->country->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('State') ?></th>
            <td><?= $company->has('state') ? $this->Html->link($company->state->name, ['controller' => 'States', 'action' => 'view', $company->state->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('City') ?></th>
            <td><?= h($company->city) ?></td>
        </tr>
        <tr>
            <th><?= __('Zipcode') ?></th>
            <td><?= h($company->zipcode) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($company->id) ?></td>
        </tr>
    <tr>
        <th><?= __('Description') ?></th>
        <td><?= $this->Text->autoParagraph(h($company->description)); ?></td>        
    </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($company->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($company->modified) ?></td>
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
        <?php if (!empty($company->opportunities)): ?>
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
                <th><?= __('Industry Id') ?></th>
                <th><?= __('Country Id') ?></th>
                <th><?= __('State Id') ?></th>
                <th><?= __('City') ?></th>
                <th><?= __('End Date') ?></th>
                <th><?= __('Opportunity Status Id') ?></th>
                <th><?= __('Publish Contact') ?></th>
                <th><?= __('Admin Remark') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Min Salary') ?></th>
                <th><?= __('Visit Count') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($company->opportunities as $opportunities): ?>
            <tr>
                <td><?= h($opportunities->id) ?></td>
                <td><?= h($opportunities->uid) ?></td>
                <td><?= h($opportunities->company_id) ?></td>
                <td><?= h($opportunities->opportunity_type_id) ?></td>
                <td><?= h($opportunities->title) ?></td>
                <td><?= h($opportunities->description) ?></td>
                <td><?= h($opportunities->requirements) ?></td>
                <td><?= h($opportunities->industry_id) ?></td>
                <td><?= h($opportunities->country_id) ?></td>
                <td><?= h($opportunities->state_id) ?></td>
                <td><?= h($opportunities->city) ?></td>
                <td><?= h($opportunities->end_date) ?></td>
                <td><?= h($opportunities->opportunity_status_id) ?></td>
                <td><?= h($opportunities->publish_contact) ?></td>
                <td><?= h($opportunities->admin_remark) ?></td>
                <td><?= h($opportunities->user_id) ?></td>
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
