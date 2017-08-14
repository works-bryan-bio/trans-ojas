
<div class="modal fade" id="editGroupModal-<?= $g->id ?>" tabindex="-1" role="dialog" aria-labelledby="addGroupModalLabel">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="addGroupModalLabel">Edit Group</h4>
            </div>
            <?= $this->Form->create(null,['url' => '/groups/update', 'data-toggle' => 'validator', 'role' => 'form']) ?>
                <input type="hidden" name="id" value="<?= $g->id; ?>">
                <div class="modal-body">
                    <fieldset>        
                        <?php                                        
                            echo "<div class='form-group'>";
                                echo "<div class='col-sm-12 form-label'>";
                                    echo __("Name");
                                echo "</div>";
                                echo "<div class='col-sm-12'>";
                                    echo $this->Form->input('name',['value' => $g->name, 'class' => 'form-control', 'label' => false]);    
                                echo "<div class='help-block with-errors'></div> </div>";                
                            echo " </div>"; 

                            
                        ?>
                    </fieldset>   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
     