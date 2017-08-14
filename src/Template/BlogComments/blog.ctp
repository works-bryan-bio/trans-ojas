
<section class="content-header">
    <h1><?= __('Blog Comments') ?> : <?= $blog->title ?></h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo $base_url; ?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?= __('Blog Comments') ?></li>
    </ol>
</section>

<section class="content">
    <!-- Main Row -->
    <div class="row">
        <section class="col-lg-12 ">
            <div class="box " >                
                <div class="box-body">
                    <table id="dt-users-list" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('id') ?></th>
                                <th><?= $this->Paginator->sort('blog_id') ?></th>
                                <th><?= $this->Paginator->sort('name') ?></th>
                                <th><?= $this->Paginator->sort('email') ?></th>
                                <th style="width:50%;"><?= $this->Paginator->sort('comment') ?></th>
                                <th><?= $this->Paginator->sort('is_public') ?></th>
                                <th><?= $this->Paginator->sort('created') ?></th>                                                
                                <th class="actions" style="width:200px;"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($blogComments as $blogComment): ?>
                            <tr>
                                <td><?= $this->Number->format($blogComment->id) ?></td>
                                <td><?= $blogComment->has('blog') ? $this->Html->link($blogComment->blog->title, ['controller' => 'Blogs', 'action' => 'view', $blogComment->blog->id]) : '' ?></td>
                                <td><?= h($blogComment->name) ?></td>
                                <td><?= h($blogComment->email) ?></td>
                                <td><?= $blogComment->comment ?></td>
                                <td style="text-align:center;vertical-align:top;">
                                    <?php 
                                        if( $blogComment->is_public == 1 ){
                                            echo $this->Html->link('<i title="Set as Unpublish" class="fa fa-check"></i>','javascript:void(0);',['class' => 'btn btn-info btn-publish-update', 'update-id' => $blogComment->id, 'base-url' => $this->Url->build('/blog_comments/updatePublic', true), 'escape' => false]);
                                        }else{
                                            echo $this->Html->link('<i title="Set as Publish" class="fa fa-remove"></i>','javascript:void(0);',['class' => 'btn btn-danger btn-publish-update', 'update-id' => $blogComment->id, 'base-url' => $this->Url->build('/blog_comments/updatePublic', true), 'escape' => false]);
                                        }
                                    ?>                            
                                </td>                                
                                <td><?= h($blogComment->created) ?></td>                                
                                <td class="actions">
                                    <?= $this->Html->link('<i class="fa fa-eye"></i>', ['action' => 'view', $blogComment->id],['class' => 'btn btn-info','escape' => false]) ?>
                                    <?= $this->Html->link('<i class="fa fa-pencil"></i>', ['action' => 'edit', $blogComment->id],['class' => 'btn btn-success', 'escape' => false]) ?>
                                    <?= $this->Html->link('<i class="fa fa-trash"></i>', '#modal-'.$blogComment->id,['data-toggle' => 'modal', 'class' => 'btn btn-danger', 'escape' => false]) ?>
                                    <div id="modal-<?=$blogComment->id?>" class="modal fade">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                <h4 class="modal-title">Delete Confirmation</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p><?= __('Are you sure you want to delete selected entry?') ?></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" data-dismiss="modal" class="btn btn-default">No</button>
                                                <?= $this->Form->postLink(
                                                        'Yes',
                                                        ['action' => 'delete', $blogComment->id],
                                                        ['class' => 'btn btn-danger', 'escape' => false]
                                                    )
                                                ?>
                                            </div>
                                          </div>
                                        </div>                              
                                    </div>                                    
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    </div>
                    <div class="paginator" style="text-align:center;">
                        <ul class="pagination">
                        <?= $this->Paginator->prev('«') ?>
                            <?= $this->Paginator->numbers() ?>
                            <?= $this->Paginator->next('»') ?>
                        </ul>
                        <p class="hidden"><?= $this->Paginator->counter() ?></p>
                    </div>
                </div>
            </div>
            <!-- Popup Modal for updating Publish -->
            <a id="trigger-modal-btn" href="#modal-publish" data-toggle="modal" style="display:none;">#</a>
            <div id="modal-publish" class="modal fade">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Message</h4>
                    </div>
                    <div class="modal-body">
                        <div id="message-container"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
                    </div>
                  </div>
                </div>                              
            </div>
        </section>
    </div>
</section>