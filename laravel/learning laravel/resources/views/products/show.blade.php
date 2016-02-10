@extends('layouts.layout')
@section('title')
{{$product->name}}
@stop

@section('body')
    {!!Form::open([
        'method' => 'delete',
        'route' => ['product.destroy', $product->id]
    ])!!}
    <h1>{{$product->name}}</h1>
    <h3>{{$product->price}}</h3>
    
    <a href="{{route('product.edit', $product->id)}}">Edit</a> 
    {!!Form::submit('Delete')!!}
    {!!Form::close()!!}
@stop