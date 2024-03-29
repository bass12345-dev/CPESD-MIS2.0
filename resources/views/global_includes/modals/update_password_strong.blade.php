<!-- Modal -->
<div class="modal fade" id="strong_pass_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Please update your <span
                        class="text-danger">PASSWORD</span> to proceed..</h5>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <div class="m-sm-3">
                            <form id="update_password1">
                                 <div class="row mb-2">
                                    <div class="input-group flex-nowrap" style="height: 40px;">

                                        <input type="password" class="form-control" placeholder="Username"
                                            aria-label="Username" aria-describedby="addon-wrapping" id="password">
                                        <span class="input-group-text" id="addon-wrapping" onclick="password_show_hide();">
                                          <i class="fas fa-eye" id="show_eye"></i>
                                          <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="input-group flex-nowrap" style="height: 40px;">

                                        <input type="password" class="form-control" placeholder="Username"
                                            aria-label="Username" aria-describedby="addon-wrapping" id="password">
                                        <span class="input-group-text" id="addon-wrapping" onclick="password_show_hide();">
                                          <i class="fas fa-eye" id="show_eye"></i>
                                          <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="input-group flex-nowrap" style="height: 40px;">

                                        <input type="password" class="form-control" placeholder="Username"
                                            aria-label="Username" aria-describedby="addon-wrapping" id="password">
                                        <span class="input-group-text" id="addon-wrapping" onclick="password_show_hide();">
                                          <i class="fas fa-eye" id="show_eye"></i>
                                          <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
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
</div>