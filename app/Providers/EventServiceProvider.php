<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Observers\CategoryObserver;
use App\Observers\MenuItemObserver;
use App\Observers\MenuObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        Menu::observe(MenuObserver::class);
        Category::observe(CategoryObserver::class);
        MenuItem::observe(MenuItemObserver::class);
    }
}
