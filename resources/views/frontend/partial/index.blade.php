@extends('frontend.layout')


@section('content')
   <menu-tree :menu="{{ json_encode($menu) }}"
              @drag="updateTree($event)"
   ></menu-tree>



@endsection
