@extends('layouts.app')
@section('css')
<link href="{{ asset('assets/css/pages/mailbox.css') }}" rel="stylesheet">
@endsection
@section('content')
@if (Session::has('delete'))
                                <div class="alert alert-danger" role="alert">
                                    {{ Session::get('delete') }}
                                </div>
                            @endif
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

                                <ul class="nav navbar-toolbar" style="font-size: 20px">
                                    <li class="getFilter ml-4" data-status="0"><span class="badge badge-success badge-square btn">غير مقروءة  {{$msgCount0}}</span></li>
                                    <li class="getFilter ml-4" data-status="1"><span class="badge badge-warning badge-square btn">مقروءة  {{$msgCount1}}</span></li>
                                    <li class="getFilter ml-4" data-status="2"><span class="badge badge-info badge-square btn">تم الرد  {{$msgCount2}}</span> </li>
                                </ul>
                                <input id="storg" type="hidden" value="all">
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
        <div class="modal fade" id="deleteM" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">هل انت متأكد من الحذف</h5>

                    <form action="{{ route('inbox.destroy', 'test') }}" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                </div>
                <div class="modal-body">
                    هل انت متاكد من عملية الحذف ؟
                    <input type="hidden" name="item_id" id="item_id" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary ml-4" data-dismiss="modal">الغاء</button>
                    <button type="submit" class="btn btn-danger">تاكيد</button>

                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- / modal delete-->

@endsection
@section('js')
<script src="{{ asset('assets/js/scripts/mailbox.js') }}" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function(){

  function fetch_data(page, status) {
      $.ajax({
         url:"<?php echo url(''); ?>/ajaxFilter?page="+page+"&status="+status,
         success:function(data){
          $('.mailbox').html(data);
         }
      })
     }
       $(document).on('click', '.getFilter', function(){
          var status = $(this).data("status");
          var page = $('#hidden_page').val();
          $('#storg').val(status) ;
          fetch_data(page,status);
       });
       $(document).on('click', '.pagination a', function(e){
           e.preventDefault();
          var status = $('#storg').val();
          var page = $(this).attr('href').split('page=')[1];
          fetch_data(page,status);
     });
   });
</script>


<script type="text/javascript">
    $('#deleteM').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var item_id = button.data('item_id');
        var modal = $(this);
        modal.find('.modal-body #item_id').val(item_id);
    })
</script>

@endsection
