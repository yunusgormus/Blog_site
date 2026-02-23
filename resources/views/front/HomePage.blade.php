@extends('front.layouts.master')
@section('title','Ana Sayfa')

@section('content')

        <!-- Main Content-->
      <div class="row">
                <div class="col-md-9">

                @include('front.widgets.ArticleList')
                   
                </div>
                @include('front.widgets.CategoryWidget')
</div>
                  

        <!-- Footer-->







@endsection