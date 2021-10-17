<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_test extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_cetak_transaksi');
         $this->load->model('m_user');
        
    }
public function index()
    {
        if (isset($_GET['filter']) && ! empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if ($filter == '1') { // Jika filter nya 1 (per tanggal)
                // $tgl =$this->input->post('tanggal');
                $tgl = $_GET['tanggal'];
                $label = 'Data Transaksi Tanggal '.date('d-m-y', strtotime($tgl));
                $ket = 'Data Transaksi Tanggal '.date('d-m-y', strtotime($tgl));
                $url_cetak = 'laporan_test/cetak?filter=1&tanggal='.$tgl;
                $url_export = 'laporan_test/export?filter=1&tanggal='.$tgl;
                $transaksi = $this->m_cetak_transaksi->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di m_cetak_transaksi
            } elseif ($filter == '2') { // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                $label = 'Data Transaksi Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $ket = 'Data Transaksi Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $url_cetak = 'laporan_test/cetak?filter=2&bulan='.$bulan.'&tahun='.$tahun;
                $url_export = 'laporan_test/export?filter=2&bulan='.$bulan.'&tahun='.$tahun;
                $transaksi = $this->m_cetak_transaksi->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di m_cetak_transaksi
            } else { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                $label = 'Data Transaksi Tahun '.$tahun;
                $url_export = 'laporan_test/export?filter=3&tahun='.$tahun;
                $ket = 'Data Transaksi Tahun '.$tahun;
                $url_cetak = 'laporan_test/cetak?filter=3&tahun='.$tahun;
                $transaksi = $this->m_cetak_transaksi->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di m_cetak_transaksi
            }
        } else { // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Transaksi';
            $label = 'Semua Data Transaksi';
            $url_cetak = 'laporan_test/cetak';
            $url_export = 'laporan_test/export';
            $transaksi = $this->m_cetak_transaksi->view_all(); // Panggil fungsi view_all yang ada di m_cetak_transaksi
        }

        $data = array('title' => 'Laporan Penjualan',
                            'ket' => $ket,
                            'label'=>$label,
                            'url_export' => base_url('index.php/'.$url_export),
                            'url_cetak' => base_url('index.php/'.$url_cetak),
                            'transaksi' => $transaksi,
                            'option_tahun' => $this->m_cetak_transaksi->option_tahun(),
                            'isi'=>'v_laporan_view'  ,
                    );
        
        $this->load->view('layout/v_wrapper_backend', $data, false);
    }

    public function cetak()
    {
        if (isset($_GET['filter']) && ! empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if ($filter == '1') { // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];

                $ket = 'Data Transaksi Tanggal '.date('d-m-y', strtotime($tgl));
                $transaksi = $this->m_cetak_transaksi->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di m_cetak_transaksi
            } elseif ($filter == '2') { // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

                $ket = 'Data Transaksi Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $transaksi = $this->m_cetak_transaksi->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di m_cetak_transaksi
            } else { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];

                $ket = 'Data Transaksi Tahun '.$tahun;
                $transaksi = $this->m_cetak_transaksi->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di m_cetak_transaksi
            }
        } else { // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Transaksi';
            $transaksi = $this->m_cetak_transaksi->view_all(); // Panggil fungsi view_all yang ada di m_cetak_transaksi
        }

        $data['ket'] = $ket;
        $data['transaksi'] = $transaksi;

        ob_start();
        $this->load->view('v_print', $data);
        $html = ob_get_contents();
        ob_end_clean();

        //  require './assets/html2pdf/autoload.php';

        // $pdf = new Spipu\Html2Pdf\Html2Pdf('P','A4','en');
        // $pdf->WriteHTML($html);
        // $pdf->Output('Data Transaksi.pdf', 'D');

        $mpdf = new \Mpdf\Mpdf();
        $this->load->view('v_print', $data);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }


    //EXCEL
    public function export()
    {
        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';
        // Panggil class PHPExcel nya
        $excel = new PHPExcel();
        // Settingan awal fil excel
        $excel->getProperties()->setCreator('Kusuma Jaya Batik')
                     ->setLastModifiedBy('Kusuma Jaya Batik')
                     ->setTitle("Data Pendapatan")
                     ->setSubject("Transaksi")
                     ->setDescription("Laporan Semua Data Transaksi")
                     ->setKeywords("Data Transaksi");
        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
        $style_col = array(
          'font' => array('bold' => true), // Set font nya jadi bold
          'alignment' => array(
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
          ),
          'borders' => array(
            'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
            'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
            'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
            'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
          )
        );
        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = array(
          'alignment' => array(
            'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
          ),
          'borders' => array(
            'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
            'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
            'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
            'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
          )
        );
        if (isset($_GET['filter']) && ! empty($_GET['filter'])) { // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user
            if ($filter == '1') { // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];
                $label = 'Data Transaksi Tanggal '.date('d-m-y', strtotime($tgl));
                $transaksi = $this->m_cetak_transaksi->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di m_cetak_transaksi
            } elseif ($filter == '2') { // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                $label = 'Data Transaksi Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $transaksi = $this->m_cetak_transaksi->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di m_cetak_transaksi
            } else { // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                $label = 'Data Transaksi Tahun '.$tahun;
                $transaksi = $this->m_cetak_transaksi->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di m_cetak_transaksi
            }
        } else { // Jika user tidak mengklik tombol tampilkan
            $label = 'Semua Data Transaksi';
            $transaksi = $this->m_cetak_transaksi->view_all(); // Panggil fungsi view_all yang ada di TransaksiModel
        }
        $excel->setActiveSheetIndex(0);
        $excel->getActiveSheet()->setCellValue('A1', "DATA TRANSAKSI"); // Set kolom A1 dengan tulisan "DATA SISWA"
        $excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true); // Set bold kolom A1
        $excel->getActiveSheet()->setCellValue('A2', $label); // Set kolom A2 sesuai dengan yang pada variabel $label
        $excel->getActiveSheet()->mergeCells('A2:E2'); // Set Merge Cell pada kolom A2 sampai E2
        // Buat header tabel nya pada baris ke 4
        $excel->getActiveSheet()->setCellValue('A4', "Tanggal"); // Set kolom A4 dengan tulisan "Tanggal"
        $excel->getActiveSheet()->setCellValue('B4', "Kode Transaksi"); // Set kolom B4 dengan tulisan "Kode Transaksi"
        $excel->getActiveSheet()->setCellValue('C4', "Barang"); // Set kolom C4 dengan tulisan "Barang"
        $excel->getActiveSheet()->setCellValue('D4', "Harga"); // Set kolom D4 dengan tulisan "Jumlah"
        $excel->getActiveSheet()->setCellValue('E4', "Jumlah "); // Set kolom E4 dengan tulisan "Total Harga"
        $excel->getActiveSheet()->setCellValue('F4', "Sub Total"); // Set kolom E4 dengan tulisan "Total Harga"
        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
        $excel->getActiveSheet()->getStyle('A4')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('B4')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('C4')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('D4')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('E4')->applyFromArray($style_col);
        $excel->getActiveSheet()->getStyle('F4')->applyFromArray($style_col);
        // Set height baris ke 1, 2, 3 dan 4
        $excel->getActiveSheet()->getRowDimension('1')->setRowHeight(20);
        $excel->getActiveSheet()->getRowDimension('2')->setRowHeight(20);
        $excel->getActiveSheet()->getRowDimension('3')->setRowHeight(20);
        $excel->getActiveSheet()->getRowDimension('4')->setRowHeight(20);
        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 5; // Set baris pertama untuk isi tabel adalah baris ke 5

        foreach ($transaksi as $data) { // Lakukan looping pada variabel transaksi
        $tothar=$data->harga * $data->jumlah;
        $total=$total+$tothar;
        $tgl = date('d-m-Y', strtotime($data->tanggal_beli)); // Ubah format tanggal jadi dd-mm-yyyy
        //   $tothar =)( $data->harga * $data->jumlah;
        $excel->getActiveSheet()->setCellValue('A'.$numrow, "$tgl");
        $excel->getActiveSheet()->setCellValue('B'.$numrow, "$data->kode_penjualan");
        $excel->getActiveSheet()->setCellValue('C'.$numrow,"$data->nama_barang");
        $excel->getActiveSheet()->setCellValue('D'.$numrow,"$data->harga");
        $excel->getActiveSheet()->setCellValue('E'.$numrow,"$data->jumlah");
        $excel->getActiveSheet()->setCellValue('F'.$numrow, "$tothar");
        // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
        $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
        $excel->getActiveSheet()->getRowDimension($numrow)->setRowHeight(20);
        $no++; // Tambah 1 setiap kali looping
        $numrow++; // Tambah 1 setiap kali looping
    }
        // Set width kolom
        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(15); // Set width kolom A
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(18); // Set width kolom B
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
        $excel->getActiveSheet()->getColumnDimension('E')->setWidth(20); // Set width kolom E
        $excel->getActiveSheet()->getColumnDimension('F')->setWidth(20); // Set width kolom E
        // Set orientasi kertas jadi LANDSCAPE
        $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        // Set judul file excel nya
        $excel->getActiveSheet()->setTitle("Laporan Data Pendapatan");
        $excel->getActiveSheet();
        // Proses file excel
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="Data Transaksi.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');
        ob_end_clean();
        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $write->save('php://output');
    }

    /* End of file Laporan.php */
}
?>