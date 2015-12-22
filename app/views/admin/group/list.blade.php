<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 12.08.15
 * Time: 17:37
 */ ?>

@extends('admin.layout.layout')

@section('content')

    <a href="/admin/groupAction/add" title="add group" class="btn btn-default btn-sm">
        <span class="glyphicon glyphicon-plus"></span> Add new group
    </a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>action</th>
        </tr>
        </thead>
        <tbody>

        @if($groupList)
        @foreach($groupList as $group)
        <tr>
            <td>{{ $group->name}}</td>
            <td >
                <a href="/admin/groupAction/delete/{{$group->id}}" title="delete group" onclick="return confirm('sure?')" class="btn btn-danger">
                    delete
                </a>
                <a href="/admin/group/{{$group->id}}" title="edit group" class="btn btn-info">
                    edit
                </a>
            </td>
        </tr>
        @endforeach
        @endif
        </tbody>
    </table>

@stop