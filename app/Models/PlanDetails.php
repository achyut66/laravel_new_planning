<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'column1',
        'column2',
        // Add other columns here
    ];
}
