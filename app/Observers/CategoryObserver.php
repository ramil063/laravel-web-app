<?php

namespace App\Observers;

use App\Models\Category;
use Illuminate\Support\Str;

/**
 * Class CategoryObserver
 */
class CategoryObserver
{
    /**
     * @param Category $category
     * @return void
     */
    public function creating(Category $category)
    {
        if (empty(request('code'))) {
            $category['code'] = Str::slug($category['title'] ?? 'default_' . time());
        }
    }

    /**
     * @param Category $category
     * @return void
     */
    public function created(Category $category)
    {
        //
    }

    /**
     * @param Category $category
     * @return void
     */
    public function updating(Category $category)
    {
        if (empty(request('code'))) {
            $category['code'] = Str::slug($category['title'] ?? 'default_' . time());
        }
    }

    /**
     * @param Category $category
     * @return void
     */
    public function updated(Category $category)
    {
        //
    }

    /**
     * @param Category $category
     * @return void
     */
    public function deleted(Category $category)
    {
        //
    }

    /**
     * @param Category $category
     * @return void
     */
    public function restored(Category $category)
    {
        //
    }

    /**
     * @param Category $category
     * @return void
     */
    public function forceDeleted(Category $category)
    {
        //
    }
}
