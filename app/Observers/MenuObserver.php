<?php

namespace App\Observers;

use App\Http\Requests\Admin\MenuStoreRequest;
use App\Models\Menu;
use Carbon\Carbon;

class MenuObserver
{
    /**
     * @param Menu $menu
     * @return void
     */
    public function creating(Menu $menu)
    {
        if (!empty(request('publish'))) {
            $menu['published_at'] = Carbon::createFromTimestamp(time())->toDate();
        }
    }

    /**
     * Handle the Menu "created" event.
     *
     * @param  \App\Models\Menu  $menu
     * @return void
     */
    public function created(Menu $menu)
    {
        //
    }

    /**
     * @param Menu $menu
     * @return void
     */
    public function updating(Menu $menu)
    {
        if (!empty(request('parent_id')) && request('parent_id') == 'null') {
            $menu['parent_id'] = null;
        }
        if (!empty(request('publish')) && empty($menu['published_at'])) {
            $menu['published_at'] = Carbon::createFromTimestamp(time())->toDate();
        }
        if (empty(request('publish'))) {
            $menu['published_at'] = null;
        }
    }

    /**
     * Handle the Menu "updated" event.
     *
     * @param  \App\Models\Menu  $menu
     * @return void
     */
    public function updated(Menu $menu)
    {
        //
    }

    /**
     * Handle the Menu "deleted" event.
     *
     * @param  \App\Models\Menu  $menu
     * @return void
     */
    public function deleted(Menu $menu)
    {
        //
    }

    /**
     * Handle the Menu "restored" event.
     *
     * @param  \App\Models\Menu  $menu
     * @return void
     */
    public function restored(Menu $menu)
    {
        //
    }

    /**
     * Handle the Menu "force deleted" event.
     *
     * @param  \App\Models\Menu  $menu
     * @return void
     */
    public function forceDeleted(Menu $menu)
    {
        //
    }
}
