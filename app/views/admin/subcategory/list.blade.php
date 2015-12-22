<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 12.08.15
 * Time: 17:37
 */ ?>

@extends('admin.layout.layout')

@section('content')

    <a href="/admin/subcategoryAction/add" title="add subcategory" class="btn btn-default btn-sm">
        <span class="glyphicon glyphicon-plus"></span> Add new subcategory
    </a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Parent</th>
            <th>Name</th>
            <th>Url</th>
            <th>Sort</th>
            <th>action</th>
        </tr>
        </thead>
        <tbody>

        @if($subcategoryList)
        @foreach($subcategoryList as $subcategory)
        <tr>
            <td>{{ $subcategory->category['name']}}</td>
            <td>{{ $subcategory->name}}</td>
            <td>{{ $subcategory->alias;}}</td>
            <td>{{ $subcategory->sort;}}</td>
            <td >
                <a href="/admin/subcategoryAction/delete/{{$subcategory->id}}" title="delete subcategory" onclick="return confirm('sure?')" class="btn btn-danger">
                    delete
                </a>
                <a href="/admin/subcategory/{{$subcategory->id}}" title="edit subcategory" class="btn btn-info">
                    edit
                </a>
            </td>
        </tr>
        @endforeach
        @endif
        </tbody>
    </table>

@stop