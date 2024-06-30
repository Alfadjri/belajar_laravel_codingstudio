<?php

namespace App\Http\Controllers\restApi\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Controllers\component\Admin\User\user_component as C_User;

class userController extends C_User
{
    private $limit = 10;
    public function search_user(Request $request ){
        $value = $request->validate([
            'search' => ['nullable'],
            'limit' => ['nullable','numeric']
        ]);
        $value['search'] = (isset($value['search'])) ? $value['search'] : null;
        $value['limit'] = (isset($value['limit'])) ? $value['limit'] : $this->limit;
        $response = $this->saerch($value['search'],$value['limit']);
        return response()->json([
            'pesan' => "Berhasil menerima data",
            'result' => $response
        ],200);
    }
}
