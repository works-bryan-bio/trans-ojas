Hi,
 
New candidate have register via our webapp. Below are the details

Candidate ID : <?php echo $edata['candidate_id']; ?>

Name : <?php echo $edata['name']; ?>

Email : <?php echo $edata['email']; ?>

Have worked at a Managed Service Provider : <?php echo $edata['is_manage_service_provider'] == 1 ? 'Yes' : 'No'; ?>

<?php 
	if( $is_manage_service_provider == 1 ){
		echo "Service Provider : " . $edata['service_provider'];
	}
?>


Attached is candidate resume

Thanks,
Transparent IT Consulting