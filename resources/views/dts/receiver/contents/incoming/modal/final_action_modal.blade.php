<!-- Modal -->
<div class="modal fade" id="final_action_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Final Actions</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="forward_form">
                    <div class="form-row mb-2">
                        <input type="hidden" value="{{$user_data['user_id']}}" name="user_id">
                        <input type="hidden" name="id">
                        <input type="hidden" name="t_number">
                        <div class="form-group col-md-12 mb-2">
                            <label for="inputEmail4">Final Action </label>
                            <select class="form-control" name="final_action_taken" required>
                                <option value="">Select..</option>
                                <?php foreach ($final_actions as $row) : ?>
                                    <option value="{{$row->action_id}}">{{$row->action_name}} </option>
                                    <?php endforeach; ?>`

                            </select>
                            </select>
                        </div>

                        <div class="form-group col-md-12 mb-2">
                            <label for="inputEmail4">Remarks</label>
                            <textarea class="form-control" name="remarks1"></textarea>
                        </div>

                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>

        </div>
    </div>
</div>