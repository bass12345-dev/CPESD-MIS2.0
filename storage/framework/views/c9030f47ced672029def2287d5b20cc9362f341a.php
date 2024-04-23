<!-- Modal -->
<div class="modal fade" id="add_note_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Note</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              
                <div class="card">
                    <div class="card-body"> <p class="note">Empty Note</p></div>
                
                </div>

                <button class="btn btn-success mb-3 update_note">Update Note</button>
                
                <form id="update_note" hidden>
                    <div class="form-row mb-2">
                        <div class="form-group col-md-12 mb-2">
                            <label for="inputEmail4">Add note</label>
                            <input type="hidden" name="document_id">
                            <textarea class="form-control" style="height: 150px;"  name="note"></textarea>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-danger close_add_note">Close</button>
                </form>

            </div>

        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\CPESD-MIS2.0\resources\views/dts/receiver/contents/incoming/modal/add_note_modal.blade.php ENDPATH**/ ?>