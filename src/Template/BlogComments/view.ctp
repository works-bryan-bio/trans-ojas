
<section class="content-header">
    <h1><?= __('View Blog Comment') ?></h1>
</section>

<section class="content">   
    <table class="table table-striped table-bordered table-hover">
    <tbody>
        <tr>
            <th><?= __('Blog') ?></th>
            <td><?= $blogComment->has('blog') ? $this->Html->link($blogComment->blog->title, ['controller' => 'Blogs', 'action' => 'view', $blogComment->blog->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($blogComment->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($blogComment->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($blogComment->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Is Public') ?></th>
            <td><?= $this->Number->format($blogComment->is_public) ?></td>
        </tr>
    <tr>
        <th><?= __('Website') ?></th>
        <td><?= $this->Text->autoParagraph(h($blogComment->website)); ?></td>        
    </tr>
    <tr>
        <th><?= __('Comment') ?></th>
        <td><?= $this->Text->autoParagraph(h($blogComment->comment)); ?></td>        
    </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($blogComment->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($blogComment->modified) ?></td>
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
