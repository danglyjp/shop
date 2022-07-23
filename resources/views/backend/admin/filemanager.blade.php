@extends('backend.layouts.master')

@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="{{ asset('vendor/file-manager/css/file-manager.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css">
@endsection


@section('main')
<section class="content">
    <div class="row">
        <div class="col-xs-12" id="fm-main-block">
            <div id="fm"></div>
        </div>
    </div>
</section>

<!-- File manager -->
<script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('fm-main-block').setAttribute('style', 'height:' + window.innerHeight + 'px');

    fm.$store.commit('fm/setFileCallBack', function(fileUrl) {
      window.opener.fmSetLink(fileUrl);
      window.close();
    });
  });
</script>

@endsection