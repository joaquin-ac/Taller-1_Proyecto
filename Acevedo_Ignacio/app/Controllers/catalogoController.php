<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\productosModel;
use App\Models\categoriasModelModel;

class catalogoController extends Controller
{
    public function index()
    {
        $productosModel = new productosModel();
        $productosModel->join("categoria","producto.Id_categoria = categoria.Id_categoria","LEFT");
        $nombre = $this->request->getGet('nombre');
        $order = $this->request->getGet('order') ?? "Nombre_categoria";
        $data['order'] = $order;
        $data['nombre'] = $nombre;
        if (isset($nombre) && $nombre != '') {
            $data['productos'] = $productosModel->where('Producto.Activo_producto', 'si')->where('Producto.Cantidad_producto !=', 0)->groupStart()->like('Producto.Nombre_producto', $nombre)->orLike('Categoria.Nombre_categoria', $nombre)->groupEnd()->orderBy($order, 'ASC')->paginate(8);
            $data['pager'] = $productosModel->pager;
        } else {
            $data['productos'] = $productosModel->where('Producto.Activo_producto','si')->where('Producto.Cantidad_producto !=', 0)->orderBy($order, 'ASC')->paginate(8);
            $data['pager'] = $productosModel->pager;
        }

        return view('catalogo', $data);
    }
}