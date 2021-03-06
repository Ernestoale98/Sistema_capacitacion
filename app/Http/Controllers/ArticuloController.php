<?php

/**
 *
 * @category  Articles
 * @version   1.0
 * @since     2019-24-04
 * @author    Ernesto <ernesto.munoz@cceo.com.mx>
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Importar Paginating Query
//use Illuminate\Support\Facades\DB;
//Importar el modelo
use App\Articulo;

class ArticuloController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $buscar = $request->buscar;
        $criterio = $request->criterio;
        if ($buscar == '') {
            $articulos = Articulo::join('categorias', 'articulos.idcategoria', '=', 'categorias.id')
                ->select('articulos.id', 'articulos.idcategoria', 'articulos.codigo', 'articulos.nombre', 'categorias.nombre as nombre_categoria', 'articulos.precio_venta', 'articulos.stock', 'articulos.descripcion', 'articulos.condicion')
                ->orderBy('articulos.id', 'desc')->paginate(3);
        } else {
            $articulos = Articulo::join('categorias', 'articulos.idcategoria', '=', 'categorias.id')
                ->select('articulos.id', 'articulos.idcategoria', 'articulos.codigo', 'articulos.nombre', 'categorias.nombre as nombre_categoria', 'articulos.precio_venta', 'articulos.stock', 'articulos.descripcion', 'articulos.condicion')
                ->where('articulos.' . $criterio, 'like', '%' . $buscar . '%')
                ->orderBy('articulos.id', 'desc')->paginate(3);
        }
        return [
            'pagination' => [
                'total'             => $articulos->total(),
                'current_page'      => $articulos->currentPage(),
                'per_page'          => $articulos->perPage(),
                'last_page'         => $articulos->lastPage(),
                'from'              => $articulos->firstItem(),
                'to'                => $articulos->lastItem(),
            ],
            'articulos' => $articulos
        ];
    }

    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $articulo = new Articulo();
        $articulo->fill($request->all());
        $articulo->condicion = '1';
        $articulo->save();
    }



    public function update(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $articulo = Articulo::findOrFail($request->id);
        $articulo->fill($request->all());
        $articulo->condicion = '1';
        $articulo->save();
    }

    public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $articulo = Articulo::findOrFail($request->id);
        $articulo->condicion = '0';
        $articulo->save();
    }

    public function activar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $articulo = Articulo::findOrFail($request->id);
        $articulo->condicion = '1';
        $articulo->save();
    }
}
