<?php 
	use App\Models\CustomModel;
	$row = CustomModel::q_get_where('users',array('is_oic' => 'yes'))->first();
	echo '<span class="text-danger">Office in Charge : '.$row->first_name.' '.$row->middle_name.' '.
	$row->last_name.' '.$row->extension.'</span>';


	?><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/dts/includes/office_in_charge_display.blade.php ENDPATH**/ ?>