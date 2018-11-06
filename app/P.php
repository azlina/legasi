<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class P extends Model
{
	//https://stackoverflow.com/questions/30159257/base-table-or-view-not-found-1146-table-laravel-5
	public $table = "ps";
    // P.php
    //select field involved
    protected $fillable = ['name', 'desc','price'];
}
