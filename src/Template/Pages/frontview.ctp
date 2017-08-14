<style>
.job-role-description{
	padding:10px;
	margin-top:10px;
}
.apply-for-job-search-inner p{
font-family: 'open sans';
font-size: 22px;
color: #3c3c3c !important;
font-weight: 400;
}
h2{
    font-family: dosis;
    font-weight: bold;
}
</style>
<?php use Cake\Utility\Inflector; ?>
<div class="apply-for-job-search">
    <div class="apply-for-job-search-inner">
        <div class="wrapper">
        	<div class="employer-title">
				<h2><?php echo $page_title; ?></h2>
				<?php echo $page->body; ?>			
			<?php if( $page_id == 2 ){ ?>		
				<h2>Roles we fill...</h2>
				<p>An example of some of the roles we regularly fill together with our definitions can be seen below...</p>		
				<select class="form-control" id="job-roles-list">
					<?php foreach( $jobRoles as $j ){ ?>
						<option value="<?php echo $j->id; ?>"><?php echo $j->name; ?></option>
					<?php } ?>
				</select>		
				<div class="job-role-description"></div>
			</div>
			<?php } ?>
        </div>
    </div>
</div>
