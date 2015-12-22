<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 26.11.15
 * Time: 12:00
 */

use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

class Category extends Eloquent implements StaplerableInterface {

    use EloquentTrait;

    protected $table = 'category';
    protected $primaryKey = 'id';
    protected $guarded = array();

    public function __construct(array $attributes = array()) {
        $this->hasAttachedFile('image', [
            'styles' => [
                'thumb' => '60x50',
            ]
        ]);

        parent::__construct($attributes);
    }

    public function subcategoryList(){
//        return $this->hasMany('Category', 'id', 'main');
        return $this->hasMany('Category', 'main', 'id');
    }

    public function category(){
        return $this->belongsTo('Category', 'main', 'id');
    }
}