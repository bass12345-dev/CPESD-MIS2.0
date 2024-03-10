
<div class="card flex-fill p-3">

         <div class="card-header">
            <h5 class="card-title mb-2">Programs</h5>
            <button class="btn btn-danger " data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample">Update</button>
         </div>

   <table class="table table-hover table-striped " style="width: 100%; "  >
      
        <?php foreach ($person_programs as $row) :
                   
                   ?>
                   <tr>
                     <td><?php echo e($row); ?></td>
                  </tr>

                  <?php endforeach; ?>
                   
      
   </table>      

</div><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/watchlisted/admin/contents/view_profile/sections/program_block.blade.php ENDPATH**/ ?>