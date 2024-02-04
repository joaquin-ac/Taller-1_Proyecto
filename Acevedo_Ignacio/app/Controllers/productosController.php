<?php

namespace App\Controllers;

use App\Models\productosModel;
use App\Models\categoriasModel;
use CodeIgniter\Controller;

class productosController extends Controller
{
    private $producto = "";
    private $categoria = "";
    public function __construct()
    {
        $this->categoria = new categoriasModel();
        $this->producto = new productosModel();
        $this->producto->join("Categoria", "Producto.Id_categoria = Categoria.Id_categoria", "LEFT");
    }

    public function index($dadoBaja = 'si')
    {
        
        $session = session();
        if (empty($session->get('isAdmin'))) {
            return $this->response->redirect('/Acevedo_ignacio');
        }

        $nombre = $this->request->getGet('nombre');
        if (isset($nombre) && $nombre != '') {
            $data['productos'] = $this->producto->where('Producto.Activo_producto', $dadoBaja)->groupStart()->like('Producto.Nombre_producto', $nombre)->orLike('Producto.Nombre_categoria', $nombre)->groupEnd()->orderBy('Producto.Id_producto', "ASC")->paginate(10);
            $data['categorias'] = $this->categoria->findAll();
            $data['pager'] = $this->producto->pager;
        } else {
            $data['productos'] = $this->producto->where('Producto.Activo_producto', $dadoBaja)->orderBy('Producto.Id_producto', "ASC")->paginate(10);
            $data['categorias'] = $this->categoria->findAll();
            $data['pager'] = $this->producto->pager;
        }

        return view('productos', $data);
    }

    public function insertar()
    {
        $session = session();
        if (empty($session->get('isAdmin'))) {
            return $this->response->redirect('/Acevedo_ignacio');
        }

        helper(['form']);
        $rules = [
            'Nombre' => 'required|min_length[2]|max_length[50]|is_unique[Producto.Nombre_producto]',
            'Descripcion' => 'required|min_length[2]|max_length[100]',
            'Precio' => 'required|decimal',
            'Cantidad' => 'required|integer',
            'userfile' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[userfile]',
                    'is_image[userfile]',
                    'mime_in[userfile,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                ]
            ]
        ];

        if (true) {

            $file = $this->request->getFile('userfile');
            $name = $file->getName();
            $path = 'assets/img/productos';
            if (!$file->hasMoved()) {
                $file->move($path);
            }

            $data = [
                'Nombre_producto' => $this->request->getVar('Nombre'),
                'Descripcion_producto' => $this->request->getVar('Descripcion'),
                'Precio_producto' => $this->request->getVar('Precio'),
                'Cantidad_producto' => $this->request->getVar('Cantidad'),
                'Id_categoria' => $this->request->getVar('Categoria'),
                'url_imagen_producto' => $name,
                'Activo_producto' => 'si',
            ];

            $session = session();
            $this->producto->insert($data);
            $session->setFlashdata('msg', 'producto correctamente añadido');
            return $this->response->redirect('/Acevedo_ignacio/productos');
        } else {
            $data['productos'] = $this->producto->where('Producto.Activo_producto', 'no')->orderBy('Producto.Id_producto', "ASC")->paginate(10);
            $data['categorias'] = $this->categoria->findAll();
            $data['validation'] = $this->validator;
            $data['pager'] = $this->producto->pager;
            return view('productos', $data);
        }
    }

    public function editar($id)
    {
        $session = session();
        if (empty($session->get('isAdmin'))) {
            return $this->response->redirect('/Acevedo_ignacio');
        }

        $data['producto'] = $this->producto->where('Id_producto', $id)->first();
        $data['categorias'] = $this->categoria->findAll();
        return view('actualizarProducto', $data);
    }

    public function actualizar($id)
    {
        $session = session();
        if (empty($session->get('isAdmin'))) {
            return $this->response->redirect('/Acevedo_ignacio');
        }


        helper(['form']);
        $producto = $this->producto->where('Id_producto', $id)->first();

        if ($this->request->getVar('Nombre') == $producto['Nombre_producto']) {
            $rules = [
                'Descripcion' => 'required|min_length[2]|max_length[100]',
                'Precio' => 'required|decimal',
                'Cantidad' => 'required|integer',
                'Categoria' => 'required|',
                'userfile' => [
                    'label' => 'Image File',
                    'rules' => [
                        'uploaded[userfile]',
                        'is_image[userfile]',
                        'mime_in[userfile,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    ],
                ]
            ];
        } else {
            $rules = [
                'Nombre' => 'required|min_length[2]|max_length[50]|is_unique[Producto.Nombre]',
                'Descripcion' => 'required|min_length[2]|max_length[100]',
                'Precio' => 'required|decimal',
                'Cantidad' => 'required|integer',
                'Categoria' => 'required|',
                'userfile' => [
                    'label' => 'Image File',
                    'rules' => [
                        'uploaded[userfile]',
                        'is_image[userfile]',
                        'mime_in[userfile,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                    ],
                ]
            ];
        }

        $file = $this->request->getFile('userfile');

        if (!$file->isValid()) {
            unset($rules['userfile']);
            $nameimagen = $producto['url_imagen_producto'];
        }

        if ($this->validate($rules)) {

            if ($file->isValid()) {
                $nameimagen = $file->getName();
                $path = 'assets/img/productos';
                if (!$file->hasMoved()) {
                    $file->move($path);
                }
            }

            $data = [
                'Nombre_producto' => $this->request->getVar('Nombre'),
                'Descripcion_producto' => $this->request->getVar('Descripcion'),
                'Precio_producto' => $this->request->getVar('Precio'),
                'Cantidad_producto' => $this->request->getVar('Cantidad'),
                'Id_categoria' => $this->request->getVar('Categoria'),
                'url_imagen_producto' => $nameimagen,
                'Activo_producto' => $this->request->getVar('Activo'),
            ];
            $this->producto->update($id, $data);
            return $this->response->redirect('/Acevedo_ignacio/productos');
        } else {
            $data['validation'] = $this->validator;
            $data['producto'] = $this->producto->where('Id_producto', $id)->first();
            return view('actualizarProducto', $data);
        }
    }

    public function borrar($id)
    {
        $session = session();
        if (empty($session->get('isAdmin'))) {
            return $this->response->redirect('/Acevedo_ignacio');
        }

        $data['producto'] = $this->producto->where('Id_producto', $id)->set('Activo_producto', 'no')->update();
        return $this->response->redirect('/Acevedo_ignacio/productos');
    }

}