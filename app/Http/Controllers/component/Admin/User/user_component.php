<?php

namespace App\Http\Controllers\component\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// model 
use App\Models\Biodata as Biodata;

use function PHPUnit\Framework\isEmpty;

class user_component extends Controller
{

    public function saerch(String $search = null , int $limit_per_page ){
        $biodatas = Biodata::select([
            'id_user',
            'nama_lengkap',
            'no_handphone',
        ]);
        // kalau di dalam database % itu maksudnya yang mirip
        if($search != null){
            $biodatas = $biodatas->where('nama_lengkap','like','%'.$search.'%');
        }
        $biodatas = $biodatas->paginate($limit_per_page);
        return $biodatas;
    }
}
