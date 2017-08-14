
<section class="content-header">
    <h1><?= __('View Opportunity Selling Point') ?></h1>
</section>

<section class="content">   
    <table class="table table-striped table-bordered table-hover">
    <tbody>
        <tr>
            <th><?= __('Opportunity') ?></th>
            <td><?= $opportunitySellingPoint->has('opportunity') ? $this->Html->link($opportunitySellingPoint->opportunity->title, ['controller' => 'Opportunities', 'action' => 'view', $opportunitySellingPoint->opportunity->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($opportunitySellingPoint->id) ?></td>
        </tr>
    <tr>
        <th><?= __('Key Selling Points') ?></th>
        <td><?= $this->Text->autoParagraph(h($opportunitySellingPoint->key_selling_points)); ?></td>        
    </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($opportunitySellingPoint->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($opportunitySellingPoint->modified) ?></td>
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
