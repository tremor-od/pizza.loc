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
        {{ Form::model($size, array('url' => '/admin/sizeAction/edit/'.$size->id, 'class' => 'form-horizontal')) }}

        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">name:</label>
            <div class="col-sm-10">
                {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
            </div>
        </div>
        

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <a class="btn btn-default btn-md" href="/admin/size">Back</a>
                {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
            </div>
        </div>

        {{ Form::close() }}


    </div>
    <div class="clear"></div>

@stop