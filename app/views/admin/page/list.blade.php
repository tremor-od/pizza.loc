<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 12.08.15
 * Time: 17:37
 */ ?>

@extends('admin.layout.layout')

@section('content')

    <a href="/admin/pageAction/add" title="add page" class="btn btn-default btn-sm">
        <span class="glyphicon glyphicon-plus"></span> Add new page
    </a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Page url</th>
            <th>Name</th>
            <th>Place</th>
            <th>Show</th>
            <th>action</th>
        </tr>
        </thead>
        <tbody>

        @if($pageList)
        @foreach($pageList as $page)
        <tr>
            <td>{{ $page->alias}}</td>
            <td>{{ $page->name;}}</td>
            <td>{{ $page->place['name'];}}</td>
            <td>{{ ($page->active == 1)?'yes':'no' }}</td>
            <td >
                <a href="/admin/pageAction/delete/{{$page->id}}" title="delete page" onclick="return confirm('sure?')" class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-remove"></span> delete
                </a>
                <a href="/admin/page/{{$page->id}}" title="edit page" class="btn btn-default btn-sm">
                    <span class="glyphicon glyphicon-pencil"></span> edit
                </a>
            </td>
        </tr>
        @endforeach
        @endif
        </tbody>
    </table>



@stop