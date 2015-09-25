<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Developer;

Route::get('/', function () {
    $developers = Developer::all();
 
    return view("index", [
        "developers" => $developers
    ]);
});

Route::get("redirect/github", function () {
    return Socialite::with("github")->redirect();
});
 
Route::get("connect/github", function () {
    $data = Socialite::with("github")->user();
    
    $developer = Developer::where("github_id", $data->id)
        ->first();

    if (!$developer) {
        Developer::create([
            "github_id"       => $data->id,
            "github_nickname" => $data->nickname,
            "github_name"     => $data->name,
            "github_email"    => $data->email,
            "github_avatar"   => $data->avatar
        ]);
    }

    return redirect("/");
});