<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::resource('blogposts', 'App\Policies\BlogpostPolicy');
        Gate::resource('admins', 'App\Policies\BlogpostPolicy');
        Gate::define('blogposts.categorie', 'App\Policies\BlogpostPolicy@categorie');
        Gate::define('blogposts.tag', 'App\Policies\BlogpostPolicy@tag');
    }
}
