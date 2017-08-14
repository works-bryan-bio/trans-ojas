
<section class="content-header">
    <h1><?= __('View Industry Group') ?></h1>
</section>

<section class="content">   
    <table class="table table-striped table-bordered table-hover">
    <tbody>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($industryGroup->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Slug') ?></th>
            <td><?= h($industryGroup->slug) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($industryGroup->id) ?></td>
        </tr>
    <tr>
        <th><?= __('Content') ?></th>
        <td><?= $this->Text->autoParagraph(h($industryGroup->content)); ?></td>        
    </tr>
    <tr>
        <th><?= __('Meta Title') ?></th>
        <td><?= $this->Text->autoParagraph(h($industryGroup->meta_title)); ?></td>        
    </tr>
    <tr>
        <th><?= __('Meta Keywords') ?></th>
        <td><?= $this->Text->autoParagraph(h($industryGroup->meta_keywords)); ?></td>        
    </tr>
    <tr>
        <th><?= __('Meta Description') ?></th>
        <td><?= $this->Text->autoParagraph(h($industryGroup->meta_description)); ?></td>        
    </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($industryGroup->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($industryGroup->modified) ?></td>
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
                <h3 class="panel-title"><?= __('Related Industries') ?></h3>
            </div>
        </div>        
        <?php if (!empty($industryGroup->industries)): ?>
        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Industry Group Id') ?></th>
                <th><?= __('Content') ?></th>
                <th><?= __('Meta Title') ?></th>
                <th><?= __('Meta Keywords') ?></th>
                <th><?= __('Meta Description') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($industryGroup->industries as $industries): ?>
            <tr>
                <td><?= h($industries->id) ?></td>
                <td><?= h($industries->name) ?></td>
                <td><?= h($industries->industry_group_id) ?></td>
                <td><?= h($industries->content) ?></td>
                <td><?= h($industries->meta_title) ?></td>
                <td><?= h($industries->meta_keywords) ?></td>
                <td><?= h($industries->meta_description) ?></td>
                <td><?= h($industries->created) ?></td>
                <td><?= h($industries->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller' => 'Industries', 'action' => 'view', $industries->id], ['class' => 'btn btn-info', 'escape' => false]) ?>

                    <?= $this->Html->link('<i class="fa fa-pencil"></i>', ['controller' => 'Industries', 'action' => 'edit', $industries->id], ['class' => 'btn btn-success', 'escape' => false]) ?>

                    <?= $this->Form->postLink('<i class="fa fa-trash"></i>', ['controller' => 'Industries', 'action' => 'delete', $industries->id], ['class' => 'btn btn-danger', 'escape' => false], ['confirm' => __('Are you sure you want to delete # {0}?', $industries->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>      
            </tbody>      
        </table>
    <?php endif; ?>
    </div>
</section>
