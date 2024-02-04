<?php

namespace App\Controllers;

use \Config\Database;
use App\Models\productosModel;
use App\Models\usuariosModel;

class Home extends BaseController
{
    public function index()
    {
        $productosModel = new productosModel();
        $productosModel->join("categoria","producto.Id_categoria = categoria.Id_categoria","LEFT");
        $data['Corbatas'] = $productosModel->where('Categoria.Nombre_categoria', 'Corbatas')->where('Producto.Cantidad_producto !=', 0)->orderBy('Id_producto', 'ASC')->findAll();
        $data['primerCorbata'] = true;

        $productosModel = new productosModel();
        $productosModel->join("categoria","producto.Id_categoria = categoria.Id_categoria","LEFT");
        $data['Billeteras'] = $productosModel->where('Categoria.Nombre_categoria', 'Billeteras')->where('Producto.Cantidad_producto !=', 0)->orderBy('Id_producto', 'ASC')->findAll();
        $data['primerBilletera'] = true;

        $productosModel = new productosModel();
        $productosModel->join("categoria","producto.Id_categoria = categoria.Id_categoria","LEFT");
        $data['Relojes'] = $productosModel->where('Categoria.Nombre_categoria', 'Relojes')->where('Producto.Cantidad_producto !=', 0)->orderBy('Id_producto', 'ASC')->findAll();
        $data['primerReloj'] = true;

        return view('principal', $data);
    }
    public function quienes_somos()
    {
        return view('quienes_somos');
    }
    public function contactos()
    {
        return view('contactos');
    }
    public function comercializacion()
    {
        return view('comercializacion');
    }
    public function term_y_usos()
    {
        //cache()->clean();
        return view('term_y_usos');
    }
}
