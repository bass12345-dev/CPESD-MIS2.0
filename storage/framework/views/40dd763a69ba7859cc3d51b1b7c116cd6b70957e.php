
<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('global_includes.title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
	<div class="col-md-7">
		<?php echo $__env->make('watchlisted.users.contents.view_profile.sections.info', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</div>
	
</div>


<div class="row">
	<div class="col-md-7">
		<?php echo $__env->make('watchlisted.users.contents.view_profile.sections.records_table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	</div>
	<?php
	if (session('watch_id') == $person_data->user_id) {
	?>
		<div class="col-md-5">
			<?php echo $__env->make('watchlisted.users.contents.view_profile.sections.add_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		</div>

	<?php } ?>
</div>
<?php echo $__env->make('watchlisted.users.contents.view_profile.sections.off_canvas', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('watchlisted.users.contents.view_profile.sections.update_canvas', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<?php echo $__env->make('dts.includes.datatable_with_select', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script>

	
document.addEventListener("DOMContentLoaded", function () {
   table = $("#datatable_with_select").DataTable({
      responsive: true,
      ordering: false,
      processing: true,
      pageLength: 25,
      language: {
         "processing": '<div class="d-flex justify-content-center "> <img class="top-logo mt-4" src="<?php echo e(asset("assets/img/peso_logo.png")); ?>"></div>'
      },
      dom: 'Bfrtip',
      buttons: ['copy', 'print', 'csv'],
      ajax: {
         url: base_url + "/wl/user/g-w-r?id="+'<?php echo $_GET['id'] ?>',
         method: 'GET',
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
         },
         dataSrc: ""
      },
      columns: [
         {
         data: 'record_description'
      },
      {
         data: 'created_at'
      }, 
	  {
         data: null
      }, 
	],
      columnDefs: [ 
            {
               targets: -1,
               data: null,
               render: function (data, type, row) {
				 let actions = row.actions == true ? '<div class="btn-group dropstart">\
                                <i class="fa fa-ellipsis-v " class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"></i>\
                                <ul class="dropdown-menu">\
                                    <li><a class="dropdown-item" id="update" href="javascript:;" data-user-id="'+row.p_id+'" data-record="'+row.record_description+'" data-record-id="'+row.record_id+'">Update</a></li>\
                                    <li><a class="dropdown-item" id="remove" href="javascript:;" data-id="'+row.record_id+'">Remove</a></li>\
                                </ul>\
                            </div>' : '';
                  return actions;
               }
            },

           

   ]
   });
});
	$(document).on('click', 'a#remove', function(){

		var id = $(this).data('id');
		var url = '/wl/user/delete-record';
		delete_item(id, url);
	});

	$(document).on('click', 'a#update', function(){
		var id = $(this).data('record-id');
		var record = $(this).data('record');
		$('input[name=record_id]').val(id);
		$('textarea[name=record_description]').val(record);
		$('#add_form').find('button.submit').text('Update');
		$('#add_form').find('button.cancel_update').attr('hidden', false);
		$('.card-title').text('Update Record');
	});

	$('#add_form').find('button.cancel_update').on('click', function() {
		$(this).attr('hidden', true);
		$('input[name=record_id]').val('');
		$('textarea[name=record_description]').val('');
		$('#add_form').find('button.submit').text('Submit');
		$('.card-title').text('Add Program');
	});


	$('#add_form').on('submit', function(e) {
		e.preventDefault();
		var form = $(this).serialize();
		var id = $('input[name=record_id]').val();
		var person_id = $('input[name=person_id]').val();
		$('#add_form').find('button').attr('disabled', true);
		if (!id) {
			var url = '/wl/user/add-record';
			add_item(form, url);
			// add_record(url,form,person_id);
		} else {
			var url = '/wl/user/update-record';
			update_item(id, form, url);

		}
		$('#add_form').find('button').attr('disabled', false);
		$('#add_form')[0].reset();
		

	});




	$('#program_form').on('submit', function(e) {
		e.preventDefault();
		items = [];
		$("input[name=program_id]:checked").map(function(item) {
			items.push($(this).val());

		});
		var person_id = $('input[name=person_id]').val();
		var url = '/wl/user/s-p-p';
		var data = {
			id: items,
			person_id: person_id
		};
		add_item(data, url);

		$('#program_form').find('button').attr('disabled', true);

	});

	$('button.update_information_button').on('click', function(e) {
		var name = $('td.name').text();
		$('.update-information').html('Update ' + '<span class="text-danger">"' + name + '"</span>' + ' Information');
	});


	$('#update_information').on('submit', function(e) {
		e.preventDefault();

		var url = '/wl/user/update';
		var form = $('#update_information').serialize();
		$('#update_information').find('button').attr('disabled', true);
		update_item(id = '', form, url);
		$('#update_information').find('button').attr('disabled', false);
		 setTimeout(reload_page, 2000)

	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('watchlisted.users.layout.user_watchlisted_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/watchlisted/users/contents/view_profile/view_profile.blade.php ENDPATH**/ ?>