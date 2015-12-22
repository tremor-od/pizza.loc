<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 12.08.15
 * Time: 17:37
 */ ?>

@extends('admin.layout.layout')

@section('content')

    <a href="/admin/sizeAction/add" title="add size" class="btn btn-default btn-sm">
        <span class="glyphicon glyphicon-plus"></span> Add new size
    </a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>action</th>
        </tr>
        </thead>
        <tbody>

        @if($sizeList)
        @foreach($sizeList as $size)
        <tr>
            <td>{{ $size->name}}</td>
            <td >
                <a href="/admin/sizeAction/delete/{{$size->id}}" title="delete size" onclick="return confirm('sure?')" class="btn btn-danger">
                    delete
                </a>
                <a href="/admin/size/{{$size->id}}" title="edit size" class="btn btn-info">
                    edit
                </a>
            </td>
        </tr>
        @endforeach
        @endif
        </tbody>
    </table>

@stop