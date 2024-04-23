@extends('dts.admin.layout.admin_master')
@section('title', $title)
@section('content')
@include('global_includes.title')
@include('dts.admin.contents.dashboard.sections.count_section1')
@include('dts.admin.contents.dashboard.sections.count_section2')
@include('dts.admin.contents.dashboard.sections.count_section3')
@endsection
@section('js')
<script>
    function print_status(){
        var div = document.getElementById("user_logged_in_status").innerHTML;
        var a = window.open('', '');
        a.document.write('<html><title>Login Status And Pending Documents</title><style rel="stylesheet" type="text/css">\
        body { margin-top : 50px}\
        </style>');
        a.document.write('<body>');
        a.document.write(div);
        a.document.write('</body></html>');
        a.document.close();
        a.print();
    }


introJs().setOptions(
      
        {
            "dontShowAgain": true,
            showProgress: true,          
  steps: [{
    title: 'Welcome',
    intro: 'Hello Admin of CPESD-MIS Document Tracking System There\'s a new update! 👋'
  },
  {
    title: 'Final Receiver',
    element: document.querySelector('.count-total-final'),
    intro: 'Count Final Receiver\'s Pending Documents'
  },
  {
    title: 'Users Logged in Status And Pending Documents',
    element: document.querySelector('.log-status'),
    intro: 'Track Logged In Status and count Incoming/Received Documents'
  }]
},

).start();



</script>
@endsection