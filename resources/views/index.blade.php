<?php
use Carbon\Carbon;use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
?>

@extends('layouts.app')

@section('content')

   <div class="container">
      <div class="row table-bordered">
         <div class="col-xs-4" style=" ;">
            春节第一套教程
         </div>
         <div class="col-xs-4" style=" ">
            分享人: 李云龙
         </div>

         <div class="col-xs-4" style=" ">
            2017-05-06
         </div>

      </div>
   </div>

@endsection

@section('scripts')
   <script src="{{ mix('js/index/index.js') }}"></script>
@endsection