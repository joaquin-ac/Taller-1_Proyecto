<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\usuariosModel;
use App\Models\domicilioModel;

class registroController extends Controller
{    
    public function index()
    {
        helper(['form']);
        return view('registroView');
    }
    public function store()
    {
        helper(['form']);
        $rules = [
            'Nombre'          => 'required|min_length[2]|max_length[50]',
            'Apellido'          => 'required|min_length[2]|max_length[50]',
            'Telefono'          => 'required|min_length[6]|max_length[12]|numeric|is_unique[usuario.Telefono_usuario]',
            'Correo'         => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuario.Correo_usuario]',
            'Password'      => 'required|min_length[4]|max_length[50]',
            'DNI'          => 'required|min_length[6]|max_length[10]|numeric|is_unique[usuario.Dni_usuario]',
            'Confirmpassword'  => 'matches[Password]',
            'Calle'          => 'required|min_length[2]|max_length[50]',
            'Numero'          => 'required|min_length[1]|max_length[10]|numeric',
            'Codigo_postal'          => 'required|min_length[2]|max_length[10]',
            'Localidad'          => 'required|min_length[2]|max_length[50]',
            'Provincia'          => 'required|min_length[2]|max_length[50]',
            'Pais'          => 'required|min_length[2]|max_length[50]'
        ];
          
        if($this->validate($rules)){

            //crear domicilio del usuario
            $domicilioModel = new domicilioModel();
            $dataDomicilio = [
                'Calle_domicilio'     => $this->request->getVar('Calle'),
                'Numero_domicilio'     => $this->request->getVar('Numero'),
                'Codigo_postal_domicilio'     => $this->request->getVar('Codigo_postal'),
                'Localidad_domicilio'     => $this->request->getVar('Localidad'),
                'Provincia_domicilio'     => $this->request->getVar('Provincia'),
                'Pais_domicilio'     => $this->request->getVar('Pais'),
            ];
            $id_Domicilio = $domicilioModel->insert($dataDomicilio);

            //crear usuario
            $userModel = new UsuariosModel();
            $password = password_hash($this->request->getVar('Password'), PASSWORD_BCRYPT);

            $dataUser = [
                'Nombre_usuario'     => $this->request->getVar('Nombre'),
                'Apellido_usuario'    => $this->request->getVar('Apellido'),
                'Telefono_usuario'    => $this->request->getVar('Telefono'),
                'Correo_usuario'    => $this->request->getVar('Correo'),
                'Password_usuario' => $password,
                'Dni_usuario'    => $this->request->getVar('DNI'),
                'Activo_usuario' => 'si',
                'Id_rol' => '1',
                'Id_domicilio' => $id_Domicilio
            ];
            $userModel->save($dataUser);
            return $this->response->redirect('/Acevedo_ignacio/login');
        }else{
            $data['validation'] = $this->validator;
            return view('registroView',$data);
        }
    }
    
}