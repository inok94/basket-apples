<?php

namespace App\Http\Controllers;

use App\User;

use App\Http\Requests;

class HomeController extends Controller
{

    /**
     * @return string
     */
    public function getHome() {

        $users = User::all();
        $basketApples = app('apples.repo')->getFreeApples();

        return view('site.home', [
            'users' => $users,
            'basketApples' => $basketApples,
        ]);
    }

    /**
     * @param int $user_id
     * @return string
     */
    public function getTakeApple($user_id) {

        \Log::info("apple grabbed by {$user_id}");

        return redirect('/');
    }

    /**
     * @return string
     */
    public function getFreeApples() {

        \Log::info("freedom");

        return redirect('/');
    }


}
