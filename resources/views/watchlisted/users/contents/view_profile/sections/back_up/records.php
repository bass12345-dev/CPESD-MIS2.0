<div class="card flex-fill p-3">

    <div class="card-header">


    </div>
    <table class="table table-hover table-striped " id="datatable_with_select" style="width: 100%; ">
        <thead>
            <tr>


                <th>Record</th>
                <th>Created</th>
                <?php if (session('watch_id') == $person_data->user_id) { ?>
                    <th>Actions</th>
                <?php }  ?>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($records as $row) :  ?>
                <tr>
                    <td>{{$row['record_description']}}</td>
                    <td>{{$row['created_at']}}</td>
                    <?php if (session('watch_id') == $person_data->user_id) { ?>
                        <td>
                            <div class="btn-group dropstart">
                                <i class="fa fa-ellipsis-v " class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"></i>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" id="update" href="javascript:;" data-user-id="{{$row['p_id']}}" data-record="{{$row['record_description']}}" data-record-id="{{$row['record_id']}}">Update</a></li>
                                    <li><a class="dropdown-item" id="remove" href="javascript:;" data-id="{{$row['record_id']}}">Remove</a></li>
                                </ul>
                            </div>
                        </td>
                    <?php }  ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>