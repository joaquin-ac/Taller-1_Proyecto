<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\usuariosModel;
use App\Models\facturasModel;
use App\Models\DomicilioModel;

class editarUserController extends Controller
{
    public function index()
    {
        $domicilioModel = new domicilioModel();
        if (session()->get('isLoggedIn')) {
            helper(['form']);
            $data['usuario'] = session()->get();
            $data['domicilio'] = $domicilioModel->find(session()->get('Id_domicilio'));
            return view('editarUsuarioView', $data);
        }
        return $this->response->redirect('/Acevedo_ignacio');
    }
    public function store()
    {
        helper(['form']);

        $rules = [
            'Nombre'          => 'required|min_length[2]|max_length[50]',
            'Apellido'          => 'required|min_length[2]|max_length[50]',
            'Calle'          => 'required|min_length[2]|max_length[50]',
            'Numero'          => 'required|min_length[1]|max_length[10]|numeric',
            'Codigo_postal'          => 'required|min_length[2]|max_length[10]',
            'Localidad'          => 'required|min_length[2]|max_length[50]',
            'Provincia'          => 'required|min_length[2]|max_length[50]',
            'Pais'          => 'required|min_length[2]|max_length[50]'
        ];

        if ($this->request->getVar('Telefono') != session()->get('Telefono_usuario')) {
            $rules['Telefono'] = 'required|min_length[6]|max_length[12]|numeric|is_unique[usuario.Telefono_usuario]';
        }
        if ($this->request->getVar('Correo') != session()->get('Correo_usuario')) {
            $rules['Correo'] = 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuario.Correo_usuario]';
        }
        if ($this->request->getVar('DNI') != session()->get('Dni_usuario')) {
            $rules['DNI'] = 'required|min_length[6]|max_length[10]|numeric|is_unique[usuario.Dni_usuario]';
        }
        
        $domicilioModel = new domicilioModel();
        $domicilio = $domicilioModel->find(session()->get('Id_domicilio'));
        $id_Domicilio_Actualizado = $domicilio['Id_domicilio'];

        if ($this->validate($rules)) {

            if  ($domicilio['Calle_domicilio'] != $this->request->getVar('Calle') || $domicilio['Numero_domicilio'] != $this->request->getVar('Numero')){

                $dataDomicilio = [
                    'Calle_domicilio'     => $this->request->getVar('Calle'),
                    'Numero_domicilio'     => $this->request->getVar('Numero'),
                    'Codigo_postal_domicilio'     => $this->request->getVar('Codigo_postal'),
                    'Localidad_domicilio'     => $this->request->getVar('Localidad'),
                    'Provincia_domicilio'     => $this->request->getVar('Provincia'),
                    'Pais_domicilio'     => $this->request->getVar('Pais'),
                ];

                $id_Domicilio_Actualizado = $domicilioModel->insert($dataDomicilio);
            }

            $userModel = new usuariosModel();
            $usuario = $userModel->find(session()->get('Id_usuario'));
            $dataUser = [
                'Nombre_usuario'     => $this->request->getVar('Nombre'),
                'Apellido_usuario'    => $this->request->getVar('Apellido'),
                'Telefono_usuario'    => $this->request->getVar('Telefono'),
                'Correo_usuario'    => $this->request->getVar('Correo'),
                'Dni_usuario'    => $this->request->getVar('DNI'),
                'Activo_usuario' => 'si',
                'Id_rol' => '1',
                'Password_usuario' => $usuario['Password_usuario'],
                'Id_domicilio' => $id_Domicilio_Actualizado
            ];
            
            $userModel->update(session()->get('Id_usuario'), $dataUser);


            $ses_data = [
                'Id_usuario' => $usuario['Id_usuario'],
                'Nombre_usuario' => $dataUser['Nombre_usuario'],
                'Apellido_usuario' => $dataUser['Apellido_usuario'],
                'Telefono_usuario' => $dataUser['Telefono_usuario'],
                'Correo_usuario' => $dataUser['Correo_usuario'],
                'Dni_usuario' => $dataUser['Dni_usuario'],
                'Id_domicilio' => $dataUser['Id_domicilio'],
                'isLoggedIn' => TRUE,
                'isAdmin' => session()->get('isAdmin')
                //'productosCarrito' => unserialize($data['productosCarrito']),
            ];
            session()->set($ses_data);
            session()->setFlashdata('msg', 'Usuario actualizado con exito');
            return $this->response->redirect('/Acevedo_ignacio');
        } else {
            $data['usuario'] = session()->get();
            $data['domicilio'] = $domicilioModel->find($id_Domicilio_Actualizado);
            $data['validation'] = $this->validator;
            echo view('editarUsuarioView', $data);
        }
    }


    public function pass()
    {
        $session = session()->get();
        if (!isset($session)) {
            return $this->response->redirect('/Acevedo_ignacio');
        }
        return view('editarContraseña');
    }

    public function changePass()
    {
        $session = session()->get();
        if (!isset($session)) {
            return $this->response->redirect('/Acevedo_ignacio');
        }
        

        $userModel = new usuariosModel();
        $usuario = $userModel->find($session['Id_usuario']);

        helper(['form']);
        $rules = [
            'newPass' => 'required|min_length[4]|max_length[50]',
            'confirmPassword' => 'matches[newPass]'
        ];

        $password = $this->request->getVar('oldPass');
        $pass = $usuario['Password_usuario'];
        $authenticatePassword = password_verify($password, $pass);

        if ($authenticatePassword) {
            if ($this->validate($rules)) {

                $newPassword = password_hash($this->request->getVar('newPass'), PASSWORD_BCRYPT);
                $usuario['Password_usuario'] = $newPassword;
                //$session['isAdmin'] = $session['isAdmin'] ? 'si' : 'no';
                $userModel->save($usuario);

                session()->setFlashdata('msg', 'Contraseña actualizada con exito.');
                return $this->response->redirect('/Acevedo_ignacio');

            } else {
                $data['validation'] = $this->validator;
                echo view('editarContraseña', $data);
            }
        } else {
            session()->setFlashdata('msg', 'La contraseña antigua es incorrecta.');
            return $this->response->redirect('/Acevedo_ignacio/edit_pass');
        }
    }

    public function historial()
    {
        $session = session()->get();
        if (!isset($session)) {
            return $this->response->redirect('/Acevedo_ignacio');
        }

        $desde = $this->request->getGet('Desde')? : '2000-01-01';
        $hasta = $this->request->getGet('Hasta')? : date('Y-m-d');
        $facturasModel = new facturasModel();

        $id = $session['Id_usuario'];
        $data['facturas'] = $facturasModel->where("Fecha_factura <= DATE_ADD('{$hasta}', INTERVAL 23 HOUR) AND Fecha_factura >='{$desde}' AND Id_usuario = '{$id}'")->orderBy('Fecha_factura', "DESC")->paginate(10);
        $data['pager'] = $facturasModel->pager;

        return view('facturas', $data);
    }
}