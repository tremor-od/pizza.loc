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
        {{ Form::model($page, array('url' => '/admin/pageAction/edit/'.$page->id, 'class' => 'form-horizontal')) }}

        <div class="form-group">
            <label for="active" class="col-sm-2 control-label">Active:</label>
            <div class="col-sm-10">
                {{ Form::select('active', array(1 => 'show', 0 => 'hide'), null, array('class' => 'form-control', 'id' => 'active'));}}
            </div>
        </div>
        <div class="form-group">
            <label for="place_id" class="col-sm-2 control-label">Place:</label>
            <div class="col-sm-10">
                {{ Form::select('place_id', $placeList, null, array('class' => 'form-control', 'id' => 'place_id'));}}
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Name:</label>
            <div class="col-sm-10">
                {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
            </div>
        </div>
        <div class="form-group">
            <label for="alias" class="col-sm-2 control-label">Url:</label>
            <div class="col-sm-10">
                {{ Form::text('alias', null, ['class' => 'form-control', 'id' => 'alias']) }}
            </div>
        </div>
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">Title:</label>
            <div class="col-sm-10">
                {{ Form::text('title', null, ['class' => 'form-control', 'id' => 'title']) }}
            </div>
        </div>
        <div class="form-group">
            <label for="text" class="col-sm-2 control-label">Text:</label>
            <div class="col-sm-10">
                {{ Form::textarea('text', null, ['class' => 'tinymce', 'id' => 'text',]) }}
            </div>
        </div>
        <div class="form-group">
            <label for="sort" class="col-sm-2 control-label">Sort:</label>
            <div class="col-sm-10">
                {{ Form::text('sort', null, ['class' => 'form-control', 'id' => 'sort']) }}
            </div>
        </div>


        <br/><br/>
        <!-- SEO -->
        <div class="form-group">
            <label for="seo_title" class="col-sm-2 control-label">Seo title:</label>
            <div class="col-sm-10">
                {{ Form::text('seo_title', null, ['class' => 'form-control', 'id' => 'seo_title']) }}
            </div>
        </div>
        <div class="form-group">
            <label for="seo_keywords" class="col-sm-2 control-label">Seo keywords:</label>
            <div class="col-sm-10">
                {{ Form::text('seo_keywords', null, ['class' => 'form-control', 'id' => 'seo_keywords']) }}
            </div>
        </div>
        <div class="form-group">
            <label for="seo_description" class="col-sm-2 control-label">Seo description:</label>
            <div class="col-sm-10">
                {{ Form::text('seo_description', null, ['class' => 'form-control', 'id' => 'seo_description']) }}
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <a class="btn btn-default btn-md" href="/admin/page">Back</a>
                {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
            </div>
        </div>

        {{ Form::close() }}


    </div>
    <div class="clear"></div>

@stop