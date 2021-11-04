<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Tel extends Model
{
    use HasFactory;


    protected $guarded = [];

    public static function getContacts(){
        $records = DB::table('tels')->select('name','phone')->get()->toArray();
        return $records;
    }
}
