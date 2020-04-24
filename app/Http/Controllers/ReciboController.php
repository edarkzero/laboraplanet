<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Codedge\Fpdf\Fpdf\Fpdf;
// use App\Plans;
// use DB;
// use App\Plan_users;
// use Auth;

class ReciboController extends Controller 
{

	public function index()
	{	
		return view('recibo');
	}

	public function index2()
	{
		return view('recibo_error');
	}

	public function index3()
	{
		return view('recibo_pago');
	}

	public function index4()
	{
		return view('recibo_pago_error');
	}
	
		public function index5()
	{
		return view('recibo_pago_error_planes');
	}

	public function index6()
	{
		return view('recibo_pago_planes');
	}


	public function imprimir_recibo(Request $request)
	{
			$numpedido = $request->numpedido;
			$numautori = $request->numautori;
			$comprador = $request->comprador;
			$numtarje = $request->numtarje;
			$fechayhoralleva = $request->fechayhoralleva;
			$importe = $request->importe;
			$moneda = $request->moneda;
			$comentarios = $request->comentarios;
			$idtransac = $request->idtransac;

			$partir = explode(" ", $fechayhoralleva);

			$pdf = new Fpdf();
            $pdf->SetTitle('RECIBO DE COBRO',true);
			$pdf->AddPage();
			$pdf->SetFont('Arial','',12);
			$pdf->SetFillColor(185,185, 185);
			$pdf->Ln(8);
			$pdf->Cell(190,27,'',1,0,'L',true);
			$pdf->Image('img/LogoVertical.png', 15,10,50);
			$pdf->Ln(6);
			$pdf->Cell(129,10,'',0);
			$pdf->Cell(61,10,$idtransac,0,'L');
			$pdf->Ln(10);
			$pdf->Cell(129,10,'',0);
			$pdf->Cell(61,10,$partir[0],0);
			//CUERPO DEL RECIBO
			$pdf->Ln(10);
			$pdf->Cell(95,15,utf8_decode('N° de Pedido #:'),'L',0,'R');
			$pdf->Cell(95,15,$numpedido,'R',0,'L');
			$pdf->Ln(10);
			$pdf->Cell(95,15,utf8_decode('N° de Autorizacion:'),'L',0,'R');
			$pdf->Cell(95,15,$numautori,'R',0,'L');
			$pdf->Ln(10);
			$pdf->Cell(95,15,utf8_decode('Nombre del Comprador:'),'L',0,'R');
			$pdf->Cell(95,15,$comprador,'R',0,'L');
			$pdf->Ln(10);
			$pdf->Cell(95,15,utf8_decode('N° de Tarjeta:'),'L',0,'R');
			$pdf->Cell(95,15,$numtarje,'R',0,'L');
			$pdf->Ln(10);
			$pdf->Cell(95,15,utf8_decode('Fecha y Hora del Pedido:'),'L',0,'R');
			$pdf->Cell(95,15,$fechayhoralleva,'R',0,'L');
			$pdf->Ln(10);
			$pdf->Cell(95,15,utf8_decode('Importe de la Transaccion:'),'L',0,'R');
			$pdf->Cell(95,15,$importe,'R',0,'L');
			$pdf->Ln(10);
			$pdf->Cell(95,15,utf8_decode('Moneda de la Transaccion:'),'L',0,'R');
			$pdf->Cell(95,15,$moneda,'R',0,'L');
			$pdf->Ln(10);
			$pdf->Cell(95,15,utf8_decode('Comentarios:'),'LB',0,'R');
			$pdf->Cell(95,15,$comentarios,'RB',0,'L');
			//FOOTER
			$pdf->Ln(15);
			$pdf->SetFont('Arial','',10);
			$pdf->Cell(190,15,utf8_decode('© 2019 Todos los Derechos Reservados | LaboraPlanet'),1,0,'C',true);
					




		
			$pdf->Output();

			exit();



	}

	public function imprimir_recibo_error(Request $request)
	{

			$numpedido = $request->numpedido;
			$numtarje = $request->numtarje;
			$fechayhoralleva = $request->fechayhoralleva;
			$comentarios = $request->comentarios;

			$partir = explode(" ", $fechayhoralleva);

			$pdf = new Fpdf();
            $pdf->SetTitle('RECIBO DE COBRO',true);
			$pdf->AddPage();
			$pdf->SetFont('Arial','',12);
			$pdf->SetFillColor(185,185, 185);
			$pdf->Ln(8);
			$pdf->Cell(190,27,'',1,0,'L',true);
			$pdf->Image('img/LogoVertical.png', 15,10,50);
			$pdf->Ln(6);
			$pdf->Cell(129,10,'',0);
			// $pdf->Cell(61,10,'[ID TRANSACTION]',0);
			$pdf->Ln(10);
			$pdf->Cell(129,10,'',0);
			$pdf->Cell(61,10,$partir[0],0);
			//CUERPO DEL RECIBO
			$pdf->Ln(10);
			$pdf->Cell(95,15,utf8_decode('N° de Pedido #:'),'L',0,'R');
			$pdf->Cell(95,15,$numpedido,'R',0,'L');
			$pdf->Ln(10);
			$pdf->Cell(95,15,utf8_decode('N° de Tarjeta:'),'L',0,'R');
			$pdf->Cell(95,15,$numtarje,'R',0,'L');
			$pdf->Ln(10);
			$pdf->Cell(95,15,utf8_decode('Fecha y Hora del Pedido:'),'L',0,'R');
			$pdf->Cell(95,15,$fechayhoralleva,'R',0,'L');
			$pdf->Ln(10);
			$pdf->Cell(95,15,utf8_decode('Comentarios:'),'LB',0,'R');
			$pdf->Cell(95,15,$comentarios,'RB',0,'L');
			//FOOTER
			$pdf->Ln(15);
			$pdf->SetFont('Arial','',10);
			$pdf->Cell(190,15,utf8_decode('© 2019 Todos los Derechos Reservados | LaboraPlanet'),1,0,'C',true);
					




		
			$pdf->Output();

			exit();
	}





}



?>