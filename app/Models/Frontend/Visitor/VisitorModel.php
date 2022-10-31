<?php

namespace App\Models\Frontend\Visitor;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorModel extends Model
{
    use HasFactory;

    protected $table = 'visitor';
    protected $primaryKey = 'visitor_id';
    protected $fillable = ['visitor_name', 'visitor_phone', 'visitor_email', 'visitor_age', 'visitor_address', 'visitor_occupation', 'visitor_image'];
}
