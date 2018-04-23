
@extends('products::layout')

@section('main')
    <h1>Products in stock</h1>
    @include('products::partial.products-list')
@endsection