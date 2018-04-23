
@extends('products::layout')

@section('main')
    <h1>Products with amount over five</h1>
    @include('products::partial.products-list')
@endsection