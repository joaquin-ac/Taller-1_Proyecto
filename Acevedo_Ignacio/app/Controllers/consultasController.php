<?php 
namespace App\Controllers;  
use CodeIgniter\Controller;
use App\Models\consultasModel;

class consultasController extends Controller
{    
    public function index()
    {
        return view('contactos');
    }

    public function store()
    {
        helper(['form']);
        $rules = [
            'nombre'          => 'required|min_length[2]|max_length[50]',
            'apellido'          => 'required|min_length[2]|max_length[50]',
            'email'         => 'required|min_length[4]|max_length[100]|valid_email',
            'asunto'          => 'required|min_length[2]|max_length[50]',
            'mensaje'      => 'required|min_length[4]|max_length[250]',
        ];
          
        if($this->validate($rules)){
            $consultasModel = new consultasModel();
            
            $data = [
                'Nombre_consulta'     => trim($this->request->getVar('nombre')),
                'Apellido_consulta'    => trim($this->request->getVar('apellido')),
                'Correo_consulta'    => trim($this->request->getVar('email')),
                'Asunto_consulta'    => trim($this->request->getVar('asunto')),
                'Mensaje_consulta' => trim($this->request->getVar('mensaje')),
                'Visto_consulta' => 'no',
                'Id_usuario' => null
            ];
            if (session()->get('isLoggedIn')){
              $data['Id_usuario'] = session()->get('Id_usuario');
            }
            $consultasModel->save($data);
            $data['correcto'] = 'Mensaje enviado Exitosamente';
            echo view('contactos', $data);
        }else{
            $data['validation'] = $this->validator;
            echo view('contactos',$data);
        }
    }

    public function ver($vistos = 'no')
    {
        $session = session();
        if( empty($session->get('isAdmin')) ){
            return $this->response->redirect('/Acevedo_ignacio');
        }
        $consultasModel = new consultasModel();

        $nombre =  trim($this->request->getGet('nombre'));
        if (isset($nombre)) {
            $data['consultas'] = $consultasModel->where('visto_consulta', $vistos)->groupStart()->like('Asunto_consulta', $nombre)->orLike('Nombre_consulta', $nombre)->orLike('Apellido_consulta', $nombre)->groupEnd()->orderBy('Id_consulta', "ASC")->paginate(10);
            $data["pager"] = $consultasModel->pager;
        } else {
            $data['consultas'] = $consultasModel->where('visto_consulta', $vistos)->orderBy('Id_consulta', "ASC")->paginate(10);
            $data["pager"] = $consultasModel->pager;
        }
        return view('consultas', $data);
    }

    public function borrarConsulta($id){
        $consultasModel = new consultasModel();

        $consulta = $consultasModel->where('Id_consulta', $id)->first();
        $consulta['Visto_consulta'] = 'si';

        $consultasModel->save($consulta);
        return $this->response->redirect('/Acevedo_ignacio/consultas');
    }

    public function visualizarConsulta($id){
        $consultasModel = new consultasModel();
        $consultas['consulta'] = $consultasModel->where('Id_consulta', $id)->first();
        echo view('visualizarConsulta', $consultas);
    }
}