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
        {{ Form::model($product, array('url' => '/admin/productAction/edit/'.$product->id, 'class' => 'form-horizontal', 'files' => true)) }}
        <input name="productId" class="productId" type="hidden" value="{{$product->id}}">
        <div class="form-group">
            <label for="category_id" class="col-sm-2 control-label">Category:</label>
            <div class="col-sm-10">
                <select name="category_id" class="form-control" id="category_id">
                    @foreach($categoryList as $cat)
                        <option value="{{$cat->id}}" {{ ($cat->id == $product->category_id)?'selected':'' }}>{{$cat->name}}</option>
                        @foreach($cat->subcategoryList()->orderBy('sort')->get() as $subcat)
                            <option value="{{$subcat->id}}" {{ ($subcat->id == $product->category_id)?'selected':'' }}>{{$subcat->category['name'].' / '.$subcat->name}}</option>
                        @endforeach
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="is_featured" class="col-sm-2 control-label">Is Featured:</label>
            <div class="col-sm-10">
                {{ Form::select('is_featured', array(0 => 'no', 1 => 'yes'), null, array('class' => 'form-control', 'id' => 'is_featured'));}}
            </div>
        </div>
        <div class="form-group">
            <label for="is_new" class="col-sm-2 control-label">Is New:</label>
            <div class="col-sm-10">
                {{ Form::select('is_new', array(0 => 'no', 1 => 'yes'), null, array('class' => 'form-control', 'id' => 'is_new'));}}
            </div>
        </div>
        <div class="form-group">
            <label for="is_build_title" class="col-sm-2 control-label">Is Build Your Own Title:</label>
            <div class="col-sm-10">
                {{ Form::select('is_build_title', array(0 => 'no', 1 => 'yes'), null, array('class' => 'form-control', 'id' => 'is_build_title'));}}
            </div>
        </div>
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Title:</label>
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
            <label for="description" class="col-sm-2 control-label">Description:</label>
            <div class="col-sm-10">
                {{ Form::textarea('description', null, ['class' => 'form-control', 'id' => 'description']) }}
            </div>
        </div>
        {{--<div class="form-group">--}}
            {{--<label for="description2" class="col-sm-2 control-label">Description2:</label>--}}
            {{--<div class="col-sm-10">--}}
                {{--{{ Form::textarea('description2', null, ['class' => 'form-control', 'id' => 'description2']) }}--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="form-group">
            <label for="price" class="col-sm-2 control-label">Price:</label>
            <div class="col-sm-10">
                {{ Form::text('price', null, ['class' => 'form-control', 'id' => 'price']) }}
            </div>
        </div>
        <div class="form-group">
            <label for="show_price" class="col-sm-2 control-label">Show/hide price:</label>
            <div class="col-sm-10">
                {{ Form::select('show_price', array(0 => 'hide', 1 => 'show'), null, array('class' => 'form-control', 'id' => 'show_price'));}}
            </div>
        </div>
        <div class="form-group">
            <label for="sizes" class="col-sm-2 control-label">Sizes:</label>
            <div class="col-sm-10">
                <table class="table table-striped priceSizeTable">
                    <thead>
                    <tr>
                        <td>Size</td>
                        <td>Price</td>
                        <td>Sort</td>
                        <td>Add new size <button type="button" class="addNewPriceSize">+</button></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($product->sizeList()->orderBy('sort')->get() as $priceSize)
                    <tr>
                        <td>
                            <select class="form-control" name="size[{{$priceSize['id']}}][size_id]">
                                @foreach($sizeList as $size)
                                    <option value="{{$size->id}}" {{ ($priceSize['size_id'] == $size->id)?'selected':'' }}>{{$size->name}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="size[{{$priceSize['id']}}][price]" value="{{$priceSize['price']}}"/>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="size[{{$priceSize['id']}}][sort]" value="{{$priceSize['sort']}}"/>
                        </td>
                        <td>remove size <button type="button" class="removePriceSize" priceSizeId="{{$priceSize['id']}}">x</button></td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>


        <div class="form-group">
            <label for="group" class="col-sm-2 control-label">Groups:</label>
            <div class="col-sm-10">
                <table class="table table-striped groupTable">
                    <thead>
                    <tr>
                        <td>Group</td>
                        <td>Name</td>
                        <td>Price</td>
                        <td>Sort</td>
                        <td>Add new group <button type="button" class="addNewGroup">+</button></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($product->groupList()->orderBy('sort')->get() as $productGroup)
                        <tr>
                            <td>
                                <select class="form-control" name="group[{{$productGroup['id']}}][group_id]">
                                    @foreach($groupList as $group)
                                        <option value="{{$group->id}}" {{ ($productGroup['group_id'] == $group->id)?'selected':'' }}>{{$group->name}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="group[{{$productGroup['id']}}][name]" value="{{$productGroup['name']}}"/>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="group[{{$productGroup['id']}}][price]" value="{{$productGroup['price']}}"/>
                            </td>
                            <td>
                                <input type="text" class="form-control" name="group[{{$productGroup['id']}}][sort]" value="{{$productGroup['sort']}}"/>
                            </td>
                            <td>remove group <button type="button" class="removeGroup" groupId="{{$productGroup['id']}}">x</button></td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
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
            <label for="" class="col-sm-2 control-label">Image:</label>
            <div class="col-sm-2">
                {{Form::file('image');}}
            </div>
            <div class="col-sm-8">
                <img src="{{$product->image->url('thumb')}}" >
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <a class="btn btn-default btn-md" href="/admin/product">Back</a>
                {{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
            </div>
        </div>

        {{ Form::close() }}


    </div>
    <div class="clear"></div>

@stop