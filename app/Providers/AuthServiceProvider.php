<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use App\Policies\PostPolicy;
use Illuminate\Contracts\Auth\Access\Gate as Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Spatie\Permission\Models\Permission as Permission;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Post::class => PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(Gate $gate)
    {
        $this->registerPolicies($gate);

        $permissions = Permission::with('roles');
        foreach ($permissions as $permission) {
            $gate->define($permission->name, function (User $user) use ($permission) {
                return $user->hasPermission($permission);
            });
        }
        $gate->before(function (User $user, $ability) {
            if ($user->hasAnyRoles('admin')) {
                return true;
            }
        });
    }
}
