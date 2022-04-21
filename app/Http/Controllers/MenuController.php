<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Menu\CreateFormRequest;
use App\Http\Services\Menu\MenuService;

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
}
