<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 12.08.15
 * Time: 17:37
 */ ?>

@extends('admin.layout.layout')

@section('content')

    <a href="/admin/socialAction/add" title="add social" class="btn btn-default btn-sm">
        <span class="glyphicon glyphicon-plus"></span> Add new social
    </a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Sort</th>
            <th>action</th>
        </tr>
        </thead>
        <tbody>

        @if($socialList)
        @foreach($socialList as $social)
        <tr>
            <td>{{ $social->name}}</td>
            <td>{{ $social->sort;}}</td>
            <td >
                <a href="/admin/socialAction/delete/{{$social->id}}" title="delete social" onclick="return confirm('sure?')" class="btn btn-danger">
                    delete
                </a>
                <a href="/admin/social/{{$social->id}}" title="edit social" class="btn btn-info">
                    edit
                </a>
            </td>
        </tr>
        @endforeach
        @endif
        </tbody>
    </table>

@stop