@extends('layouts.app')
@section('css')
<link href="{{ asset('assets/css/pages/mailbox.css') }}" rel="stylesheet">
@endsection
@section('content')
        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">صندوق بريد</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html"><i class="la la-home font-20"></i></a>
                </li>
                <li class="breadcrumb-item">صندوق بريد</li>
            </ol>
        </div>
        <div class="page-content fade-in-up">
            <div class="row">
                <div class="col-md-12">
                    <div class="ibox" id="mailbox-container">
                        <div class="mailbox-header">
                            <div class="d-flex justify-content-between">
                                <h5 class="d-none d-lg-block inbox-title"><i class="fa fa-envelope-o m-r-5"></i> صندوق الوارد ({{$messagesCount}})</h5>
                                <form class="mail-search" action="javascript:;" >
                                    <div class="input-group">
                                        <input id="search" class="form-control" type="text" placeholder="ابحث عن البريد الالكتروني" style="text-align: right">
                                    </div>
                                </form>
                            </div>
                            <div class="d-flex justify-content-between inbox-toolbar p-t-20">

                                <div>

                                    <div class="btn-group btn-group-sm">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mailbox clf">

                                    @include('messages.ajax_inbox')

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- END PAGE CONTENT-->
@endsection
@section('js')
<script src="{{ asset('assets/js/scripts/mailbox.js') }}" type="text/javascript"></script>

<script type="text/javascript">
	$(document).ready(function(){

  function fetch_data(page, search="") {
      $.ajax({
         url:"<?php echo url(''); ?>/ajax_inbox?page="+page+"&search="+search,
         success:function(data){
          $('.mailbox').html(data);
         }
      })
     }
       $(document).on('keyup', '#search', function(){
          var search = $('#search').val();
          var page = $('#hidden_page').val();
          fetch_data(page,search);
       });
       $(document).on('click', '.pagination a', function(e){
           e.preventDefault();
          var search = $('#search').val();
          var page = $(this).attr('href').split('page=')[1];
          fetch_data(page,search);
     });
   });
</script>
@endsection
