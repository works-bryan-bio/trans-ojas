
<section class="content-header">
    <h1><?= __('View Blog Category') ?></h1>
</section>

<section class="content">   
    <table class="table table-striped table-bordered table-hover">
    <tbody>
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($blogCategory->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Thumbnail') ?></th>
            <td><?= h($blogCategory->thumbnail) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($blogCategory->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Sorting') ?></th>
            <td><?= $this->Number->format($blogCategory->sorting) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($blogCategory->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($blogCategory->modified) ?></td>
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
                <h3 class="panel-title"><?= __('Related Blogs') ?></h3>
            </div>
        </div>        
        <?php if (!empty($blogCategory->blogs)): ?>
        <table class="table table-striped table-bordered table-hover">
            <tbody>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Title') ?></th>
                <th><?= __('Excerpt') ?></th>
                <th><?= __('Body') ?></th>
                <th><?= __('Thumbnail') ?></th>
                <th><?= __('Blog Category Id') ?></th>
                <th><?= __('Vcount') ?></th>
                <th><?= __('Publish') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($blogCategory->blogs as $blogs): ?>
            <tr>
                <td><?= h($blogs->id) ?></td>
                <td><?= h($blogs->title) ?></td>
                <td><?= h($blogs->excerpt) ?></td>
                <td><?= h($blogs->body) ?></td>
                <td><?= h($blogs->thumbnail) ?></td>
                <td><?= h($blogs->blog_category_id) ?></td>
                <td><?= h($blogs->vcount) ?></td>
                <td><?= h($blogs->publish) ?></td>
                <td><?= h($blogs->created) ?></td>
                <td><?= h($blogs->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link('<i class="fa fa-eye"></i>', ['controller' => 'Blogs', 'action' => 'view', $blogs->id], ['class' => 'btn btn-info', 'escape' => false]) ?>

                    <?= $this->Html->link('<i class="fa fa-pencil"></i>', ['controller' => 'Blogs', 'action' => 'edit', $blogs->id], ['class' => 'btn btn-success', 'escape' => false]) ?>

                    <?= $this->Form->postLink('<i class="fa fa-trash"></i>', ['controller' => 'Blogs', 'action' => 'delete', $blogs->id], ['class' => 'btn btn-danger', 'escape' => false], ['confirm' => __('Are you sure you want to delete # {0}?', $blogs->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>      
            </tbody>      
        </table>
    <?php endif; ?>
    </div>
</section>
