
<section class="content-header">
    <h1><?= __('View State') ?></h1>
</section>

<section class="content">   
    <table class="table table-striped table-bordered table-hover">
    <tbody>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($state->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Country') ?></th>
            <td><?= $state->has('country') ? $this->Html->link($state->country->name, ['controller' => 'Countries', 'action' => 'view', $state->country->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($state->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($state->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($state->modified) ?></td>
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
                <h3 class="panel-title"><?= __('Related Companies') ?></h3>
            </div>
        </div>        
        <?php if (!empty($state->companies)): ?>
        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Uid') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Phone') ?></th>
                <th><?= __('Fax') ?></th>
                <th><?= __('Photo') ?></th>
                <th><?= __('Address') ?></th>
                <th><?= __('Country Id') ?></th>
                <th><?= __('State Id') ?></th>
                <th><?= __('City') ?></th>
                <th><?= __('Zipcode') ?></th>
                <th><?= __('Registration') ?></th>
                <th><?= __('Entity Type Id') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Benefit') ?></th>
                <th><?= __('Free Post') ?></th>
                <th><?= __('Lock Free') ?></th>
                <th><?= __('Avail Credit') ?></th>
                <th><?= __('Lock Credit') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($state->companies as $companies): ?>
            <tr>
                <td><?= h($companies->id) ?></td>
                <td><?= h($companies->uid) ?></td>
                <td><?= h($companies->user_id) ?></td>
                <td><?= h($companies->name) ?></td>
                <td><?= h($companies->phone) ?></td>
                <td><?= h($companies->fax) ?></td>
                <td><?= h($companies->photo) ?></td>
                <td><?= h($companies->address) ?></td>
                <td><?= h($companies->country_id) ?></td>
                <td><?= h($companies->state_id) ?></td>
                <td><?= h($companies->city) ?></td>
                <td><?= h($companies->zipcode) ?></td>
                <td><?= h($companies->registration) ?></td>
                <td><?= h($companies->entity_type_id) ?></td>
                <td><?= h($companies->description) ?></td>
                <td><?= h($companies->benefit) ?></td>
                <td><?= h($companies->free_post) ?></td>
                <td><?= h($companies->lock_free) ?></td>
                <td><?= h($companies->avail_credit) ?></td>
                <td><?= h($companies->lock_credit) ?></td>
                <td><?= h($companies->created) ?></td>
                <td><?= h($companies->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller' => 'Companies', 'action' => 'view', $companies->id], ['class' => 'btn btn-info', 'escape' => false]) ?>

                    <?= $this->Html->link('<i class="fa fa-pencil"></i>', ['controller' => 'Companies', 'action' => 'edit', $companies->id], ['class' => 'btn btn-success', 'escape' => false]) ?>

                    <?= $this->Form->postLink('<i class="fa fa-trash"></i>', ['controller' => 'Companies', 'action' => 'delete', $companies->id], ['class' => 'btn btn-danger', 'escape' => false], ['confirm' => __('Are you sure you want to delete # {0}?', $companies->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>      
            </tbody>      
        </table>
    <?php endif; ?>
    </div>
</section>
