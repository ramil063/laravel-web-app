<?php

namespace App\Observers;

use App\Models\Menu;
use App\Models\MenuItem;
use Carbon\Carbon;

/**
 * Class MenuObserver
 */
class MenuItemObserver
{
    /**
     * @param MenuItem $menuItem
     * @return void
     */
    public function creating(MenuItem $menuItem)
    {
        if (!empty(request('publish'))) {
            $menuItem['published_at'] = Carbon::createFromTimestamp(time())->toDate();
        }
    }

    /**
     * Handle the Menu "created" event.
     *
     * @param  \App\Models\MenuItem $menuItem
     * @return void
     */
    public function created(MenuItem $menuItem)
    {
        //
    }

    /**
     * @param MenuItem $menuItem
     * @return void
     */
    public function updating(MenuItem $menuItem)
    {
        if (!empty(request('publish')) && empty($menuItem['published_at'])) {
            $menuItem['published_at'] = Carbon::createFromTimestamp(time())->toDate();
        }
        if (empty(request('publish'))) {
            $menuItem['published_at'] = null;
        }
    }

    /**
     * Handle the Menu "updated" event.
     *
     * @param  \App\Models\MenuItem $menuItem
     * @return void
     */
    public function updated(MenuItem $menuItem)
    {
        //
    }

    /**
     * Handle the Menu "deleted" event.
     *
     * @param  \App\Models\MenuItem $menuItem
     * @return void
     */
    public function deleted(MenuItem $menuItem)
    {
        //
    }

    /**
     * Handle the Menu "restored" event.
     *
     * @param  \App\Models\MenuItem $menuItem
     * @return void
     */
    public function restored(MenuItem $menuItem)
    {
        //
    }

    /**
     * Handle the Menu "force deleted" event.
     *
     * @param  \App\Models\MenuItem $menuItem
     * @return void
     */
    public function forceDeleted(MenuItem $menuItem)
    {
        //
    }
}
