<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MenusController extends Controller{
    public function index(Request $request){
        $orderBy = 'nombre';
        $asc = 'ASC';
        if ($request->orderBy) {
            $orderBy = $request->orderBy;
        }
        if ($request->ascending) {
            $asc = 'ASC';
        } else {
            $asc = 'DESC';
        }

        $skip = 0;
        $take = 25;
        if ($request->limit) {
            $skip = $request->limit * ($request->page - 1);
            $take = $request->limit;
        }

        $menu = Menu::orderBy($orderBy, $asc);
        $menu = $menu->select(Menu::getCamposQuery($request->columnas?$request->columnas:[]));
        if ($request->query('query')) {
            $menu = $menu->where('nombre', 'LIKE', '%' . $request->query('query') . '%')
                ->orWhere('slug', 'LIKE', '%' . $request->query('query') . '%');
        }

        $count = $menu->count();
        $menu = $menu->skip($skip)->take($take);
        $menu = $menu->get();

        return response()->json([
            'full_columns'=>Menu::campos(),
            'columns'=>Menu::getCamposColumnas($request->columnas?$request->columnas:null),
            'data' => $menu,
            'count' => $count
        ]);
    }

    public function store(Request $request){
        $menu = new Menu();
        return $this->guardarMenu($menu, $request);
    }

    public function show($id){
        $menu = Menu::with(['destinos'])->findOrFail($id);
        $menu->destinos_id = $menu->destinos->pluck('destino');
        return response()->json(['menu' => $menu]);
    }

    public function update(Request $request, $id){
        $menu = Menu::findOrFail($id);
        return $this->guardarMenu($menu, $request);
    }
    public function updateGrape(Request $request, $id){
        $menu = Menu::findOrFail($id);
        $menu->html = $request->html;
        $menu->css = $request->css;
        $menu->save();

        return response()->json(['menu' => $menu]);
    }

    public function destroy($id){
        Menu::destroy($id);
        Storage::delete(Storage::allFiles('/menu/'. $id . '/imagenes'));
        return response()->json(['result' => 'OK'], 200);
    }

    private function guardarMenu($menu, Request $request){

        $menu->nombre = $request->nombre;
        $menu->slug = $request->slug;
        $menu->diseno = $request->diseno;
        $menu->html = $request->html;
        $menu->css = $request->css;
        $menu->tipo = $request->tipo;
        $menu->url = $request->url;
        $menu->target = $request->target;

        if ($menu->tipo == Config::get('tipos_menu.menu')) {
            $menu->url = null;
            $menu->target = null;
        } else if ($menu->tipo == Config::get('tipos_menu.url')) {
            $menu->html = null;
            $menu->css = null;
        }

        $customMessages = [
            'nombre.required' => Lang::get('site.msg_error_nombre'),
            'slug.required' => Lang::get('site.msg_error_slug'),
            'slug.right_slug' => Lang::get('site.msg_error_slug_incorrecto'),
            'slug.unique' => Lang::get('site.msg_error_slug_unique'),
        ];

        Validator::extend('right_slug', function ($permisos, $valor) {
            if (preg_match('/\s/', $valor)) {
                return false;
            }
            return true;
        });

        if ($menu->id) {
            // VALIDAR DATOS
            $validateData = $request->validate([
                'nombre' => 'required',
                'orden' => 'required',
                'url' => 'required_if:tipo,2,url',
                'target' => 'required_if:tipo,2',
                'slug' => 'required|unique:menus,id|right_slug',
            ], $customMessages);

            // MANTENER EL ORDEN
            $menus_internos = Menu::where('orden', '>', $menu->orden)->where('orden', '<=', $request->orden)
                ->where('id', '!=', $menu->id)->get();
            foreach ($menus_internos as $menul) {
                $menul->orden = $menul->orden - 1;
                $menul->save();
            }

            $menus_internos = Menu::where('orden', '<', $menu->orden)->where('orden', '>=', $request->orden)
                ->where('id', '!=', $menu->id)->get();
            foreach ($menus_internos as $menul) {
                $menul->orden = $menul->orden + 1;
                $menul->save();
            }
        } else {
            // VALIDAR DATOS
            $validateData = $request->validate([
                'nombre' => 'required',
                'orden' => 'required',
                'url' => 'required_if:tipo,2|url',
                'target' => 'required_if:tipo,2',
                'slug' => 'required|unique:menus|right_slug',
            ], $customMessages);

            // MANTENER EL ORDEN
            $menus_superiores = Menu::where('orden', '>=', $request->orden)->get();
            foreach ($menus_superiores as $menul) {
                $menul->orden = $menul->orden + 1;
                $menul->save();
            }
        }
        $menu->orden = $request->orden;
        $menu->save();

        DB::table('menu_destinos')->where('menu_id', $menu->id)->delete();
        foreach ($request->destinos as $destino) {
            DB::table('menu_destinos')->insert([
                'menu_id' => $menu->id,
                'destino' => $destino
            ]);
        }

        return response()->json(['menu' => $menu]);
    }

    public function previewSlug($slug, Request $request){
        $menu = Menu::where('slug', $slug)->first();
        return view('slug', ['menu' => $menu]);
    }
}
