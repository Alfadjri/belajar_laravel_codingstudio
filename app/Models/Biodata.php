<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
// model
use App\Models\User as User;
class Biodata extends Model
{
    use HasFactory;

    protected $table ="biodatas";
    protected $primaryKey = "id";
    protected $fillable = [
        'id_user',
        'nama_lengkap',
        'no_handphone',
    ];

    // relasi
    public function user() : HasOne
    {
        return $this->hasOne(User::class,'id_user','id_user');
    }
}
