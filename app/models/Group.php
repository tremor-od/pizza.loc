<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 27.11.15
 * Time: 14:40
 */

class Group extends Eloquent  {

    protected $table = 'group';
    protected $primaryKey = 'id';
    protected $guarded = array();
}