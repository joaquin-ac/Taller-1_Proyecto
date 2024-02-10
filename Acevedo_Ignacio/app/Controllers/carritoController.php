<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\productosModel;
use App\Models\facturasModel;
use App\Models\detalleFacturasModel;

class carritoController extends Controller
{
    public function index()
    {
        $facturasModel = new facturasModel();
        $session = session();
        if (!$session->has('isLoggedIn')) {
            return $this->response->redirect('/Acevedo_ignacio');
        }

        if (!$session->has('productosCarrito')) {
            $session->set('productosCarrito', []);
        }

        $data['productos'] = $session->get('productosCarrito');
        $data['facturacion'] = $facturasModel->where('Id_usuario', $session->get('Id_usuario'))->orderBy('Id_usuario', 'ASC')->first();
        return view('carritoView', $data);
    }
    public function agregar($id)
    {
        $session = session();
        if (!$session->has('isLoggedIn')) {
            return $this->response->redirect('/Acevedo_ignacio');
        }
        $productosModel = new productosModel();
        $producto = $productosModel->where('Id_producto', $id)->first();
        $productosEnCarrito = $session->get('productosCarrito');
        $id_prod = $producto['Id_producto'];
        if (isset($productosEnCarrito[$id_prod]['Cantidad_carrito']) && $productosEnCarrito[$id_prod]['Cantidad_carrito'] >= $producto['Cantidad_producto']) {
            session()->setFlashdata('msg', 'no hay stock suficiente de ese producto');
            return $this->response->redirect('/Acevedo_ignacio/catalogo');
        }

        if( isset($productosEnCarrito[$id_prod]['Cantidad_carrito']))
        {
            $productosEnCarrito[$id_prod]['Cantidad_carrito'] = ++$productosEnCarrito[$id_prod]['Cantidad_carrito'];
        }else{
            $productosEnCarrito[$id_prod] = $producto;
            $productosEnCarrito[$id_prod]['Cantidad_carrito'] = 1;
        }
        $session->set('productosCarrito', $productosEnCarrito);

        return $this->response->redirect('/Acevedo_ignacio/carrito');

    }

    public function eliminarUnidad($id)
    {
        $session = session();
        if (!$session->has('isLoggedIn')) {
            return $this->response->redirect('/Acevedo_ignacio');
        }
        $productosModel = new productosModel();
        $producto = $productosModel->where('Id_producto', $id)->first();
        $productosEnCarrito = $session->get('productosCarrito');
        $id_prod = $producto['Id_producto'];

        if (isset($productosEnCarrito[$id_prod])) {
            if ($productosEnCarrito[$id_prod]['Cantidad_carrito'] <= 1) {
                return $this->response->redirect('/Acevedo_ignacio/eliminarCarrito/' . $producto['Id_producto']);
            }

            $productosEnCarrito[$id_prod]['Cantidad_carrito'] = --$productosEnCarrito[$id_prod]['Cantidad_carrito'];
        } else {
            return $this->response->redirect('/Acevedo_ignacio/carrito');
        }
        $session->set('productosCarrito', $productosEnCarrito);

        return $this->response->redirect('/Acevedo_ignacio/carrito');
    }

    public function eliminar($id)
    {
        $session = session();
        if (!$session->has('isLoggedIn')) {
            return $this->response->redirect('/Acevedo_ignacio');
        }
        $productosModel = new productosModel();
        $producto = $productosModel->where('Id_producto', $id)->first();
        $productosEnCarrito = $session->get('productosCarrito');
        $id_prod = $producto['Id_producto'];

        if (isset($productosEnCarrito[$id_prod])) {
            unset($productosEnCarrito[$id_prod]);
        } else {
            return $this->response->redirect('/Acevedo_ignacio/carrito');
        }
        $session->set('productosCarrito', $productosEnCarrito);

        return $this->response->redirect('/Acevedo_ignacio/carrito');
    }
    public function vaciarCarrito()
    {
        $session = session();
        if (!$session->has('isLoggedIn')) {
            return $this->response->redirect('/Acevedo_ignacio');
        }

        $session->set('productosCarrito', array());

        return $this->response->redirect('/Acevedo_ignacio/carrito');
    }

    public function facturacion()
    {
        $facturasModel = new facturasModel();
        $detalleFactura = new detalleFacturasModel();
        $session = session()->get();

        if (!isset($session['productosCarrito'])) {
            return $this->response->redirect('/Acevedo_ignacio');
        }

        if (count($session['productosCarrito']) < 1) {
            //$data['facturacion'] = $facturasModel->where('idUsuario', session()->get('id'))->orderBy('id', 'ASC')->first();
            $data['productos'] = $session['productosCarrito'];
            $data['validation'] = "Debes tener al menos un producto para comprar.";
            return view('carritoView', $data);
        }

        helper(['form']);
        $rules = [
            'numeroTarjeta' => 'required|min_length[16]|max_length[16]',
        ];

        if ($this->validate($rules)){
            $date = date('Y-m-d H:i:s');

            $data = [
                'Id_usuario' => $session['Id_usuario'],
                'Id_domicilio' => $session['Id_domicilio'],
                'Importe_total_factura' => $this->getImporteTotal($session['productosCarrito']),
                'Forma_pago_factura' => $this->request->getVar('metodoPago'),
                'Fecha_factura' => $date
            ];

            $idFactura = $facturasModel->insert($data);
            $this->actualizarStock($session['productosCarrito'], $idFactura);

            $facturasModel->join('usuario', 'factura.Id_usuario = usuario.Id_usuario','LEFT');
            $facturasModel->join('domicilio','factura.Id_domicilio = domicilio.Id_domicilio', 'LEFT');
            $detalleFactura->join('producto','detallefactura.Id_producto = producto.Id_producto', 'LEFT');

            $data['facturacion'] = [
                'Cabecera_Factura' => $facturasModel->where('Id_factura', $idFactura)->first(),
                'Detalle_Factura' => $detalleFactura->where('Id_factura', $idFactura)->findAll(),
            ];

            session()->set('productosCarrito', array());
            return view('facturacion', $data);
        } else {
            //$data['facturacion'] = $facturasModel->where('idUsuario', session()->get('id'))->orderBy('id', 'ASC')->first();
            $data['productos'] = $session['productosCarrito'];
            $data['validation'] = $this->validator;
            echo view('carritoView', $data);
        }
    }

    private function actualizarStock($productosCarrito, $idFactura)
    {
        $detalleFacturaModel = new detalleFacturasModel();
        $productosModel = new productosModel();
        foreach ($productosCarrito as $producto) {
            $dataProducto = $productosModel->where('Id_producto', $producto['Id_producto'])->first();
            $dataProducto['Cantidad_producto'] -= $producto['Cantidad_carrito'];
            $productosModel->save($dataProducto);

            $dataDetalle=[
                'Cantidad_detalle' => $producto['Cantidad_carrito'],
                'Subtotal_detalle' => $producto['Cantidad_carrito'] * $producto['Precio_producto'],
                'Id_factura' => $idFactura,
                'Id_producto' => $producto['Id_producto']
            ];
            $detalleFacturaModel->insert($dataDetalle);
        }
    }

    private function getImporteTotal($productosCarrito){
        $total = 0;
        foreach ($productosCarrito as $producto) {
            $total += $producto['Cantidad_carrito'] * $producto['Precio_producto'];
        }
        return $total;
    }
}
