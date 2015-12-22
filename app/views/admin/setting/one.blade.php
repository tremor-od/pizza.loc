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
        {{ Form::model($setting, array('url' => '/admin/settingAction/edit/'.$setting->id, 'class' => 'form-horizontal')) }}

        <div class="form-group">
            <label for="phone" class="col-sm-2 control-label">Phone:</label>
            <div class="col-sm-10">
                {{ Form::text('phone', null, ['class' => 'form-control', 'id' => 'phone']) }}
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email:</label>
            <div class="col-sm-10">
                {{ Form::email('email', null, ['class' => 'form-control', 'id' => 'email']) }}
            </div>
        </div>
        <div class="form-group">
            <label for="address" class="col-sm-2 control-label">Address:</label>
            <div class="col-sm-10">
                {{ Form::text('address', null, ['class' => 'form-control', 'id' => 'address']) }}
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
            </div>
        </div>

        {{ Form::close() }}


    </div>
    <div class="clear"></div>

@stop