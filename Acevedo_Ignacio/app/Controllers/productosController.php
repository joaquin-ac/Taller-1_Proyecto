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
        $this->producto->join("categoria", "producto.Id_categoria = categoria.Id_categoria", "LEFT");
    }

    public function index($dadoBaja = 'si')
    {

        $session = session();
        if (empty($session->get('isAdmin'))) {
            return $this->response->redirect('/Acevedo_ignacio');
        }

        $nombre = trim($this->request->getGet('nombre'));
        if (isset($nombre) && $nombre != '') {
            $data['productos'] = $this->producto->where('Activo_producto', $dadoBaja)->groupStart()->like('Nombre_producto', $nombre)->orLike('Nombre_categoria', $nombre)->groupEnd()->orderBy('Id_producto', "ASC")->paginate(10);
            $data['categorias'] = $this->categoria->findAll();
            $data['pager'] = $this->producto->pager;
        } else {
            $data['productos'] = $this->producto->where('Activo_producto', $dadoBaja)->orderBy('Id_producto', "ASC")->paginate(10);
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

        if ($this->validate($rules)) {

            $file = $this->request->getFile('userfile');
            $name = $file->getName();
            $path = 'assets/img/productos';
            if (!$file->hasMoved()) {
                $file->move($path);
            }

            $data = [
                'Nombre_producto' => trim($this->request->getVar('Nombre')),
                'Descripcion_producto' => trim($this->request->getVar('Descripcion')),
                'Precio_producto' => trim($this->request->getVar('Precio')),
                'Cantidad_producto' => trim($this->request->getVar('Cantidad')),
                'Id_categoria' => trim($this->request->getVar('Categoria')),
                'url_imagen_producto' => $name,
                'Activo_producto' => 'si',
            ];

            $session = session();
            $this->producto->insert($data);
            $session->setFlashdata('msg', 'producto correctamente añadido');
            return $this->response->redirect('/Acevedo_ignacio/productos');
        } else {
            $msg = array(
                'msg' => $this->validator->listErrors()
            );
            session()->setFlashdata($msg);
            return $this->response->redirect('/Acevedo_ignacio/productos');
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

        if (trim($this->request->getVar('Nombre')) == $producto['Nombre_producto']) {
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
                'Nombre' => 'required|min_length[2]|max_length[50]|is_unique[Producto.Nombre_producto]',
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
                'Nombre_producto' => trim($this->request->getVar('Nombre')),
                'Descripcion_producto' => trim($this->request->getVar('Descripcion')),
                'Precio_producto' => trim($this->request->getVar('Precio')),
                'Cantidad_producto' => trim($this->request->getVar('Cantidad')),
                'Id_categoria' => trim($this->request->getVar('Categoria')),
                'url_imagen_producto' => $nameimagen,
                'Activo_producto' => trim($this->request->getVar('Activo')),
            ];
            $this->producto->update($id, $data);
            session()->setFlashdata('msg', 'Producto correctamente actualizado.');
            return $this->response->redirect('/Acevedo_ignacio/productos');
        } else {
            $data['validation'] = $this->validator;
            $data['producto'] = $this->producto->where('Id_producto', $id)->first();
            $data['categorias'] = $this->categoria->findAll();
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
        session()->setFlashdata('msg', 'Producto correctamente dado de baja.');
        return $this->response->redirect('/Acevedo_ignacio/productos');
    }

}