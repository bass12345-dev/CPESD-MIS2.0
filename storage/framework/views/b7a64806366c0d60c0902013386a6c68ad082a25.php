<!-- Modal -->
<div class="modal fade" id="strong_pass_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Please update your 
                    <span class="text-danger">PASSWORD</span> to proceed....
                </h5>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <div class="m-sm-3">
                            <form id="update_password_strong">
                                 <div class="row mb-2">
                                    <div class="input-group flex-nowrap" style="height: 40px;">

                                        <input type="password" class="form-control password" name="old_password" placeholder="Old Password"
                                            aria-label="Username" aria-describedby="addon-wrapping" required autocomplete="">
                                        <span class="input-group-text show_con">
                                          <i class="fas fa-eye show_icon"></i>
                                          <i class="fas fa-eye-slash hidden_icon" hidden ></i>
                                        </span>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="input-group flex-nowrap" style="height: 40px;">

                                        <input type="password" class="form-control password1" name="new_password" placeholder="New Password"
                                            aria-label="Username" aria-describedby="addon-wrapping" required autocomplete="">
                                        <span class="input-group-text show_con1">
                                          <i class="fas fa-eye show_icon1"></i>
                                          <i class="fas fa-eye-slash hidden_icon1" hidden ></i>
                                        </span>
                                    </div>
                                </div>

                                
                                <div class="row mb-2">
                                    <div class="input-group flex-nowrap" style="height: 40px;">

                                        <input type="password" class="form-control password2" name="confirm_new_password" placeholder="Confirm New Password"
                                            aria-label="Username" aria-describedby="addon-wrapping" required autocomplete="">
                                        <span class="input-group-text show_con2">
                                          <i class="fas fa-eye show_icon2"></i>
                                          <i class="fas fa-eye-slash hidden_icon2" hidden ></i>
                                        </span>
                                    </div>
                                </div>
                   
                   
                                <div class="d-grid gap-2 mt-3">
                                    <button type="submit" class="btn btn-lg btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\CPESD-MIS\resources\views/global_includes/modals/update_password_strong1.blade.php ENDPATH**/ ?>