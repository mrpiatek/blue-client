@extends('products::layout')

@section('main')
    <h1>Update product data</h1>
    <form method="POST" action="{{ route('products.update', ['id' => $id]) }}">
        @csrf
        @method('PUT')
        Name:<br>
        <input type="text" name="name"/><br>
        Amount:<br>
        <input type="number" name="amount"/>
        <input type="submit"/>
    </form>
@endsection