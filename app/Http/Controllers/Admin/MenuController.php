<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\Menu\MenuStoreRequest;
use App\Http\Requests\Admin\Menu\MenuUpdateRequest;
use App\Models\Menu;

/**
 * Class MenuController
 */
class MenuController extends BaseAdminController
{
    /**
     *
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $menus = Menu::all();
        return view('admin.menu.index', [
            'menus' => $menus
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
        return view('admin.menu.create', [
            'menu' => new Menu(),
            'menus' => $menus
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MenuStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(MenuStoreRequest $request)
    {
        $data = $request->all();
        $item = new Menu($data);
        $item->save();

        if ($item) {
            return redirect()
                ->route('admin.menu.edit', $item->id)
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
        $menu = Menu::findOrFail($id);
        $menus = Menu::where('id', '<>', $id)->get();
        return view('admin.menu.edit', [
            'menu' => $menu,
            'menus' => $menus
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MenuUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(MenuUpdateRequest $request, $id)
    {
        $item = Menu::where('id', $id)->first();
        if (empty($item)) {
            back(404)
                ->withErrors(['message' => 'Запись не найдена'])
                ->withInput();
        }
        $data = $request->all();
        $result = $item->update($data);

        if ($result) {
            return redirect()
                ->route('admin.menu.edit', $item->id)
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
        $result = Menu::destroy($id);
        if ($result) {
            return redirect()
                ->route('admin.menu.index')
                ->with(['success' => 'Запись успешно удалена']);
        }
        return redirect()
            ->back()
            ->withErrors(['message' => 'Ошибка удаления'])
            ->withInput();
    }
}
