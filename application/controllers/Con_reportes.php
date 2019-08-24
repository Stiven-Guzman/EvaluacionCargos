<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Con_reportes extends CI_Controller {

  public function __construct()
  { 
    parent::__construct();
		$this->load->model('mod_select');
		$this->load->model('mod_reportes');
  }	

	public function ReporteGeneral()
	{
		$data['IdEstado'] = $this->mod_select->ValidarEstado();
		$data['idcargo'] = $this->mod_select->ValidarCargo();
		$data['idciudades'] = $this->mod_select->ValidarCiudades();
		$data['iddependencias'] = $this->mod_select->ValidarDependencias();
		$data['idempresas'] = $this->mod_select->ValidarEmpresas();
		$data['idniveles'] = $this->mod_select->ValidarNiveles();
		$data['idusu'] = $this->mod_select->ValidarUsuarios();

		$this->load->view('Header/header');
		$this->load->view('Reportes/ReporteGeneral', $data);
		$this->load->view('Footer/footer');
	}
	
	public function ReporteBusqueda()
	{
    $idjefe = $this->input->post('idjefe'); 
    $idcargo	 = $this->input->post('idcargo');
    $iddependencia = $this->input->post('iddependencia'); 
    $idciudad = $this->input->post('idciudad');	
    $idempresa	 = $this->input->post('idempresa');
    $anoencuesta = $this->input->post('anoencuesta');	

		$session_data = $this->session->userdata('nueva_session');
		$usuario=$session_data['idusuario'];

		$data['ConsulReporte'] = $this->mod_reportes->ReporteBusqueda($idjefe, $idcargo, $iddependencia, $idciudad, $idempresa, $anoencuesta, $usuario);    

		$cargar_vista_crud = $this->load->view('Reportes/CrudReporte',$data, true);
		echo $cargar_vista_crud;
	}

	public function ReporteExcelEvaluacion()
	{
    $idjefe = $this->input->post('idjefe'); 
    $idcargo	 = $this->input->post('idcargo');
    $iddependencia = $this->input->post('iddependencia'); 
    $idciudad = $this->input->post('idciudad');	
    $idempresa	 = $this->input->post('idempresa');
    $anoencuesta = $this->input->post('anoencuesta');	

		$session_data = $this->session->userdata('nueva_session');
		$usuario=$session_data['idusuario'];		

		$ConsulReporte = $this->mod_reportes->ReporteExcelEvaluacion($idjefe, $idcargo, $iddependencia, $idciudad, $idempresa, $anoencuesta, $usuario);    

    if(!$ConsulReporte)
      return false;

    //$llamadas = $this->llamada_model->listarPorCliente($id_cliente);
    if(count($ConsulReporte) > 0){
        //Cargamos la librería de excel.
        $this->load->library('excel'); $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle('Evaluacion_Cargos');
        //Contador de filas
        $contador = 1;
        //Le aplicamos ancho las columnas.
        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(25);
        $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(60);
        $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(60);
        $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(100);
        $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(100);
        $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(100);
        //Le aplicamos negrita a los títulos de la cabecera.
        $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("G{$contador}")->getFont()->setBold(true);
        //Definimos los títulos de la cabecera.
        $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'EMPRESA');
        $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'CIUDAD');
        $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'USUARIO');
        $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'CARGO');
        $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'FORTALEZA');
        $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'A MEJORAR');
        $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'ACCIONES');

        //Definimos la data del cuerpo.        
        foreach($ConsulReporte as $row){
           //Incrementamos una fila más, para ir a la siguiente.
           $contador++;
           //Informacion de las filas de la consulta.
           $this->excel->getActiveSheet()->setCellValue("A{$contador}", $row->NOMBREEMPRESA);
           $this->excel->getActiveSheet()->setCellValue("B{$contador}", $row->DESCRIPCIONCIUDAD);
           $this->excel->getActiveSheet()->setCellValue("C{$contador}", $row->USUARIO);
           $this->excel->getActiveSheet()->setCellValue("D{$contador}", $row->DESCRIPCIONCARGO);
           $this->excel->getActiveSheet()->setCellValue("E{$contador}", $row->FORTALEZASBITACORA);
           $this->excel->getActiveSheet()->setCellValue("F{$contador}", $row->AMEJORARBITACORA);
           $this->excel->getActiveSheet()->setCellValue("G{$contador}", $row->ACCIONESBITACORA);
        }
        //Le ponemos un nombre al archivo que se va a generar.
        $archivo = "Archivo_Evaluacion_Cargos.xls";
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$archivo.'"');
        header('Cache-Control: max-age=0');

				$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        //Hacemos una salida al navegador con el archivo Excel.
        $objWriter->save('php://output');
     }else{
        echo 'No se han encontrado llamadas';
        exit;        
     }
  }

}
