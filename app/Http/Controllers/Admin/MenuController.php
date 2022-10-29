<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\MenuUpdateRequest;
use App\Models\Menu;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $item = Menu::findOrFail($id);
        if (empty($item)) {
            back(404)
                ->withErrors(['message' => 'Запись не найдена'])
                ->withInput();
        }
        $data = $request->all();
        if (!empty($data['parent_id']) && $data['parent_id'] == 'null') {
            $data['parent_id'] = null;
        }
        if (!empty($data['publish'])) {
            $data['published_at'] = Carbon::createFromTimestamp(time())->toDate();
        } else {
            $data['published_at'] = null;
        }
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
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
