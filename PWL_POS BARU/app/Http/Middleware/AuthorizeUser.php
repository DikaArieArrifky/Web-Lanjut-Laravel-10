<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthorizeUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ... $roles): Response
    {   //praktikum 2
        // $user = $request->user(); // ambil data user yg login
        //                             //fungsi user() diambil dari UseModel.php
        // if ($user->hasRole($role)) { //cek apakah user punya role yang diinginkan
        //     return $next($request);
        // }

        //praktikum 3
        $user_role = $request->user()->getRole(); //ambil data level_kode dari user yg login
        if(in_array($user_role, $roles)){ // cek apakah level_kode user ada di array $roles
            return $next($request); // jika ada maka lanjutkan request
        }

        //jika tidak punya role, maka tampilkan eror 403
        abort(403,'Forbidden, kamu tidak punya akses ke halaman ini');
    }
}
