<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>{{$seo['title']}}</title>
    <meta name="keywords" content="{{$seo['keywords']}}">
    <meta name="description" content="{{$seo['description']}}">

    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link href="/css/main.css" rel="stylesheet">
    <link href="/css/owl.carousel.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="navbar-wrapper">
    <div class="container">

        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/"><img src="/img/logo.png" /></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="numb"><a href="tel:{{$setting->phone}}" >{{$setting->phone}}</a></li>
                        @foreach($place['header'] as $headerPage)
                            <li><a href="{{route('page', array('alias' => $headerPage['alias']))}}">{{$headerPage['name']}}</a></li>
                        @endforeach
                        <?php $i = 1;?>
                        @foreach($socialList as $social)
                            <li class="{{ ($i == 1)?'left40 ':'' }}socli">
                                <a href="{{$social->link}}"  class="soc" target="_blank">
                                    <img src="{{$social->image->url('thumb')}}" />
                                </a>
                            </li>
                            <?php $i++;?>
                        @endforeach
                    </ul>
                </div>
            </div>
        </nav>

    </div>
</div>


@include('slider')


<!-- Marketing messaging and featurettes
================================================== -->
<div class="navbar-wrapper nav_b2">
    <div class="container">
        <nav class="navbar nn navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar1" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div id="navbar1" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav nav2">
                        @foreach($categoryList as $category)
                            <li class="{{ (Request::segment(2) == $category->alias) ? 'active':'' }}">
                                <?php $subcatList = $category->subcategoryList()->orderBy('sort')->get(); ?>
                                <a href="{{route('category', array('alias' => $category->alias))}}" style="background: url({{$category->image->url('thumb')}}) left center no-repeat;" class="drop" title="Bootstrap Related Resources">
                                {{--<a href="{{route('category', array('alias' => $category->alias))}}"  class="drop" title="Bootstrap Related Resources"--}}
                                    {{$category->name}}
                                    @if(count($subcatList) > 0)
                                        <span class="caret"></span>
                                    @endif
                                </a>
                                
                                @if(count($subcatList) > 0)
                                    <ul class="dropdown-menu">
                                        @foreach($subcatList as $subcat)
                                            <li>
                                                <a href="{{route('category', array('catAlias' => $category->alias, 'subAlias' => $subcat['alias']))}}">{{$subcat['name']}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    
                                @endif
                            </li>
                        @endforeach
                    </ul>
                    <div class="navbar-form navbar-right">
                        <a data-toggle="modal" data-target="#buildYourOwn" href=""><img src="/img/r_b_z.png" /></a>
                    </div>

                    <div id="buildYourOwn" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <button type="button" class="close close_build" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                <div class="modal-body modal_build">
                                    <div class="row">
                                        <div class="col-md-4 center_txt">
                                            @if($buildOwn->is_build_title == 1)
                                                <span class="ls">Build Your Own</span>
                                            @endif
                                            <img src="{{ $buildOwn->image->url('thumb') }}" />
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row">
                                                 <div class="col-md-6">
                                                    <div class="title_mod1_1">Description</div>
                                                    <div class="item_desc">
                                                        {{$buildOwn->description}}
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2"></div>
                                                        @if($buildOwn->price != 0 && $buildOwn->show_price == 1)
                                                            <div class="col-md-4 numb_atr">${{$buildOwn->price}}</div>
                                                        @endif
                                                        <div class="col-md-6 preord">
                                                            <a href="https://pepperinopizzeria.hungerrush.com" target="_blank"><span>order online</span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php $buildSizeList = $buildOwn->sizeList()->orderBy('sort')->get() ?>
                                                @if(count($buildSizeList) > 0)
                                                    <div class="col-md-6 price_item">
                                                        <div class="title_mod1_2">Price</div>
                                                        @foreach($buildOwn->sizeList()->orderBy('sort')->get() as $buildOwnSizes)
                                                            <div class="row">
                                                                <div class="col-md-8 col-xs-6 atr_name">
                                                                    {{$buildOwnSizes->size['name']}}
                                                                </div>
                                                                <div class="col-md-4 col-xs-6 numb_atr">
                                                                    @if($buildOwnSizes->price != 0 && $buildOwn->show_price == 1)
                                                                        ${{$buildOwnSizes->price}}
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        @endforeach
        
                                                    </div>
                                                @endif
                                                 
                                                  <div class="clearfix clear"></div>
        
                                                @foreach($groupList as $group)
                                                    <?php
                                                    $buildOwnGroupList = $buildOwn->groupList()->where('group_id', $group->id)->orderBy('sort')->get();
                                                    ?>
                                                    @if(count($buildOwnGroupList) > 0)
                                                        <div class="col-md-6 group_item">
                                                            <div class="title_mod1_2">{{$group->name}}</div>
                                                            @foreach($buildOwnGroupList as $buildOwnGroup)
                                                                <div class="row">
                                                                    <div class="col-md-8 col-xs-6 atr_name">
                                                                        {{$buildOwnGroup->name}}
                                                                    </div>
                                                                    <div class="col-md-4 col-xs-6 numb_atr">
                                                                        @if($buildOwnGroup->price != 0 && $buildOwn->show_price == 1)
                                                                            ${{$buildOwnGroup->price}}
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                </div>
            </div>
        </nav>
    </div>
</div>
<div class="wrapper mih">
    <div class="container">

        <div class="contur">

            <!------------------- content --------------------------->
            @yield('content')

        </div>
    </div>
</div>
<div class="navbar-wrapper foot_wrap">
    <div class="container">
        <footer>
            <div class="row">
                <div class="col-md-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar2" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div id="navbar2" class="navbar-collapse collapse">

                        <ul class="nav navbar-nav nav3">
                            @foreach($categoryList as $category)
                                <li class="{{ (Request::segment(2) == $category->alias) ? 'active':'' }}">
                                    <?php $subcatList = $category->subcategoryList()->orderBy('sort')->get(); ?>
                                    <a href="{{route('category', array('alias' => $category->alias))}}" style="background: url({{$category->image->url('thumb')}}) left center no-repeat;" class="drop" title="Bootstrap Related Resources">
                                    <!--a href="{{route('category', array('alias' => $category->alias))}}"  class="drop" title="Bootstrap Related Resources"-->
                                        {{$category->name}}
                                        @if(count($subcatList) > 0)
                                            <span class="caret"></span>
                                        @endif
                                    </a>
                                    
                                    @if(count($subcatList) > 0)
                                        <ul class="dropdown-menu">
                                            @foreach($subcatList as $subcat)
                                                <li>
                                                    <a href="{{route('category', array('catAlias' => $category->alias, 'subAlias' => $subcat['alias']))}}">{{$subcat['name']}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                        
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!--div id="navbar3" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            @foreach($place['footer'] as $footerPage)
                                <li><a href="{{route('page', array('alias' => $footerPage['alias']))}}">{{$footerPage['name']}}</a></li>
                            @endforeach
                        </ul>
                    </div-->
                </div>
                <div class="col-md-3">
                    <?php $i = 1;?>
                    @foreach($place['footer_right'] as $footerRightPlace)
                        @if($footerRightPlace['alias'] == 'downloadMenu')
                            <a href="/system/menu.jpg" class="foot_c_{{$i}}" download>{{$footerRightPlace['name']}}</a>
                        @else
                            <a href="{{route('page', array('alias' => $footerRightPlace['alias']))}}" class="foot_c_{{$i}}">{{$footerRightPlace['name']}}</a>
                        @endif

                        @if($i == 4)
                            <?php $i = 0;?>
                        @endif
                        
                        <?php $i++;?>
                    @endforeach
                    <ul class="nav navbar-nav">
                        @foreach($socialList as $social)
                            <li class="socli">
                                <a href="{{$social->link}}"  class="soc" target="_blank">
                                    <img src="{{$social->image->url('thumb')}}" />
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/js/bootstrap.min.js"></script>
<script src="/js/owl.carousel.js"></script>

</body>
</html>