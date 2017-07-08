<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryBuilderController extends Controller
{
    public function tests()
    {
        // SELECT
        /*
        $users = DB::table('users')->get();
        dd($users);
        */

        // INSERT
        /*
        $insere = DB::table('users')->insert([
            [
                'name' => 'marcelo',
                'email' => 'marcelo@email.com',
                'password' => bcrypt('87128937')
            ],
            [
                'name' => 'Vinicius',
                'email' => 'vinicius@email.com',
                'password' => bcrypt('87128937')
            ]
        ]);
        dd($insere);
        */

        // UPDATE
        /*
        $update = DB::table('users')->where('email','vinicius@email.com')->update([
            'name' => 'Name update',
            'email' => 'email-update@email.com'
        ]);
        dd($update);
        */

        // DELETE
        /*
        $delete = DB::table('users')->where('id',3)->delete();
        dd($delete);
        */
    }

    public function testsDois()
    {
        //return DB::select("SELECT * FROM users");
        //return DB::table('users')->get();
        //return DB::table('users')->select('id as id_user','name as nome','email')->get();
        //return DB::table('users')->pluck('name');
        dd(DB::table('produto')->first());
    }

    public function testsTres()
    {
        //return DB::table('users')->count();
        //return DB::table('produto')->max('codigo');
        //return DB::table('produto')->min('codigo');
        return DB::table('produto')->avg('codigo');
    }

    public function where()
    {
        //$produtos = DB::table('produto')->where('id','!=',3)->get();
        /*
        $produtos = DB::table('produto')->where(
            [
                ['id','<>',3],
                ['id','<>',2]
            ]
        )->get();
        */

        /*
        $produtos = DB::table('produto')
                        ->where('id','<>',3)
                        ->orWhere('id','<>',2)
                        ->get();
        */

        //$produtos = DB::table('produto')->where('nome','like',"%cabi%")->get();

        //$produtos =  DB::table('produto')->whereIn('id',[1,2,3])->get();
        //$produtos = DB::table('produto')->whereNotIn('id',[1,3])->get();
        //$produtos = DB::table('produto')->whereNull('created_at')->get();
        //$produtos = DB::table('produto')->whereNotNull('created_at')->get();
        //$produtos = DB::table('produto')->whereBetween('codigo',[500,10000])->get();
        $produtos = DB::table('produto')->whereNotBetween('codigo',[500,10000])->get();

        return $produtos;
    }

    public function testsQuatro()
    {
        //$produtos = DB::table('produto')->select('id','nome')->orderBy('nome','desc')->get();
        $produtos = DB::table('produto')->select('id','nome')->skip(2)->take(10)->get();
        return $produtos;
    }
}
