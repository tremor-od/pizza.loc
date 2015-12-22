
@extends('layout.layout')

@section('content')
          <!-- Example row of columns -->
    <div class="row rrr">
        @foreach($productList as $product)
            <div class="col-md-4">
                <div>
                    
                    <a  data-toggle="modal" data-target="#product{{$product->id}}" href="">
                        <img class="item_img" src="{{ $product->image->url('thumb') }}" />
                    </a>
                    <a  data-toggle="modal" data-target="#product{{$product->id}}" href="">
                        <div class="title_item">{{ $product->name }}</div>
                    </a>
                    <div class="row">
                        <div class="col-md-5">
                            <span class="price">{{ ($product->price != 0 && $product->show_price == 1)?'$'.$product->price :'' }}</span>
                            {{--<span class="code">(12RT31)</span>--}}
                        </div>
                        <div class="col-md-7 right_pol">
                            <a href="https://pepperinopizzeria.hungerrush.com" target="_blank">
                                <span>order online</span>
                            </a>
                        </div>
                    </div>
                    @if($product->is_new == 1)
                        <img class="new" src="/img/new.png" />
                    @endif
                </div>
            </div>
        @endforeach
    </div>


<!--button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#gridSystemModal"> Launch demo modal </button-->
@foreach($productList as $product)
    <div id="product{{$product->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <button type="button" class="close close_build" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

          <div class="modal-body modal_build">
            <div class="row">
            
              <div class="col-md-4 center_txt">
                  @if($product->is_build_title == 1)
                    <span class="ls">Build Your Own</span>
                  @endif
                <img src="{{ $product->image->url('thumb') }}" />
              </div>
              <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6">
                        <div class="title_mod1_1">Description</div>
                        <div class="item_desc">
                            {{$product->description}}
                        </div>
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-4 numb_atr">{{ ($product->price != 0 && $product->show_price == 1)?'$'.$product->price :'' }}</div>
                            <div class="col-md-6 preord">
                                {{--<a href="#"><span>Preorder</span></a>--}}
                            </div>
                        </div>
                      </div>
                      
                      <div class="col-md-6 price_item">
                        <div class="title_mod1_2">Price</div>
                        @foreach($product->sizeList()->orderBy('sort')->get() as $productSizes)
                            <div class="row">
                                <div class="col-md-8 col-xs-6 atr_name">
                                    {{$productSizes->size['name']}}
                                </div>
                                <div class="col-md-4 col-xs-6 numb_atr">
                                    @if($productSizes->price != 0 && $product->show_price == 1)
                                        ${{$productSizes->price}}
                                    @endif
                                </div>
                            </div>
                        @endforeach
        
                      </div>
                        <div class="clearfix clear"></div>
        
                        @foreach($groupList as $group)
                            <?php
                            $productGroupList = $product->groupList()->where('group_id', $group->id)->orderBy('sort')->get();
                            ?>
                            @if(count($productGroupList) > 0)
                                <div class="col-md-6 group_item">
                                    <div class="title_mod1_2">{{$group->name}}</div>
                                    @foreach($productGroupList as $productGroup)
                                        <div class="row">
                                            <div class="col-md-8 col-xs-6 atr_name">
                                                {{$productGroup->name}}
                                            </div>
                                            <div class="col-md-4 col-xs-6 numb_atr">
                                                @if($productGroup->price != 0 && $product->show_price == 1)
                                                    ${{$productGroup->price}}
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
          <!--div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div-->
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endforeach

@stop

