<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 12.08.15
 * Time: 17:37
 */ ?>

@extends('admin.layout.layout')

@section('content')

    <a href="/admin/sliderAction/add" title="add slider" class="btn btn-default btn-sm">
        <span class="glyphicon glyphicon-plus"></span> Add new slider
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

        @if($sliderList)
        @foreach($sliderList as $slider)
        <tr>
            <td>{{ $slider->name}}</td>
            <td>{{ $slider->sort;}}</td>
            <td >
                <a href="/admin/sliderAction/delete/{{$slider->id}}" title="delete slider" onclick="return confirm('sure?')" class="btn btn-danger">
                    delete
                </a>
                <a href="/admin/slider/{{$slider->id}}" title="edit slider" class="btn btn-info">
                    edit
                </a>
            </td>
        </tr>
        @endforeach
        @endif
        </tbody>
    </table>

@stop