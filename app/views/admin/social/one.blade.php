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
        {{ Form::model($social, array('url' => '/admin/socialAction/edit/'.$social->id, 'class' => 'form-horizontal', 'files' => true)) }}

        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Name:</label>
            <div class="col-sm-10">
                {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
            </div>
        </div>
        <div class="form-group">
            <label for="link" class="col-sm-2 control-label">Link:</label>
            <div class="col-sm-10">
                {{ Form::text('link', null, ['class' => 'form-control', 'id' => 'link', 'placeholder' => 'http://pizza.loc/']) }}
            </div>
        </div>
        <div class="form-group">
            <label for="sort" class="col-sm-2 control-label">Sort:</label>
            <div class="col-sm-10">
                {{ Form::text('sort', null, ['class' => 'form-control', 'id' => 'sort']) }}
            </div>
        </div>

        <div class="form-group">
            <label for="image" class="col-sm-2 control-label">Image:</label>
            <div class="col-sm-10">
                {{Form::file('image');}}
            </div>
        </div>

        <img src="<?= $social->image->url('thumb') ?>" >


        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <a class="btn btn-default btn-md" href="/admin/social">Back</a>
                {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
            </div>
        </div>

        {{ Form::close() }}


    </div>
    <div class="clear"></div>

@stop