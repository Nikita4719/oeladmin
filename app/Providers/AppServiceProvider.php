<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\StripeUsers;
use App\Models\settings;
use App\Models\PrayerTimetable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider {

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {



    //    resolve(\Illuminate\Routing\UrlGenerator::class)->forceScheme('https');

        Paginator::useBootstrapFive();
        // if (!Auth::check()) {
        //     $day = Carbon::now()->format('d');
        //     $month = Carbon::now()->format('m');
        //     $prayerTime = PrayerTimetable::where(['day' => $day, 'month' => $month])->first();
        //     $siteStting = settings::pluck('value', 'key')->toArray();
        //     View::share(['prayerTime' => $prayerTime, 'siteStting' => $siteStting]);
        // }

        // if ($this->app->environment('production')) {
        //     \URL::forceScheme('https');
        // }
    }

}
