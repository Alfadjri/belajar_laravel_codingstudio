<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Artisan;

class register extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_basic_test(): void
    {
    // kunci nya sebagai atasan atau tester atau qc atau qa di mana kita harus 
    // memberitahukan kalau yang kita mau itu apa ? 
    // example kasus
    // kita mau test fitur register
    // contoh codenya serpti ini 
        $response = $this->get('/login/register'); // cari tau url ini ada tidak ? 
        $response->assertStatus(200); // asusmi status nya harus 200  asseertStatus artinya status yang di munculkan apa ? 
        if($response->assertStatus(200)){
            // data dumy testing
           $data_user_test = [
            '_token' => csrf_token(),
            'email' => "TesertEmail@gmail.com",
            'nama_lengkap' => "kentanaka",
            'no_handphone' => "087718611101",
            'password' => "12345678",
           ];
           // membuat registrasi
           $response = $this->post('login/register',$data_user_test); // membuat user register
           $response->assertStatus(302); // asumsi kalau bereser register stausnya 302 found .
        }
        // logika test itu buat seingin kita saja 
        // terserah maun di apakan url yang berikan !
        $response = $this->get('/user');
        $response->assertStatus(200); 

        // ini unit test nya 
        // case nya saya mau kalau ada Accept application/json ini pastikan code error di 406
        // karena application/json itu adalah return untuk rest api 
        // saya gak mau /user itu ada rest api nya !
        // misal perintahnya gitu 
        
        $response = $this->withHeaders([
            'Accept' => 'application/json',
        ])->get('/user');
        $response->assertStatus(406);
    }
}
