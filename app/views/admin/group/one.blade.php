<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 12.08.15
 * Time: 17:37
 */ ?>

@extends('admin.layout.layout')

@section('content')

    <div class="col-md-12">

        <h2 class="text-center">{{$active}}</h2>
        {{ Form::model($group, array('url' => '/admin/groupAction/edit/'.$group->id, 'class' => 'form-horizontal')) }}

        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Name:</label>
            <div class="col-sm-10">
                {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
            </div>
        </div>
        <div class="form-group">
            <label for="sort" class="col-sm-2 control-label">Sort:</label>
            <div class="col-sm-10">
                {{ Form::text('sort', null, ['class' => 'form-control', 'id' => 'sort']) }}
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <a class="btn btn-default btn-md" href="/admin/group">Back</a>
                {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
            </div>
        </div>

        {{ Form::close() }}


    </div>
    <div class="clear"></div>

@stop