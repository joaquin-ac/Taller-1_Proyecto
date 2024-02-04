<?php

namespace App\Controllers;

use App\Models\usuariosModel;
use App\Models\rolModel;
use CodeIgniter\Controller;

class usuariosController extends Controller
{
    private $usuario = "";
    private $rol = "";
    public function __construct()
    {

        $this->usuario = new usuariosModel();
        $this->rol = new rolModel();
    }

    public function index($activo = 'si')
    {
        $this->usuario->join('Rol', 'usuario.Id_rol = rol.Id_rol', 'LEFT');
        $session = session();
        if (empty($session->get('isAdmin'))) {
            return $this->response->redirect('/Acevedo_ignacio');
        }

        $nombre = $this->request->getGet('nombre');
        if (isset($nombre)) {
            $data['usuarios'] = $this->usuario->where('Activo_usuario', $activo)->groupStart()->like('Apellido_usuario', $nombre)->orLike('Nombre_usuario', $nombre)->orLike('Correo_usuario', $nombre)->groupEnd()->orderBy('Id_usuario', "ASC")->paginate(10);
            $data['pager'] = $this->usuario->pager;
        } else {
            $data['usuarios'] = $this->usuario->where('Activo_usuario', $activo)->orderBy('Id_usuario', "ASC")->paginate(10);
            $data['pager'] = $this->usuario->pager;
        }
        return view('usuarios', $data);
    }

    public function insertar()
    {
        $session = session();
        if (empty($session->get('isAdmin'))) {
            return $this->response->redirect('/Acevedo_ignacio');
        }

        helper(['form']);
        $rules = [
            'nombre' => 'required|min_length[2]|max_length[50]',
            'apellido' => 'required|min_length[2]|max_length[50]',
            'email' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
            'usuario' => 'required|min_length[2]|max_length[50]',
            'pass' => 'required|min_length[4]|max_length[50]',
            'isAdmin' => 'required|min_length[2]|max_length[2]'
        ];
        $password = password_hash($this->request->getVar('pass'), PASSWORD_BCRYPT);

        if ($this->validate($rules)) {
            $data = [
                'apellido' => $this->request->getVar('apellido'),
                'nombre' => $this->request->getVar('nombre'),
                'email' => $this->request->getVar('email'),
                'usuario' => $this->request->getVar('usuario'),
                'pass' => $password,
                'baja' => 'no',
                'isAdmin' => $this->request->getVar('isAdmin')
            ];
            $this->usuario->insert($data);
            return $this->response->redirect('/Acevedo_ignacio/usuarios');

        } else {
            $data['usuarios'] = $this->usuario->where('Activo_usuario', 'si')->orderBy('Id_usuario', "ASC")->paginate(10);
            $data['pager'] = $this->usuario->pager;
            $data['validation'] = $this->validator;
            return view('usuarios', $data);
        }

    }

    public function editar($id)
    {
        $session = session();
        if (empty($session->get('isAdmin'))) {
            return $this->response->redirect('/Acevedo_ignacio');
        }
        $this->usuario->join('rol', 'usuario.Id_rol = rol.Id_rol', 'LEFT');
        $data['usuario'] = $this->usuario->where('Id_usuario', $id)->first();
        $data['roles'] = $this->rol->findall();
        return view('actualizarUsuario', $data);
    }

    public function actualizar($id)
    {
        $session = session();
        if (empty($session->get('isAdmin'))) {
            return $this->response->redirect('/Acevedo_ignacio');
        }
        $activo = $this->request->getVar('Activo');
        $rol = $this->request->getVar('Rol');
        $this->usuario->where('Id_usuario', $id)->set('Activo_usuario', $activo)->update();
        $this->usuario->where('Id_usuario', $id)->set('Id_rol', $rol)->update();

        return $this->response->redirect('/Acevedo_ignacio/usuarios');
    }

    public function borrar($id)
    {
        $session = session();
        if (empty($session->get('isAdmin'))) {
            return $this->response->redirect('/Acevedo_ignacio');
        }

        $data['usuario'] = $this->usuario->where('Id_usuario', $id)->set('Activo_usuario', 'no')->update();
        return $this->response->redirect('/Acevedo_ignacio/usuarios');
    }

    public function editarUsuario()
    {
        $session = session();
        if (empty($session->get('isAdmin'))) {
            return $this->response->redirect('/Acevedo_ignacio');
        }

        $data['usuario'] = session()->get();
        return view('actualizarUsuario', $data);
    }
}