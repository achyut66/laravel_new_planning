<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB; // Import the DB facade

class NagarAnugaman extends Model
{
    use HasFactory;
    protected $fillable = [
        'program_name',
        'p_ward',
        'post_name',
        'name',
        'address',
        'darta_no',
        'contact_number',
        'ward_no',
        'cit_no',
        'issued_district',
        'issued_date',
    ];
    public static function checkIfExists($darta_no)
    {
        // Perform the join query to check existence
        $exists = DB::table('plan_details')
            ->join('nagar_anugamen', 'plan_details.id', '=', 'nagar_anugamen.darta_no')
            ->where('nagar_anugamen.darta_no', $darta_no)
            ->exists();

        return $exists;
    }
}
