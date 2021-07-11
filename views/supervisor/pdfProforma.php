<?php ob_start();?>


<html>
    <title>Proforma</title>
    <body>
        <div style="display:flex">
            <div>
                 <h1>Proforma</h1>
                 <b> <?php echo $this->proforma->fecha;?></b>
            </div>
            <div>
                <div style="text-align:right;"><img src="http://localhost/tpFinal/views/img/unlam.png" alt="" width="50px"></div>
            </div>
        </div>
       
        
        <br><br>
        <table width="100%" cellspacing="5px" cellpadding="5px" border="1">
            <caption><b>VIAJE</b></caption>
            <tr bgcolor="#ffeb3b">
                <td>Origen</td>
                <td>Destino</td>
                <td>Fecha de Carga</td>
                <td>ETA</td>
            </tr>
            <tr>
                <td><?php echo $this->proforma->origen;?></td>
                <td><?php echo $this->proforma->destino;?></td>
                <td><?php echo $this->proforma->fecha_carga;?></td>
                <td><?php echo $this->proforma->ETA;?></td>
            </tr>
        </table>
       <br><br>
        <table width="100%" cellspacing="5px" cellpadding="5px" border="1">
             <caption><b>CARGA</b></caption>
            <tr bgcolor="#ffeb3b">
                <td>Peso Neto</td>
                <td>Tipo</td>
                <td>Reefer</td>
                <td>Hazard</td>
            </tr>
            <tr>
                <td><?php echo $this->proforma->peso_neto;?></td>
                <td><?php echo $this->proforma->tipo;?></td>
                <td><?php echo $this->proforma->reefer;?></td>
                <td><?php echo $this->proforma->hazard;?></td>
            </tr>
        </table>
        <br><br>
        <table width="100%" cellspacing="5px" cellpadding="5px" border="1">
             <caption><b>CHOFER</b></caption>
            <tr bgcolor="#ffeb3b">
                <td>dni</td>
                <td>nombre</td>
                <td>apellido</td>
                <td>fecha_nac</td>
                <td>usuario</td>
                <td>password</td>
                <td>email</td>
                <td>rol</td>              
            </tr>
            <tr>
                <td><?php echo $this->proforma->dni;?></td>
                <td><?php echo $this->proforma->nombre;?></td>
                <td><?php echo $this->proforma->apellido;?></td>
                <td><?php echo $this->proforma->fecha_nac;?></td>
                <td><?php echo $this->proforma->usuario;?></td>
                <td><?php echo $this->proforma->password;?></td>
                <td><?php echo $this->proforma->email;?></td>
                <td><?php echo $this->proforma->rol;?></td>
            </tr>
        </table>        
         <br><br>
        <table width="100%" cellspacing="5px" cellpadding="5px" border="1">
             <caption><b>VEHICULO</b></caption>
            <tr bgcolor="#ffeb3b">
                <td>marca</td>
                <td>modelo</td>
                <td>patente</td>
                <td>nro_chasis</td>
                <td>nro_motor</td>
                <td>anio_fabricacion</td>
                <td>service</td>
                <td>kilometraje</td>              
            </tr>
            <tr>
                <td><?php echo $this->proforma->marca;?></td>
                <td><?php echo $this->proforma->modelo;?></td>
                <td><?php echo $this->proforma->patente;?></td>
                <td><?php echo $this->proforma->nro_chasis;?></td>
                <td><?php echo $this->proforma->nro_motor;?></td>
                <td><?php echo $this->proforma->anio_fabricacion;?></td>
                <td><?php echo $this->proforma->service;?></td>
                <td><?php echo $this->proforma->kilometraje;?></td>
            </tr>
        </table>    
        <div style="page-break-after:always;"></div>
        <table width="100%" cellspacing="5px" cellpadding="5px" border="1">
             <caption><b>COSTEO ESTIMADO</b></caption>
            <tr bgcolor="#ffeb3b">
                <td>Kilemotros</td>
                <td>combustible</td>
                <td>ETD</td>
                <td>ETA</td>
                <td>Viaticos</td>
                <td>Peajes Pasajes</td>
                <td>Extras</td>
                <td>Hazard</td>
                <td>Reefer</td>
                <td>Fee</td>    
                <td bgcolor="#ff9800">Total</td>             
            </tr>
            <tr>
                <td><?php echo $this->proforma->kilometros_e;?></td>
                <td><?php echo $this->proforma->combustible_e;?></td>
                <td><?php echo $this->proforma->ETD_e;?></td>
                <td><?php echo $this->proforma->ETA_e;?></td>
                <td><?php echo $this->proforma->viaticos_e;?></td>
                <td><?php echo $this->proforma->peajes_pesajes_e;?></td>
                <td><?php echo $this->proforma->extras_e;?></td>
                <td><?php echo $this->proforma->hazard_e;?></td>
                <td><?php echo $this->proforma->reefer_e;?></td>
                <td><?php echo $this->proforma->fee_e;?></td>
                <td><?php echo $this->proforma->total_e;?> $</td>
            </tr>
        </table>
            <br><br><br><br>
            <caption><b>COSTEO REAL</b></caption>
        <table width="100%" cellspacing="5px" cellpadding="5px" border="1">
             
            <tr bgcolor="#ffeb3b">
                <td>Kilemotros</td>
                <td>combustible</td>
                <td>ETD</td>
                <td>ETA</td>
                <td>Viaticos</td>
                <td>Peajes Pasajes</td>
                <td>Extras</td>
                <td>Hazard</td>
                <td>Reefer</td>
                <td>Fee</td>  
                <td bgcolor="#ff9800">Total</td>             
            </tr>
            <tr>
                <td><?php echo $this->proforma->kilometros_r;?></td>
                <td><?php echo $this->proforma->combustible_r;?></td>
                <td><?php echo $this->proforma->ETD_r;?></td>
                <td><?php echo $this->proforma->ETA_r;?></td>
                <td><?php echo $this->proforma->viaticos_r;?></td>
                <td><?php echo $this->proforma->peajes_pesajes_r;?></td>
                <td><?php echo $this->proforma->extras_r;?></td>
                <td><?php echo $this->proforma->hazard_r;?></td>
                <td><?php echo $this->proforma->reefer_r;?></td>
                <td><?php echo $this->proforma->fee_r;?></td>
                <td><?php echo $this->proforma->total_r;?> $</td>
            </tr>
        </table>
    </body>
</html>

<?php
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set('isRemoteEnabled', true);
$dompdf = new Dompdf($options);

$dompdf->loadHtml(ob_get_clean());



$dompdf->setPaper('A4','landscape');

$dompdf->render();

$dompdf->stream("documento.pdf",['Attachment'=>0]);

?>