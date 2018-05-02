<?php
    include "../../init/db.php";
    //include "../admin_login.php";
    require '../plugins/fpdf/fpdf.php';
    $tgl_cetak = date("d-m-Y");
    // $id_transaksi = 'INV2018010000001';

    $tahun = isset( $_GET['tahun']) ?  $_GET['tahun'] : null;
    $bulan = isset( $_GET['bulan']) ?  $_GET['bulan'] : null;
    // $tahun = "2018";
    // $bulan = "01";
    $sql = mysqli_query($conn, "SELECT * FROM pembelian_brg WHERE YEAR(tgl_pembelian) ='$tahun' AND MONTH(tgl_pembelian) ='$bulan' AND grand_total <> 0 ");

    class PDF extends FPDF
    {
// Page header
        
        function Header()
        {
                // Logo
            // $this->Image('../dist/img/avatar.png',10,10,20);
            // Arial bold 15
            $this->SetFont('Arial','B',16);
            // Move to the right
            $this->Cell(80);
            // Title
            $this->Cell(30,10,'TOKO KARUNIA JAYA',0,1,'C');

            $this->Cell(80);
            $this->Cell(30,5,'Laporan Pembelian',0,1,'C');
            
            // Line break
            $this->Ln(15);
        }

// Page footer
        function Footer()
        {
            // Position at 1.5 cm from bottom
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','I',8);
            // Page number
            $this->Cell(0,10,'Halaman '.$this->PageNo().'/{nb}',0,0,'C');
        }
    }
    // Max width for Potrait 189
    $pdf = new PDF('P','mm','A4');
    $pdf->AliasNbPages();
    $pdf->AddPage();

    $pdf->SetFont('Arial','B',14);
    $pdf->Cell(80);
    $pdf->Cell(30,5,'Bulan : ' .$bulan ,0,1,'C');
    $pdf->Cell(189 ,5,'',0,1); //dummy

    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(30 ,7,'Tanggal Cetak : '.$tgl_cetak,0,1);
    $pdf->Cell(189 ,5,'',0,1); //dummy

    while ($row = mysqli_fetch_assoc($sql)) {
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(80 ,7,'ID Faktur : '.$row['id_transaksi'],0,0);
        $pdf->Cell(80 ,7,'Tanggal : '.$row['tgl_pembelian'],0,1);

        $pdf->Cell(100 ,7,'Nama Barang',1,0);
        $pdf->Cell(16 ,7,'Qty',1,0);
        
        $pdf->Cell(43 ,7,'Subtotal',1,1);//end of line

        $pdf->SetFont('Arial','',12);

        //Numbers are right-aligned so we give 'R' after new line parameter
        $sql1 = mysqli_query($conn,"SELECT * FROM detail_pembelian_brg INNER JOIN list_brg USING(id_brg) WHERE id_transaksi = '$row[id_transaksi]'");
        while ($rows = mysqli_fetch_assoc($sql1)) {
            
            $pdf->Cell(100 ,8,$rows['nama_brg'],1,0);
            $pdf->Cell(16 ,8,$rows['jumlah_beli'],1,0);
            // $pdf->Cell(30 ,8,$rows['harga'],1,0);
            $pdf->Cell(43 ,8,$rows['sub_total'],1,1,'R');//end of line
        }
        $pdf->SetFont('Arial','B',12);
        //summary
        $pdf->Cell(86 ,8,'',0,0);
        $pdf->Cell(30 ,8,'Total',0,0);
        $pdf->Cell(9 ,8,'Rp.',1,0);
        $pdf->Cell(34 ,8,$row['grand_total'],1,1,'R');//end of line

        // $pdf->SetFont('Arial','',12);
        // $pdf->Cell(116 ,8,'',0,0);
        // $pdf->Cell(30 ,8,'Jumlah Bayar',0,0);
        // $pdf->Cell(9 ,8,'Rp.',1,0);
        // $pdf->Cell(34 ,8,'$jumlah_bayar',1,1,'R');//end of line

        $pdf->Cell(86 ,8,'',0,0);
        $pdf->Cell(30 ,8,'Sisa Bayar',0,0);
        $pdf->Cell(9 ,8,'Rp.',1,0);
        $pdf->Cell(34 ,8,$row['sisa_bayar'],1,1,'R');//end of line

        $pdf->Cell(189 ,5,'',0,1); //dummy
        $pdf->Cell(189 ,5,'',0,1); //dummy
    }

    $pdf->Output();
?>
