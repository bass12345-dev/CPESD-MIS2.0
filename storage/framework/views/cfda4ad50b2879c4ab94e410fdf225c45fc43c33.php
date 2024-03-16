<div class="card">
                     <div class="card-header bg-primary text-white">
                        Completed Today - <?php echo e($today); ?>

                     </div>
                     <table class="table">
                        <thead>
                           <tr>
                              <th scope="col">#</th>
                              <th scope="col">Tracking Number</th>
                              <th scope="col">Document Name</th>
                              <th scope="col">Document Type</th>
                              <th scope="col">Transaction Type</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php $i =1; foreach($count['completed_today'] as $row) {
                               ?>
                           <tr>
                              <th scope="row"><?php echo e($i++); ?></th>
                              <td><?php echo e($row->tracking_number); ?></td>
                              <td><?php echo e($row->document_name); ?></td>
                              <td><?php echo e($row->type_name); ?></td>
                              <td><?php echo e($row->destination_type); ?></td>
                           </tr>
                          <?php } ?>
                        </tbody>
                     </table>
                  </div><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/dts/admin/contents/dashboard/sections/more/completed_today.blade.php ENDPATH**/ ?>