
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('global_includes.title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container">
                    <div class="row height d-flex justify-content-center ">

                      <div class="col-md-8">
                      	<form id="search_form">

                        <div class="search">
                          <i class="fa fa-search"></i>
                          <input type="text" class="form-control" placeholder="Enter Tracking Number" name="tracking_number" required>
                          <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    	</form>
                        
                      </div>
                      
                    </div>
                </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>

<script type="text/javascript">

	$('form#search_form').on('submit', function(e){
		e.preventDefault();
		window.location.href = base_url + '/dts/user/view?tn=' +$('input[name=tracking_number]').val();
	})
	
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('dts.users.layout.user_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\CPESD-MIS2.0\resources\views/dts/users/contents/search/search.blade.php ENDPATH**/ ?>