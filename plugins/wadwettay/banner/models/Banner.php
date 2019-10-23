<?php namespace Wadwettay\Banner\Models;

use Model;

/**
 * Banner Model
 */
class Banner extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'wadwettay_banner_banners';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [
        'image' => ['System\Models\File'],
        'image_left' => ['System\Models\File'],
        'image_right' => ['System\Models\File'],
    ];
    public $attachMany = [];

    public function filterFields($fields, $context = null)
    {
        if ($this->location === 'double') {
            $fields->image_left->hidden = false;
            $fields->image_right->hidden = false;
        }else {
            $fields->image->hidden = false;
        }
    }
}
