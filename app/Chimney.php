<?php

namespace DymaVDomeNet;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Chimney extends Model
{
    protected $guarded = [];

    use SearchableTrait;

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        'columns' => [
            'name' => 10,
            'description' => 10,
        ],
    ];
}
