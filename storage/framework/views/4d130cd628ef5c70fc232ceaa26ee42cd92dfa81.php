<div class="d-flex flex-row ">
      <div class="p-1" style="width: 45%;">
         <div class="input-group mb-3">
            <input type="text" class="form-control" name="dates" placeholder="Date Range"
               aria-describedby="button-addon2">
            <button class="btn btn-outline-primary" type="button" id="button-addon2"><i
               class="fas fa-calendar"></i></button>
         </div>
      </div>
      <div class="p-1" style="width: 45%;">
         <select class="form-control" name="select_document_types">
            <option value="">Select Document Type</option>
            <?php foreach ($document_types as $row) : ?>
            <option value="<?php echo e($row->type_id); ?>"><?php echo e($row->type_name); ?></option>
            <?php endforeach; ?>
         </select>
      </div>
      <div class="p-1" >
         <button class="btn btn-primary btn-block"   id="filter">Filter</button>
      </div>
   </div><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/dts/users/contents/my_documents/sections/filter/filter.blade.php ENDPATH**/ ?>