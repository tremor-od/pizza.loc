<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 16.02.15
 * Time: 15:15
 */?>
{{--<div class="modal fade">--}}
    {{--<div class="modal-dialog">--}}
        {{--<div class="modal-content">--}}
            {{--<div class="modal-header">--}}
                {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>--}}
                {{--<h4 class="modal-title">Modal title</h4>--}}
            {{--</div>--}}
            {{--<div class="modal-body">--}}
                {{--<p>One fine body&hellip;</p>--}}

@if(isset($messages['success']) && !empty($messages['success']))

    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>

        @foreach($messages['success'] as $message)
            <p>{{$message}}</p>
        @endforeach

    </div>

@endif

@if(isset($messages['error']) && !empty($messages['error']))

    <div class="alert alert-block alert-error fade in">
        <button class="close" type="button" data-dismiss="alert">x</button>

        @foreach($messages['error'] as $error)
            <p>{{$error}}</p>
        @endforeach

    </div>

@endif

            {{--</div>--}}
            {{--<div class="modal-footer">--}}
                {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
                {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
            {{--</div>--}}
        {{--</div><!-- /.modal-content -->--}}
    {{--</div><!-- /.modal-dialog -->--}}
{{--</div><!-- /.modal -->--}}