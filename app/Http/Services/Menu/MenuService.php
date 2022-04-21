<?php

namespace App\Http\Services\Menu;

use App\Models\Menu;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class MenuService
{
    public function create($request)
    {
        try
        {
            Menu::create([
                'name' => (string) $request->input('name'),
                'parent_id' =>(int) $request->input('parent_id'),
                'description' =>(string) $request->input('description'),
                'content' =>(string) $request->input('content'),
                'slug' => Str::slug($request->input('name'), '-'),
                'active' =>(string) $request->input('active') == "on" ? 1: 0,
            ]);

            Session::flash('success', 'Menu has been added');
        }
        catch (\Exception $err)
        {
            Session::flash('error', $err->getMessage());
            return false;
        }

        return true;
    }

    public function getAll(){
        return Menu::orderbyDesc('id')->paginate(20);
    }

    public function delete($request)
    {
        $id = $request->input('id');

        $menu = Menu::where('id', $id)->first();
        if($menu)
        {
            return Menu::where('id', $id)->delete();
        }
        else {
            return false;
        }
    }

    public function postUpdate($request, $menu)
    {
        $menu->name = (string) $request->input('name');
        $menu->parent_id = (int) $request->input('parent_id');
        $menu->description = (string) $request->input('description');
        $menu->content = (string) $request->input('content');
        $menu->active = (string) $request->input('active') == "on" ? 1: 0;
        $menu->save();

        return true;
    }

}
