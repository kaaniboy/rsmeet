<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Post extends Model
{
    use SearchableTrait;

    protected $searchable = [
    	'columns' => [
    		'title' => 10,
    		'description' => 10
    	]
    ];
}
