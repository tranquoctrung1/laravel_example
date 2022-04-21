<?php

namespace App\Helpers;


class Helper {
    public static function menu($menus){
        $html = '';
        foreach($menus as $menu){
            $html .= '<tr>';
            $html .= '<td>'.$menu->id.'</td>';
            $html .= '<td>'.$menu->name.'</td>';
            $html .= '<td>'.$menu->parent_id.'</td>';
            $html .= '<td>'.$menu->description.'</td>';
            $html .= '<td>'.$menu->content.'</td>';
            $html .= '<td>'.$menu->active.'</td>';

            $html .= '<td>

                <a class="btn btn-primary btn-sm" href="/admin/menu/update/'.$menu->id.'">
                    <i class="fas fa-edit"></i>
                </a>
                <a class="btn btn-danger btn-sm" href="javascript:void(0)" onclick="deleteMenu('.$menu->id.')">
                    <i class="fas fa-trash"></i>
                </a>

            </td>';

            $html .= '</tr>';
        }
        return $html;
    }
}
