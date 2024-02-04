<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\productosModel;
use App\Models\facturasModel;
use App\Models\detalleFacturasModel;

class facturasController extends Controller
{
    public function index()
    {
        $facturasModel = new facturasModel();
        $session = session();
        if (empty($session->get('isAdmin'))) {
            return $this->response->redirect('/Acevedo_ignacio');
        }

        $desde = $this->request->getGet('Desde')? : '2000-01-01';
        $hasta = $this->request->getGet('Hasta')? : date('Y-m-d');

        $id = $this->request->getGet('id');
        if (isset($id)) {
            $data['facturas'] = $facturasModel->where('Id_factura', $id)->orGroupStart()->where('Id_usuario', $id)->groupEnd()->orderBy('Fecha_factura', "DESC")->paginate(10);
            $data["pager"] = $facturasModel->pager;

        } else if($desde != '' || $hasta != '') {
            
            //$desde = date('Y-m-d', strtotime($desde));
            //$hasta = date('Y-m-d', strtotime($hasta));

            $data['facturas'] = $facturasModel->where("Fecha_factura <= DATE_ADD('{$hasta}', INTERVAL 23 HOUR) AND Fecha_factura >='{$desde}'")->orderBy('Fecha_factura', "DESC")->paginate(10);
            $data["pager"] = $facturasModel->pager;
        } else{

            $data['facturas'] = $facturasModel->orderBy('Fecha_factura', "DESC")->paginate(10);
            $data["pager"] = $facturasModel->pager;
        }

       
        return view('facturas', $data);
    }
    public function ver($id)
    {
        $session = session();
        if (!$session->has('isLoggedIn')) {
            return $this->response->redirect('/Acevedo_ignacio');
        }

        $facturasModel = new facturasModel();
        $detalleFactura = new detalleFacturasModel();

        $facturasModel->join('usuario', 'factura.Id_usuario = usuario.Id_usuario', 'LEFT');
        $facturasModel->join('domicilio', 'factura.Id_domicilio = usuario.Id_domicilio', 'LEFT');
        $detalleFactura->join('producto', 'detallefactura.Id_producto = producto.Id_producto', 'LEFT');

        $data['facturacion'] = [
            'Cabecera_Factura' => $facturasModel->where('Id_factura', $id)->first(),
            'Detalle_Factura' => $detalleFactura->where('Id_factura', $id)->findAll(),
        ];

        return view('facturacion', $data);

    }
}