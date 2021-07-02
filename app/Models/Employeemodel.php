<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Employeecontroller;
use Illuminate\Support\Facades\Crypt;


class Employeemodel extends Model
{
    protected $table = 'employee';
    protected $fillable = ['fname','lname','images','password'];
    use HasFactory;

    public function role(){
        return $this->belongsTo(userrole::class);
    }
}