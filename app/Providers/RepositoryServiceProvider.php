<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\BrandContract;
use App\Repositories\BrandRepository;
use App\Contracts\CategoryContract;
use App\Repositories\CategoryRepository;
use App\Contracts\CityContract;
use App\Repositories\CityRepository;
use App\Contracts\CountryContract;
use App\Repositories\CountryRepository;
use App\Contracts\OrderContract;
use App\Repositories\OrderRepository;
use App\Contracts\PermissionContract;
use App\Repositories\PermissionRepository;
use App\Contracts\ProductContract;
use App\Repositories\ProductRepository;
use App\Contracts\RoleContract;
use App\Repositories\RoleRepository;
use App\Contracts\UserContract;
use App\Repositories\UserRepository;
use App\Contracts\CartContract;
use App\Repositories\CartRepository;
use App\Contracts\SettingContract;
use App\Repositories\SettingRepository;
use App\Contracts\FlavorContract;
use App\Repositories\FlavorRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = [
        BrandContract::class            =>          BrandRepository::class,
        CategoryContract::class         =>          CategoryRepository::class,
        CityContract::class            =>          CityRepository::class,
        CountryContract::class            =>          CountryRepository::class,
        OrderContract::class            =>          OrderRepository::class,
        PermissionContract::class            =>          PermissionRepository::class,
        ProductContract::class          =>          ProductRepository::class,
        RoleContract::class          =>          RoleRepository::class,
        UserContract::class        =>          UserRepository::class,
        CartContract::class        =>          CartRepository::class,
        SettingContract::class        =>          SettingRepository::class,
        FlavorContract::class        =>          FlavorRepository::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $interface => $implementation)
        {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
