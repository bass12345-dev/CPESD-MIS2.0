<!DOCTYPE html>
<html>
   <head>
      <title>Print</title>
      <link href=" <?php echo e(asset('assets/css/print1.css')); ?> " rel="stylesheet">
   </head>
   <body>
      <?php foreach ($data as $row) : ?>
      <div id="header">
         <div class="top-header">
            <div class="left">
               <div class="left-logo">
                  <img class="top-logo " src="<?php echo e(asset('assets/img/oroquieta_logo-300x300.png')); ?>">
                  <img class="top-logo right-l" src="<?php echo e(asset('assets/img/peso_logo.png')); ?>">
               </div>
            </div>
            <div class="middle">
               <span>Republic of the Philippines</span><br>
               <span class="office-city-mayor">Office of the City Mayor</span><br>
               <span class="oro">Oroquieta City</span><br>
               <span class="oro capital">The Capital of Misamis Occidental</span>
            </div>
            <div class="right">
               <div class="bagong-image-card">
                  <img class="top-logo" src="<?php echo e(asset('assets/img/Bagong_Pilipinas_logo.png')); ?>">
                  <img class="top-logo" src="<?php echo e(asset('assets/img/asenso_logo.png')); ?>">
               </div>
            </div>
         </div>
         <div class="below-header">
            <h21>
            Cooperative & Public Employment Service Division</h2>
         </div>
      </div>
      <div class="table">
         <table cellpadding="3" cellspacing="2" >
            <tr >
               <th colspan="4" >Routing Slip</th>
            </tr>
            <tr>
               <td colspan="3"  >
                  <div style="margin-bottom: 0">
                     <label>Document Name : </label> <span><?php echo e($row->document_name); ?></span><br>
                     <label>Document No : </label> <span><?php echo e($row->tracking_number); ?></span><br>
                     <label>Document Type : </label> <span><?php echo e($row->type_name); ?></span><br>
                     <label>Date Received : </label> <span><?php echo e(date('M d Y - h:i a', strtotime($row->document_created))); ?></span><br>
                  </div>
               </td>
               <td colspan="1" >
                  <div style="margin-bottom: 40px;">
                     <label >Encoded By : </label> <span><?php echo e($row->first_name.' '.$row->middle_name.' '.$row->last_name.' '.$row->extension); ?></span><br>
                     <label >Type : </label> <span><?php echo e($row->destination_type); ?></span><br>
                     <label >Origin : </label> <span><?php echo e($row->origin); ?></span><br>
                  </div>
               </td>
            </tr>
            <tr>
               <td colspan="4" >
                  <label >Brief Description</label> : <span><?php echo e($row->document_description); ?></span>
               </td>
            </tr>
            <tr>
               <td colspan="4"  >
                    <div style="margin-bottom: 120px;">
                        <span class="action_taken">Action Taken :</span>
                    </div>
               </td>
            </tr>
         </table>
      </div>
      <br>
      <hr>
      <br>
      <?php endforeach; ?>
   </body>
   <script>
      window.print();
   </script>
</html><?php /**PATH C:\xampp\htdocs\CPESD-MIS2.0\resources\views/dts/includes/print/print_slip.blade.php ENDPATH**/ ?>