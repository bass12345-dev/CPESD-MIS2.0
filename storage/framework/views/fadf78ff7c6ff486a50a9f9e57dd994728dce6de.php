
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('global_includes.title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
	<div class="col-md-4">
<?php echo $__env->make('watchlisted.users.contents.search.sections.search_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</div>
	<div class="col-md-8">
<?php echo $__env->make('watchlisted.users.contents.search.sections.result_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>

$('#search_form').on('submit', function(e){
	e.preventDefault();

	var url = '/wl/user/search-query';
	var form = $(this).serialize();
	var first_name = $('input[name=first_name]').val();
   	var last_name = $('input[name=last_name]').val();
   	$('#datatables-buttons').DataTable().destroy();
   	if (first_name == '' && last_name == '') {
      alert('please input First Name or Last Name');
   } else {
      search_name_result(url,form)
   }

});
	

function search_name_result(url,form){
		 $.ajax({
      url: base_url + url,
      method: 'POST',
      data: form,
      dataType: 'json',
      beforeSend: function () {
         Swal.showLoading()
      },
      headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
         'Authorization': '<?php echo config('app.key') ?>'
      },
      success: function (data) {
         Swal.close();
         var s = data.length > 1 ? 's' : '';
         var text = "Result"+s +' '+ data.length;
    
        	$('img#search_image').attr('hidden',true);
        	$('#search').attr('hidden',false);	
        	
        	$('h5#count_result').text(text);
        	 $('#datatables-buttons').DataTable({
        	 	 "ordering": false,
            search: true,
            "data": data,
            'columns': [

       
           {
               data: null,
               render: function (data, type, row) {

               	var extenstion = row.extenstion != null ? row.extenstion : '';
               	var middle_name = row.middle_name != null ? row.middle_name : '';

                  return row.first_name +' '+ middle_name +' '+ row.last_name +' '+ extenstion ;
               }
            }, 
            {
               data: 'age',
            }, 
            {
               data: 'address',
            },
             {
               data: 'email_address',
            }, 

             {
               data: 'phone_number',
            }, 

            {
               data: null,
               render: function (data, type, row) {
                  let status = '';
                  let bg = '';

                  switch (row.status) {
                     case 'not-approved':
                        status = 'To Approved';
                        bg = 'bg-warning';
                        break;
                     case 'inactive' : 
                        status = 'Removed';
                        bg = 'bg-success';
                        break;
                     
                     case 'active' : 
                        status = 'Active';
                        bg = 'bg-danger';
                        break;
                  
                     default:
                        break;
                  }

                  return '<span class="badge '+bg+'">'+status+'</span>';
                  // return row.status == 'active' ? '<span class="badge bg-danger">Active</span>' : '<span class="badge bg-success">Forgiven</span>';
               }
            }, 
            

            {
               data: null,
               render: function (data, type, row) {
                  return '<a href="'+base_url+'/watchlisted/user/view_profile?id='+row.person_id+'" class="btn btn-primary"><i class="fas fa-eye"></i></a>';
               }
            }, 


            ]
        	 });


 
      },
      error: function () {
         alert('something Wrong')
      }

   });	
}


</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('watchlisted.users.layout.user_watchlisted_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\CPESD-MIS2.0\resources\views/watchlisted/users/contents/search/search.blade.php ENDPATH**/ ?>