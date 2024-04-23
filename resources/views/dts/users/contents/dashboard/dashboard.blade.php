@extends('dts.users.layout.user_master')
@section('title', $title)
@section('content')
@include('global_includes.title')
@include('dts.users.contents.dashboard.sections.count_section')
@include('dts.users.contents.dashboard.sections.count_section1')
@endsection
@section('js')
<script>
    introJs().setOptions(
      
        {
            "dontShowAgain": true,
            showProgress: true,          
  steps: [{
    title: 'Welcome',
    intro: 'Hello Ka people of CPESD There\'s a new update! 👋'
  },
  {
    title :  'Outgoing Documents',
    element: document.querySelector('.outgoing-card'),
    intro: 'Count Outgoing Documents Outside Office'
  },
  {
    title: 'Documents Forwarded',
    element: document.querySelector('.documents_forwarded'),
    intro: 'Track Forwarded Documents'
  }]
},

).start();


</script>
@endsection