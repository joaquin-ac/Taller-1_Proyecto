<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\usuariosModel;

class logoutController extends Controller
{
    public function index()
    {
        $session = session();
        /*$userModel = new usuariosModel();
        $email = session()->get('email');
        $data = $userModel->where('email', $email)->first();
        
        $data['productosCarrito'] = serialize(session()->get('productosCarrito'));
        $userModel->save($data);*/
        $session->destroy();
        return $this->response->redirect('/Acevedo_ignacio');
    }
}