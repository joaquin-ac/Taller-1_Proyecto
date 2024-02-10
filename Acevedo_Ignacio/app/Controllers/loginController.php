<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\usuariosModel;
  
class loginController extends Controller
{
    public function index()
    {
        helper(['form']);
        return view('loginView');
    } 
  
    public function loginAuth()
    {
        $session = session();
        $userModel = new usuariosModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('pass');
        helper(['form']);
        $data = $userModel->where('Correo_usuario', $email)->first();
        
        if($data){
            $pass = $data['Password_usuario'];
            $authenticatePassword = password_verify($password, $pass);
            //$authenticatePassword =  $password == $pass;
            //password_hash();
            if($authenticatePassword){

                if($data['Activo_usuario'] == 'no'){
                    $session->setFlashdata('login', 'Este usuario se encuentra dado de baja.');
                    return view('loginView');
                }

                $admin = false;
                if ($data['Id_rol'] == 2){
                    $admin = true;
                }
                
                $ses_data = [
                    'Id_usuario' => $data['Id_usuario'],
                    'Dni_usuario' => $data['Dni_usuario'],
                    'Nombre_usuario' => $data['Nombre_usuario'],
                    'Apellido_usuario' => $data['Apellido_usuario'],
                    'Telefono_usuario' => $data['Telefono_usuario'],
                    'Id_domicilio' => $data['Id_domicilio'],
                    'Correo_usuario' => $data['Correo_usuario'],
                    'isLoggedIn' => TRUE,
                    'isAdmin' => $admin,
                    'productosCarrito' => [],
                ];
                $session->set($ses_data);
                return $this->response->redirect('/Acevedo_ignacio');

            }else{
                $session->setFlashdata('login', 'La contraseña es incorrecta.');
                return view('loginView');
            }
        }else{
            $session->setFlashdata('login', 'El email no esta registrado.');
            return view('loginView');
        }
    }
}