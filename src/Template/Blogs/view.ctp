
<section class="content-header">
    <h1><?= __('View Blog') ?></h1>
</section>

<section class="content">   
    <table class="table table-striped table-bordered table-hover">
    <tbody>
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($blog->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Excerpt') ?></th>
            <td><?= h($blog->excerpt) ?></td>
        </tr>
        <tr>
            <th><?= __('Thumbnail') ?></th>
            <td><?= h($blog->thumbnail) ?></td>
        </tr>
        <tr>
            <th><?= __('Blog Category') ?></th>
            <td><?= $blog->has('blog_category') ? $this->Html->link($blog->blog_category->title, ['controller' => 'BlogCategories', 'action' => 'view', $blog->blog_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($blog->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Vcount') ?></th>
            <td><?= $this->Number->format($blog->vcount) ?></td>
        </tr>
    <tr>
        <th><?= __('Body') ?></th>
        <td><?= $this->Text->autoParagraph(h($blog->body)); ?></td>        
    </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($blog->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($blog->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('Publish') ?></th>
            <td><?= $blog->publish ? __('Yes') : __('No'); ?></td>
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
