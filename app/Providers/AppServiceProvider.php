<?php

namespace App\Providers;

use App\Models\ProfileType;
use App\Models\ProfileSubType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            if (auth()->check()) {
                $user = auth()->user();

                if(!$user)
                {
                    dd("O usuário não foi identificado.");
                }
                $userProfileId = $user->profile_id;
                $userProfileSubId = $user->profile_sub_id;

                // Get the Profile Informations
                $tmpProfile = (
                    is_null($userProfileSubId)
                        ? ProfileType::whereId($userProfileId)
                        : ProfileSubType::whereProfileId($userProfileId)
                            ->whereProfileSubId($userProfileSubId)
                    )->whereStatus(1)->first();
                
                // Security Verification
                if(is_null($tmpProfile))
                {
                    dd("A dashboard apropriada não foi encontrada.");
                }

                // if has SubProfile
                if(!is_null($userProfileSubId))
                {
                    $profile = $tmpProfile->profile;
                    $menu = $profile->dashboard.".".$tmpProfile->dashboard;
                } else {
                    $menu = $tmpProfile->dashboard;
                }

                $view->with('menu', $menu.".menu");
            }
        });
    }
}
