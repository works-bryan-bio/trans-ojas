
<section class="content-header">
    <h1><?= __('View Featured Company') ?></h1>
</section>

<section class="content">   
    <table class="table table-striped table-bordered table-hover">
    <tbody>
        <tr>
            <th><?= __('Cover') ?></th>
            <td><?= h($featuredCompany->cover) ?></td>
        </tr>
        <tr>
            <th><?= __('Website') ?></th>
            <td><?= h($featuredCompany->website) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($featuredCompany->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Entity Id') ?></th>
            <td><?= $this->Number->format($featuredCompany->entity_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Sorting') ?></th>
            <td><?= $this->Number->format($featuredCompany->sorting) ?></td>
        </tr>
        <tr>
            <th><?= __('Vcount') ?></th>
            <td><?= $this->Number->format($featuredCompany->vcount) ?></td>
        </tr>
    <tr>
        <th><?= __('Map') ?></th>
        <td><?= $this->Text->autoParagraph(h($featuredCompany->map)); ?></td>        
    </tr>
    <tr>
        <th><?= __('Value') ?></th>
        <td><?= $this->Text->autoParagraph(h($featuredCompany->value)); ?></td>        
    </tr>
    <tr>
        <th><?= __('Gallery') ?></th>
        <td><?= $this->Text->autoParagraph(h($featuredCompany->gallery)); ?></td>        
    </tr>
    <tr>
        <th><?= __('Testimonial') ?></th>
        <td><?= $this->Text->autoParagraph(h($featuredCompany->testimonial)); ?></td>        
    </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($featuredCompany->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($featuredCompany->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('Hide') ?></th>
            <td><?= $featuredCompany->hide ? __('Yes') : __('No'); ?></td>
         </tr>
        <tr>
            <th><?= __('Publish') ?></th>
            <td><?= $featuredCompany->publish ? __('Yes') : __('No'); ?></td>
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
