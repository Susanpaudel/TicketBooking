<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Travel;

class BusType extends Model
{
    use HasFactory;
    protected $guarded=[];
    public $table="bus_types";

    public function travels(){
        return $this->hasMany(Travel::class,'bus_type_id');
    }
}
