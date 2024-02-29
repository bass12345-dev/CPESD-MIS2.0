<div class="card flex-fill p-3">
         <div class="card-header">
            <h5 class="card-title mb-0">Documents</h5>
         </div>
         <table class="table table-hover  " id="datatables-buttons" style="width: 100%; "  >
            <thead>
               <tr>
                  <th >Office</th>
                  <th >Created</th>
                  <th >Action</th>
               </tr>
            </thead>
            <tbody>
                  <?php
                   $i = 1;
                   foreach ($offices as $office) :?>
                     <tr>
                        <td class=""><?php echo e($office->office); ?></td>
                        <td class=""><?php echo e($office->created); ?></td>
                        <td>    
                           <div class="btn-group dropstart">
                             <i class="fa fa-ellipsis-v " class="dropdown-toggle"  data-bs-toggle="dropdown" aria-expanded="false"></i>
                             <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" id="update_office" href="javascript:;" data-id="<?php echo e($office->office_id); ?>" data-office="<?php echo e($office->office); ?>">Update</a></li>
                                  <li><a class="dropdown-item" id="remove_office" href="javascript:;" data-id="<?php echo e($office->office_id); ?>">Remove</a></li>
                                </ul>
                           </div>
                        </td>
                     </tr>
                <?php endforeach; ?>    
            </tbody>
         </table>
      </div><?php /**PATH C:\xampp\htdocs\CPESD-MIS2.0\resources\views/dts/admin/contents/offices/sections/offices_table.blade.php ENDPATH**/ ?>