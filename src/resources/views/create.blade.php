@extends('products::layout')

@section('main')
    <h1>Add new product</h1>
    <form method="POST" action="{{ route('products.store') }}">
        @csrf
        Name:<br>
        <input type="text" name="name"/><br>
        Amount:<br>
        <input type="number" name="amount"/>
        <input type="submit"/>
    </form>
@endsection