
<section class="content-header">
    <h1><?= __('View Candidate Job Role') ?></h1>
</section>

<section class="content">   
    <table class="table table-striped table-bordered table-hover">
    <tbody>
        <tr>
            <th><?= __('Candidate') ?></th>
            <td><?= $candidateJobRole->has('candidate') ? $this->Html->link($candidateJobRole->candidate->id, ['controller' => 'Candidates', 'action' => 'view', $candidateJobRole->candidate->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Job Role') ?></th>
            <td><?= $candidateJobRole->has('job_role') ? $this->Html->link($candidateJobRole->job_role->name, ['controller' => 'JobRoles', 'action' => 'view', $candidateJobRole->job_role->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($candidateJobRole->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($candidateJobRole->created) ?></td>
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
