<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Advertisement;
use App\Models\Category;
use App\Models\City;
use App\Models\County;
use App\Models\Picture;
use App\Models\User;
use App\Models\Message;
use App\Policies\AdvertisementPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\UserPolicy;
use App\Policies\CountyPolicy;
use App\Policies\CityPolicy;
use App\Policies\PicturePolicy;
use App\Policies\MessagePolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Advertisement::class => AdvertisementPolicy::class,
        Category::class => CategoryPolicy::class,
        User::class => UserPolicy::class,
        County::class => CountyPolicy::class,
        City::class => CityPolicy::class,
        Picture::class => PicturePolicy::class,
        Message::class => MessagePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
