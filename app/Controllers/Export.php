<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LogbookModel;
use App\Models\UserModel;

class Export extends BaseController
{
    private $modellogbook;
    private $modeluser;
    public function __construct()
    {
        $this->modellogbook = new LogbookModel();
        $this->modeluser = new UserModel();
    }


    public function index()
    {
        //
    }


    public function exportLogbook($id_user = null)
    {
        if (session()->get('id_role') == 2) {
            if ($id_user != null) {
                $this->alert->set('warning', 'Warning', 'NOT VALID');
                return redirect()->to('logbook');
            }
            $id_user = session()->get('id_user');
        }

        $cekIdUser = $this->modeluser->join('tb_logbook_kategori', 'tb_logbook_kategori.id_kategori = tb_user.id_kategori', 'left')->find($id_user);

        if (!$cekIdUser) {
            $this->alert->set('warning', 'Warning', 'NOT VALID');
            return redirect()->to('logbook');
        }

        $dataLogbook = $this->modellogbook->exportLogbook($id_user);

        // $mpdf = new \Mpdf\Mpdf();
        // $mpdf->WriteHTML('<h1>Hello world!</h1>');
        // $mpdf->Output();

        // exit;

        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4', 'default_font' => 'Serif']);

        // Define the Header/Footer before writing anything so they appear on the first page



        $headeNew = '<table width="100%">
            <tr>
                <td width="10%" align="center" style="padding: auto;"><center><img width="100" style="text-align: center;margin:auto;" src="unsub.png"></center></td>
                <td width="80%" align="center"><div style="text-align: center;">

                <p style="font-size: 17px; margin: 0;text-align: center;">UNIVERSITAS SUBANG</p>
                <p style="font-size: 22px; margin: 0;text-align: center;font-weight: bold;">FAKULTAS ILMU KOMPUTER</p>
                <p style="font-size: 13px; margin: 0;text-align: center;font-weight: bold;">Akreditasi: B SK BAN PT No: 6453/SK/BAN-PT/Akred/S/X/2020</p>
                <p style="font-size: 13px; margin: 0;text-align: center;">Jalan R.A Kartini KM 3 Telp (0260) 411415 Subang</p>
                <p style="font-size: 13px; margin: 0;text-align: center;">Email : <font color="blue"><a style="color: blue;" href"mailto:fasilkom@unsub.ac.id">fasilkom@unsub.ac.id</a></font></p>
                </div></td>
                <td width="10%"></td>
                </tr>
                </table>
                <hr style="height: 2px; background-color: #000;margin: 0px;margin-bottom: 1px;color: black;">
                <hr style="height: 2px; background-color: #000;margin: 0px;color: black;">
            ';


        $mpdf->SetHTMLHeader($headeNew);
        $mpdf->SetHTMLFooter('
            <table width="100%">
                <tr>
                    <td width="33%">{DATE j-m-Y}</td>
                    <td width="33%" align="center">{PAGENO}/{nbpg}</td>
                    <td width="33%" style="text-align: right;">By PROFA</td>
                </tr>
            </table>');



        $list = '';
        // for ($i = 1; $i < 10; $i++) {
        //     $list .= '<tr>
        //         <td style="text-align: center;">' . $i . '</td>
        //         <td style="text-align: center;">13/04/2023</td>
        //         <td style="text-align: center;">08:00 </td>
        //         <td style="text-align: center;">16:00</td>
        //         <td style="text-align: center;">Yang di lakukan kang rebahan ^_^</td>
        //         <td style="text-align: center;">
        //         <img width="50" style="" src="signature.png">
        //         </td>
        //     </tr>';
        // }

        $i = 1;
        foreach ($dataLogbook as $d) {
            $list .= '<tr>
                    <td style="text-align: center;">' . $i++ . '</td>
                    <td style="text-align: center;">' . $d['tanggal'] . '</td>
                    <td style="text-align: center;">' . $d['mulai'] . '</td>
                    <td style="text-align: center;">' . $d['selesai'] . '</td>
                    <td style="text-align: center;">' . $d['penjelasan'] . '</td>
                    <td style="text-align: center;">
                    
                    </td>
                </tr>';
        }

        $tempat_mbkm = '';
        if ($cekIdUser['is_pleace'] == 1) {
            $tempat_mbkm = '<tr>
                                <td style="width: 250px">Tempat</td>
                                <td>:</td>
                                <td>' . $cekIdUser['tempat_mbkm'] . '</td>
                            </tr>';
        }


        $html = '
                <!DOCTYPE html>
                <html>
                <head>
                <title>LOGBOOK - ' . $cekIdUser['nama_lengkap'] . ' - ' . $cekIdUser['npm'] . '</title>
                <style>@page {
                    margin: 50px;
                }</style>
                </head>
                <body>
                <div style="margin-top: 30px">
                <div style="float: right;">

                <table>
                        <tr>
                            <td style="width: 550px"></td>
                            <td>
                            <table border="1" cellpadding="5" cellspacing="0">
                        <tr >
                            <td style="font-weight: bold;">FORM</td>
                            <td style="font-weight: bold;">' . $cekIdUser['kode'] . '</td>
                        </tr>   
                    </table>
                            
                            </td>
                        </tr>
                    </table>

                    
                </div>

                <div style="text-align: center; font-weight:bold;margin-top: 20px;">
                    LOGBOOK AKTIVITAS HARIAN ' . strtoupper($cekIdUser['nama_kategori']) . '
                </div>

                <div style="margin-top: 15px">
                    <table>
                        <tr>
                            <td style="width: 250px">Nama</td>
                            <td>:</td>
                            <td>' . $cekIdUser['nama_lengkap'] . '</td>
                        </tr>
                        <tr>
                            <td style="width: 250px">NPM</td>
                            <td>:</td>
                            <td>' . $cekIdUser['npm'] . '</td>
                        </tr>
                        ' . $tempat_mbkm . '
                    </table>
                </div>


                <div style="margin-top: 20px">
                <table border="1" cellpadding="5" cellspacing="0">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Mulai</th>
                    <th>Selesai</th>
                    <th>Penjelasan Kegiatan</th>
                    <th>Paraf</th>
                </tr>
                </thead>
                <tbody>

                ' . $list . '
                </tbody>
                </table>
                </div>





            </div>
            </body>
            </html>';
        // $mpdf->AddPage();
        // $mpdf->Image('unsub.png', 10, 6, 30, 30, 'png', '', true, false);


        $mpdf->AddPageByArray([
            'margin-left' => '15',
            'margin-right' => '20',
            'margin-top' => '45',
            'margin-bottom' => '15',
        ]);
        $mpdf->WriteHTML($html);



        // $mpdf->Output(date('Y-m-d-h-i-s') . '.pdf', 'F');
        $mpdf->Output('LOGBOOK-' . $cekIdUser['npm'] . '.pdf', 'D');
        // $mpdf->Output('filename.pdf', \Mpdf\Output\Destination::FILE);
        // header("Content-type:application/pdf");
        // header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        // header('Pragma: public');
        // header('Content-Transfer-Encoding: binary');
        // header('Expires: 0');
        // header('Content-Description: File Transfer');
        // header('Content-Type: application/octet-stream');
        // ob_clean();
        // $mpdf->Output();
        // flush();
    }
}
