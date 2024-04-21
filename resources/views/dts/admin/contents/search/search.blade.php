@extends('dts.admin.layout.admin_master')
@section('title', $title)
@section('content')

@include('global_includes.title')
@include('dts.admin.contents.search.sections.search_form')
<div class="row d-none result-card">
  <div class="col-md-12 col-12">
    <div class="card flex-fill p-3">
    <div class="loading"></div>
      <div class="card-header">
      
        <h5 class="card-title text-danger mb-0"></h5>
      </div>
      <div class="data-container"></div>
      <div class="pagination-container mt-3"></div>
    </div>
  </div>
</div>
@endsection
@section('js')

<script type="text/javascript">
  // $('form#search_form').on('submit', function (e) {
  //   e.preventDefault();
  //   window.location.href = base_url + '/dts/user/view?tn=' + $('input[name=tracking_number]').val();
  // })
  $('form#search_form').on('submit', function(e) {
    e.preventDefault();
    var q = $('input[name=search]').val();
    $('.result-card').addClass('d-none')
    $('.result').html('');

    $.ajax({
      url: base_url + '/dts/search?q=' + q,
      method: 'GET',
      dataType: 'json',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      },
      beforeSend : function(){
            loader();
      },
      success: function(data) {
        $('.result-card').removeClass('d-none');
        JsLoadingOverlay.hide();
        if (data.length > 0) {
         
          let arr = [];
          $('.card-title').text(data.length + ' Result/s');
          simpleTemplating(data);
          $('.pagination-container').pagination({
            dataSource: data,
            pageSize: 100,
            showPageNumbers: true,
            showNavigator: true,
            showSizeChanger: true,
            callback: function(data, pagination) {
              var html = simpleTemplating(data,q);
              $('.data-container').html(html);
            }
          });
          $('.pagination-container').removeClass('d-none');
          highlightText(q);
        } else {
          $('.card-title').text('0 Result/s');
          $('.data-container').html('<div class="row d-flex justify-content-center text-danger" style="font-size: 20px;">Sorry! We can\'t find the document you\'re looking for</div>');
          $('.pagination-container').addClass('d-none');
        }
      },
      error: function() {
        alert('something Wrong');
        location.reload();
      }

    });

  });


  function simpleTemplating(data) {
    var html = '<ul class="list-group">';
    $.each(data, function(index, item) {
      
      html += '<li class="list-group-item">\
      <details open>\
          <summary ><a href="'+ base_url + '/dts/admin/view?tn=' + item.tracking_number+'">' + item.document_name + '</a></summary>\
          <p>'+item.document_description+'</p>\
          <b><span>#'+item.tracking_number+'</span></b>\
          <span class="text-primary"><b>Remarks</b></span><p>'+item.remarks+'</p>\
        </details>\
      </li>';
    });
    html += '</ul>';
    return html;
  }




</script>

@endsection