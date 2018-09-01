@extends('frontend.layout')


@section('content')
   <menu-tree :menu="{{ json_encode($menu) }}"
              :max-depth="{{ $maxDepth }}"
              @drag="updateTree($event)"
   ></menu-tree>

@endsection


