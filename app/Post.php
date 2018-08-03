<?php

namespace App;

// use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  // use SearchableTrait;
  //
  // /**
  //  * Searchable rules.
  //  *
  //  * @var array
  //  */
  // protected $searchable = [
  //     /**
  //      * Columns and their priority in search results.
  //      * Columns with higher values are more important.
  //      * Columns with equal values have equal importance.
  //      *
  //      * @var array
  //      */
  //     'columns' => [
  //         'posts.title' => 10,
  //         'posts.title_es' => 10,
  //         'posts.description' => 5,
  //         'posts.description_es' => 5,
  //     ],
  // ];

  public function tags()
  {
    return $this->belongsToMany('App\Tag')->withTimestamps();
  }
}
