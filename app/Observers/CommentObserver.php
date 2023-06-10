<?php

namespace App\Observers;

use App\Models\Category;
use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Support\Str;

/**
 * Class CommentObserver
 */
class CommentObserver
{
    /**
     * @param Comment $comment
     * @return void
     */
    public function creating(Comment $comment)
    {
        //
    }

    /**
     * @param Comment $comment
     * @return void
     */
    public function created(Comment $comment)
    {
        //
    }

    /**
     * @param Comment $comment
     * @return void
     */
    public function updating(Comment $comment)
    {
        if (!empty(request('publish')) && empty($comment['published_at'])) {
            $comment['published_at'] = Carbon::createFromTimestamp(time())->toDate();
        }
        if (empty(request('publish'))) {
            $comment['published_at'] = null;
        }
    }

    /**
     * @param Comment $comment
     * @return void
     */
    public function updated(Comment $comment)
    {
        //
    }

    /**
     * @param Comment $comment
     * @return void
     */
    public function deleted(Comment $comment)
    {
        //
    }

    /**
     * @param Comment $comment
     * @return void
     */
    public function restored(Comment $comment)
    {
        //
    }

    /**
     * @param Comment $comment
     * @return void
     */
    public function forceDeleted(Comment $comment)
    {
        //
    }
}
