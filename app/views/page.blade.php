@extends('layout.layout')

@section('content')
    <!-- Example row of columns -->
    <div class="tit_ab ls">{{$page->name}}</div>
    <div class="row">
        <div class="col-md-12">
            <div class="bg_white">

                <div class="news_item">
                    <div class="tit ls">{{$page->title}}</div>
                    <div class="desc_ab">
                        {{$page->text}}
                    </div>
                </div>

            </div>
        </div>

        <div class="col-md-4 con">
            <img src="/img/loc.png" />
            <span class="cont">{{$setting->address}}  </span>
        </div>
        <div class="col-md-4 con">
            <img src="/img/mail.png" />
            <span class="cont"><a  href="mailto:{{$setting->email}}">{{$setting->email}}</a></span>
        </div>
        <div class="col-md-4 con">
            <img src="/img/tel.png" />
            <span class="cont"><a href="tel:{{$setting->phone}}">{{$setting->phone}}</a></span>
        </div>
    </div>
@stop
