<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YojanaUpload extends Model
{
    use HasFactory;

    // Define the table name if it's different from the default
    protected $table = 'plan_details';

    // Define the fillable attributes
    protected $fillable = [
        'program_name',
        'p_ward',
        'biniyojan_kisim',
        'anudan_kisim',
        'biniyojan_shrot',
        'anudan_rakam',
        'first',
        'second',
        'third',
        'fourth',
        'bajet_shrot',
        'rajpatra_no',
        'bajet_shirshak',
        'addedDate',
        'addedBy',
    ];
}
