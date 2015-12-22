<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 30.11.15
 * Time: 15:52
 */ ?>

<tr>
    <td>
        <select class="form-control" name="size[{{$productSize->id}}][size_id]">
            @foreach($sizeList as $size)
                <option value="{{$size->id}}">{{$size->name}}</option>
            @endforeach
        </select>
    </td>
    <td>
        <input type="text" class="form-control" name="size[{{$productSize->id}}][price]"/>
    </td>
    <td>
        <input type="text" class="form-control" name="size[{{$productSize->id}}][sort]"/>
    </td>
    <td>remove size <button type="button" class="removePriceSize" priceSizeId="{{$productSize->id}}">x</button></td>
</tr>