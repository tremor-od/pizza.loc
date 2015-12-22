<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 12.08.15
 * Time: 17:37
 */ ?>

@extends('admin.layout.layout')

@section('content')

    <a href="/admin/productAction/add" title="add product" class="btn btn-default btn-sm">
        <span class="glyphicon glyphicon-plus"></span> Add new product
    </a>
    {{ $productList->links(); }}
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Url</th>
            <th>Image</th>
            <th>action</th>
        </tr>
        </thead>
        <tbody>
        @if($buildOwn)
        <tr>
            <td>{{ $buildOwn->name}}</td>
            <td>{{ $buildOwn->alias;}}</td>
            <td><img width="100" height="100" src="{{$buildOwn->image->url('thumb')}}" ></td>
            <td >
                <a href="/admin/product/{{$buildOwn->id}}" title="edit product" class="btn btn-info">
                    edit
                </a>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

        @endif
        @if($productList)
        @foreach($productList as $product)
        <tr>
            <td>{{ $product->name}}</td>
            <td>{{ $product->alias;}}</td>
            <td><img width="100" height="100" src="{{$product->image->url('thumb')}}" ></td>
            <td >
                <a href="/admin/productAction/delete/{{$product->id}}" title="delete product" onclick="return confirm('sure?')" class="btn btn-danger">
                    delete
                </a>
                <a href="/admin/product/{{$product->id}}" title="edit product" class="btn btn-info">
                    edit
                </a>
            </td>
        </tr>
        @endforeach
        @endif
        </tbody>
    </table>
    {{ $productList->links(); }}
@stop