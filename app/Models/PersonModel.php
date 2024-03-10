<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PersonModel extends Model
{
    use HasFactory;

    public static function search($search)
    {
        $row = DB::table('persons')->select("person_id", "first_name", "last_name", "middle_name", "address", "email_address", "phone_number", "age", "extension", "status")->where(DB::raw("concat(first_name, ' ', last_name)"), 'LIKE', "%" . $search . "%")->get();
        return $row;
    }

    public static function get_to_approve()
    {
        return DB::table('persons')
            ->leftJoin('users as users', 'users.user_id', '=', 'persons.added_by')
            ->select(
                'persons.person_id as person_id',
                'persons.first_name as first_name',
                'persons.first_name as middle_name',
                'persons.first_name as last_name',
                'persons.first_name as extension',

                'persons.phone_number as phone_number',
                'persons.email_address as email_address',
                'persons.address as address',
                'persons.age as age',
                'persons.created_at as created_at',
                'persons.status as status',


                'users.first_name as user_first_name',
                'users.middle_name as user_middle_name',
                'users.last_name as user_last_name',
                'users.extension as user_extension',
                'users.user_id as user_id'
            )
            ->where('persons.status', 'not-approved')
            ->orderBy('persons.first_name', 'asc')->get();
    }

    public static function get_person_profile($id)
    {

        return DB::table('persons')
            ->leftJoin('users as users', 'users.user_id', '=', 'persons.added_by')
            ->select(
                'persons.person_id as person_id',
                'persons.first_name as first_name',
                'persons.first_name as middle_name',
                'persons.first_name as last_name',
                'persons.first_name as extension',

                'persons.phone_number as phone_number',
                'persons.email_address as email_address',
                'persons.address as address',
                'persons.age as age',
                'persons.created_at as created_at',
                'persons.status as status',


                'users.first_name as user_first_name',
                'users.middle_name as user_middle_name',
                'users.last_name as user_last_name',
                'users.extension as user_extension',
                'users.user_id as user_id'
            )
            ->where('persons.person_id',$id)
            ->orderBy('persons.first_name', 'asc')->first();
    }
}
