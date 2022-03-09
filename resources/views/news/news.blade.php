@extends('layouts.app')

@section('content')
    @if (Session::has('delete'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('delete') }}
        </div>
    @endif
    <!-- START PAGE CONTENT------------------------------------------>
    <div class="page-heading">
        <h1 class="page-title">الاخبار</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html"><i class="la la-home font-20"></i></a>
            </li>
            <li class="breadcrumb-item">عرض و اضافة اخر الاخبار</li>
        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="row">
            <div class="col-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">انشر المقالات</div>
                        <div class="d-flex justify-content-between">

                            <form class="mail-search" action="javascript:;">
                                <div class="input-group">
                                    <input id="search" class="form-control" type="text" placeholder="ابحث عن اسم المقالة"
                                        style="text-align: right">
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="ibox-body">
                        @if (Session::has('done'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('done') }}
                            </div>
                        @endif
                        {{-- form add new blog --}}
                        <form class="form-inline" method="POST" action="{{ route('news.store') }}">
                            @csrf
                            <textarea placeholder="اكتب المقالة ............." style="text-align: right"
                                class="form-control mt-2 ml-sm-2 @error('text') is-invalid @enderror" rows="3" cols="150"
                                name="text" id="text">{{ old('text') }}</textarea>

                            <button class="btn btn-success" type="submit">نشر</button>
                        </form>
                        @error('text')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">الاخبار</div>
                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        </div>
                    </div>
                    <div class="newsBox">
                        @include('news.ajax_news')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script type="text/javascript">
	$(document).ready(function(){

  function fetch_data(page, search="") {
      $.ajax({
         url:"<?php echo url(''); ?>/ajax_news?page="+page+"&search="+search,
         success:function(data){
          $('.newsBox').html(data);
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
