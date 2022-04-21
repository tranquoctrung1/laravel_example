<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Menu\CreateFormRequest;
use App\Http\Services\Menu\MenuService;
use App\Models\Menu;

class MenuController extends Controller
{

    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function create() {
        return view('admin.menu.add', [
            'title' => 'Add Item',
        ]);
    }

    public function add(CreateFormRequest $request)
    {

        $result = $this->menuService->create($request);

        return redirect()->back();
    }

    public function get()
    {
        $menus = $this->menuService->getAll();

        return view('admin.menu.index', [
            'title' => 'List Menu',
            'menus' => $menus,
        ]);
    }

    public function delete(Request $request)
    {
        $result = $this->menuService->delete($request);

        if($result) {
            return response()->json([
                'error' => false,
                'message' => 'Menu has been deleted',
            ]);
        }
        else {
            return response()->json([
                'error' => true,
                'message' => 'Menu has not been deleted',
            ]);
        }
    }

    public function update(Menu $menu){

        return view('admin.menu.update', [
            'title' => 'Update Item',
            'menu' => $menu,
        ]);
    }

    public function postUpdate(Menu $menu, CreateFormRequest $request)
    {
        $result =  $this->menuService->postUpdate($request, $menu);

        if($result) {
            return redirect()->route('menu')->with('success', 'Update Successful');
        }
        else {
            return redirect()->back()->with('error', 'Update Failed');
        }
    }
}
