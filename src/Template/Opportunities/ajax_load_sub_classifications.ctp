<select class="form-control" name="industry_id">
    <option>-- Please select classification --</option>
    <?php foreach( $industries as $i ){ ?>
        <option value="<?php echo $i->id; ?>"><?php echo $i->name; ?></option>
    <?php } ?>
    <option value="all"><?php echo "All " . $industry_group->name; ?></option>
</select>