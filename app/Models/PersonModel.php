<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PersonModel extends Model
{
    use HasFactory;

    public static function search($search){
        $row = DB::table('persons')->select("person_id", "first_name", "last_name", "middle_name", "address", "email_address", "phone_number", "age", "extension","status")->where(DB::raw("concat(first_name, ' ', last_name)"), 'LIKE', "%" . $search . "%")->get();
        return $row;
    }
}
