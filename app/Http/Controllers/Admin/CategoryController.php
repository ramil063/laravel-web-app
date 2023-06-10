<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Category\CategoryStoreRequest;
use App\Http\Requests\Admin\Category\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class CategoryController
 */
class CategoryController extends BaseAdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index()
    {
        $items = Category::all();
        return view('admin.category.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $items = Category::all();
        return view('admin.category.create', [
            'item' => new Category(),
            'items' => $items
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryStoreRequest $request
     * @return RedirectResponse|Response
     */
    public function store(CategoryStoreRequest $request)
    {
        $data = $request->all();
        $item = new Category($data);
        $item->save();

        if ($item) {
            return redirect()
                ->route('admin.category.edit', $item->id)
                ->with(['success' => 'Запись успешно сохранена']);
        }
        return back()
            ->withErrors(['message' => 'Ошибка сохранения'])
            ->withInput();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Renderable
     */
    public function edit($id)
    {
        $item = Category::findOrFail($id);
        $items = Category::where('id', '<>', $id)->get();
        return view('admin.category.edit', [
            'item' => $item,
            'items' => $items
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryUpdateRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(CategoryUpdateRequest $request, $id)
    {
        $item = Category::where('id', $id)->first();
        if (empty($item)) {
            back(404)
                ->withErrors(['message' => 'Запись не найдена'])
                ->withInput();
        }
        $data = $request->all();
        $result = $item->update($data);

        if ($result) {
            return redirect()
                ->route('admin.category.edit', $item->id)
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
        $result = Category::destroy($id);
        if ($result) {
            return redirect()
                ->route('admin.category.index')
                ->with(['success' => 'Запись успешно удалена']);
        }
        return back()
            ->withErrors(['message' => 'Ошибка удаления'])
            ->withInput();
    }
}
