<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Menuitem\MenuItemStoreRequest;
use App\Http\Requests\Admin\Menuitem\MenuItemUpdateRequest;
use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuItemController extends BaseAdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $items = MenuItem::all();
        return view('admin.menu-item.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $menus = Menu::whereNotNull('published_at')->get();
        return view('admin.menu-item.create', [
            'item' => new MenuItem(),
            'menus' => $menus
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MenuItemStoreRequest  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(MenuItemStoreRequest $request)
    {
        $data = $request->all();
        $item = new MenuItem($data);
        $item->save();

        if ($item) {
            return redirect()
                ->route('admin.menu-item.edit', $item->id)
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit($id)
    {
        $item = MenuItem::findOrFail($id);
        $menus = Menu::whereNotNull('published_at')->get();
        return view('admin.menu-item.edit', [
            'item' => $item,
            'menus' => $menus
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MenuItemUpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(MenuItemUpdateRequest $request, $id)
    {
        $item = MenuItem::where('id', $id)->first();
        if (empty($item)) {
            back(404)
                ->withErrors(['message' => 'Запись не найдена'])
                ->withInput();
        }
        $data = $request->all();
        $result = $item->update($data);

        if ($result) {
            return redirect()
                ->route('admin.menu-item.edit', $item->id)
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $result = MenuItem::destroy($id);
        if ($result) {
            return redirect()
                ->route('admin.menu-item.index')
                ->with(['success' => 'Запись успешно удалена']);
        }
        return redirect()
            ->back()
            ->withErrors(['message' => 'Ошибка удаления'])
            ->withInput();
    }
}
