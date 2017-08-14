
<section class="content-header">
    <h1><?= __('View Industry') ?></h1>
</section>

<section class="content">   
    <table class="table table-striped table-bordered table-hover">
    <tbody>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($industry->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Industry Group') ?></th>
            <td><?= $industry->has('industry_group') ? $this->Html->link($industry->industry_group->name, ['controller' => 'IndustryGroups', 'action' => 'view', $industry->industry_group->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($industry->id) ?></td>
        </tr>
    <tr>
        <th><?= __('Content') ?></th>
        <td><?= $this->Text->autoParagraph(h($industry->content)); ?></td>        
    </tr>
    <tr>
        <th><?= __('Meta Title') ?></th>
        <td><?= $this->Text->autoParagraph(h($industry->meta_title)); ?></td>        
    </tr>
    <tr>
        <th><?= __('Meta Keywords') ?></th>
        <td><?= $this->Text->autoParagraph(h($industry->meta_keywords)); ?></td>        
    </tr>
    <tr>
        <th><?= __('Meta Description') ?></th>
        <td><?= $this->Text->autoParagraph(h($industry->meta_description)); ?></td>        
    </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($industry->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($industry->modified) ?></td>
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
</section>
