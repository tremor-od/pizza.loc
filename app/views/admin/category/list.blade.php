<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 12.08.15
 * Time: 17:37
 */ ?>

@extends('admin.layout.layout')

@section('content')

    <a href="/admin/categoryAction/add" title="add category" class="btn btn-default btn-sm">
        <span class="glyphicon glyphicon-plus"></span> Add new category
    </a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Main</th>
            <th>Url</th>
            <th>Sort</th>
            <th>action</th>
        </tr>
        </thead>
        <tbody>

        @if($categoryList)
        @foreach($categoryList as $category)
            <tr class="category">
                <td>{{ $category->name}}</td>
                <td></td>
                <td>{{ $category->alias;}}</td>
                <td>{{ $category->sort;}}</td>
                <td >
                    <a href="/admin/categoryAction/delete/{{$category->id}}" title="delete category" onclick="return confirm('sure?')" class="btn btn-danger">
                        delete
                    </a>
                    <a href="/admin/category/{{$category->id}}" title="edit category" class="btn btn-info">
                        edit
                    </a>
                </td>
            </tr>
            @foreach($category->subcategoryList()->orderBy('sort')->get() as $subcat)
                <tr class="subcategory">
                    <td>{{ $subcat->name}}</td>
                    <td>{{$subcat->category['name']}}</td>
                    <td>{{ $subcat->alias;}}</td>
                    <td>{{ $subcat->sort;}}</td>
                    <td >
                        <a href="/admin/categoryAction/delete/{{$subcat->id}}" title="delete category" onclick="return confirm('sure?')" class="btn btn-danger">
                            delete
                        </a>
                        <a href="/admin/category/{{$subcat->id}}" title="edit category" class="btn btn-info">
                            edit
                        </a>
                    </td>
                </tr>
            @endforeach
        @endforeach
        @endif
        </tbody>
    </table>

@stop