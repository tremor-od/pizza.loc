<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 30.11.15
 * Time: 18:20
 */ ?>

<tr>
    <td>
        <select class="form-control" name="group[{{$productGroup->id}}][group_id]">
            @foreach($groupList as $group)
                <option value="{{$group->id}}">{{$group->name}}</option>
            @endforeach
        </select>
    </td>
    <td>
        <input type="text" class="form-control" name="group[{{$productGroup->id}}][name]" value="{{$productGroup->name}}"/>
    </td>
    <td>
        <input type="text" class="form-control" name="group[{{$productGroup->id}}][price]" value="{{$productGroup->price}}"/>
    </td>
    <td>
        <input type="text" class="form-control" name="group[{{$productGroup->id}}][sort]" value="{{$productGroup->sort}}"/>
    </td>
    <td>remove group <button type="button" class="removeGroup" groupId="{{$productGroup->id}}">x</button></td>
</tr>