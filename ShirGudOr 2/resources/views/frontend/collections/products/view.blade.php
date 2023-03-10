@extends('layouts.app')

@section('title')
{{$category->meta_title}}
@endsection

@section('meta_keyword')
{{$category->meta_keyword}}
@endsection

@section('meta_description')
{{$category->meta_description}}
@endsection

@section('content')

<h4>Product view page</h4>
@endsection