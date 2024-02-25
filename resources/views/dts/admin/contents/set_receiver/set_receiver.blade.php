@extends('dts.admin.layout.admin_master')
@section('title', $title)
@section('content')
@include('global_includes.title')
<div class="row">
    <div class="col-md-6">

        <div class="card mb-3">
            <div class="card-header">
                <h5 class="card-title mb-0">Current Receiver</h5>
            </div>
            <div class="card-body text-center">

                <h2 class="card-title mb-0 " style="color:#000;">{{$receiver->first_name.'
                    '.$receiver->middle_name.' '.$receiver->last_name.' '.$receiver->extension}}</h2>
                <h3 class="card-title mb-0 text-muted">{{$receiver->username}}</h3>

            </div>



        </div>


    </div>
    <div class="col-md-6">
        <div class="card mb-3">
            <div class="card-body ">

                <form id="update_receiver_form">
                    <div class="form-group col-md-12 mb-3">
                        <label>Update Receiver</label>
                        <div class="mb-2">
                            <input type="hidden" value="{{$receiver->user_id}}" name="receiver_id">
                            <select class="form-control" name="user_id" required>
                                <option value="">Select Receiver</option>
                                <?php foreach ($users as $row) {
                                  ?>
                                <option value="{{$row->user_id}}">{{$row->first_name}} {{$row->middle_name}}
                                    {{$row->last_name}} {{$row->extension}}</option>
                                <?php }?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
</div>
@endsection
@section('js')
<script>
    $('#update_receiver_form').on('submit', function (e) {
      e.preventDefault();
      var form = $(this).serialize();
      var id = '';
      var url = '/dts/u-r';
      update_item(id,form,url);
     
      $('#update_receiver_form').find('button').attr('disabled',true);
   });

</script>
@endsection