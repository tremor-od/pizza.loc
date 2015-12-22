<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 27.11.15
 * Time: 14:40
 */

class Setting extends Eloquent  {

    protected $table = 'setting';
    protected $primaryKey = 'id';
    protected $guarded = array();
}