@extends('layouts.admin')
@section('chart')
  <div>{!! $chart->container() !!}</div>

 <script src="path/to/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
 {!! $chart->script() !!}
 @endsection