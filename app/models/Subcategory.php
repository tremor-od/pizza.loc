<?php
/**
 * Created by PhpStorm.
 * User: oleg
 * Date: 26.11.15
 * Time: 12:03
 */

use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

class Subcategory extends Eloquent implements StaplerableInterface {

    use EloquentTrait;

    protected $table = 'subcategory';
    protected $primaryKey = 'id';
    protected $guarded = array();

    public function __construct(array $attributes = array()) {
        $this->hasAttachedFile('image', [
            'styles' => [
                'thumb' => '50x50',
            ]
        ]);

        parent::__construct($attributes);
    }

    public function category(){
        return $this->belongsTo('Category', 'category_id', 'id');
    }

}