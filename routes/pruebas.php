<?php


use Illuminate\Support\Facades\Route;

 Route:: get('/',function () {
    return 'welcome';
});
 Route:: get('/inicio',function () {
    return view('welcome');
});