<?php

namespace App\Http\Controllers;

use App\Apple;
use App\Storage;
use App\User;
use Carbon\Carbon;

/**
 * Class ApplesController
 * @package App\Http\Controllers
 */
class ApplesController extends Controller
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection|Apple[]
     */
    public function getFreeApples()
    {
        $apples = Apple::select('id')->doesntHave('users');

        return $apples->get();
    }

    /**
     * Забирает доступное яблоко
     * Пользователи не могут брать яблоки с 10 секундным интервалом
     * Пользователи могут брать только нечетные яблоки
     * -------------------------------------------------
     * Grabs an available apple
     * Users can not take apples with a 10 second interval
     * Users can only take odd apples
     *
     * @param User $user
     * @return string
     */
    public function grabApple(User $user)
    {
        $lastGrabApple = Storage::latest()->first();

        if (!is_null($lastGrabApple)) {
            $lastTimeGrab = new Carbon($lastGrabApple->created_at);
            if (Carbon::now()->diffInSeconds($lastTimeGrab) <= 10) {
                return redirect()->route('home');
            }
        }

        $appleDoesntHaveUsers = Apple::doesntHave('users')->whereRaw('MOD(id, 2) > 0')->first();

        if (!is_null($appleDoesntHaveUsers)) {
            $user->apples()->attach($appleDoesntHaveUsers->id);
        }

        return redirect()->route('home');
    }

    /**
     * Очищает корзину
     * Make free basket
     * @return string
     */
    public function deleteGrabbedApples()
    {
        Storage::truncate();

        return redirect()->route('home');
    }
}