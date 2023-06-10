<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Comment\CommentUpdateRequest;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;

/**
 * Class CommentController
 */
class CommentController extends BaseAdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $items = Comment::all();
        return view('admin.comment.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $item = Comment::findOrFail($id);
        return view('admin.comment.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CommentUpdateRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(CommentUpdateRequest $request, $id)
    {
        $item = Comment::where('id', $id)->first();
        if (empty($item)) {
            back(404)
                ->withErrors(['message' => 'Запись не найдена'])
                ->withInput();
        }
        $data = $request->all();
        $result = $item->update($data);

        if ($result) {
            return redirect()
                ->route('admin.comment.edit', $item->id)
                ->with(['success' => 'Запись успешно сохранена']);
        }
        return back()
            ->withErrors(['message' => 'Ошибка сохранения'])
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $result = Comment::destroy($id);
        if ($result) {
            return redirect()
                ->route('admin.comment.index')
                ->with(['success' => 'Запись успешно удалена']);
        }
        return back()
            ->withErrors(['message' => 'Ошибка удаления'])
            ->withInput();
    }
}
