<html>
<?php
//$ci = &get_instance();
//$ci->load->model('statusPelimpahanModel')
?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        @page {
            margin: 25px;
        }

        body {
            margin: 25px;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
        }

        .center {
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }

        .center2 {
            margin-left: auto;
            margin-right: auto;
        }

        hr {
            border: 1px solid #000000;
        }

        table {
            border-spacing: 0;
            border-collapse: collapse;
            width: 100%;
            font-size: 11px;
        }


        #isi th {
            border: 1px solid black;
            padding: 4px;
        }

        #isi tbody td {
            border: 1px solid black;
            padding-left: 5px;
            padding-top: 2px;
            padding-bottom: 2px;
            padding-right: 2px;
        }
    </style>
</head>

<body>
    <table width="110%" class="center">
        <thead>
            <tr>
                <td rowspan="4" class="center" width="80"><img src="<?= base_url(); ?>/assets/img/logo.png" width="80">
                </td>
                <td style="font-size:18px; font-weight: bold;" class="center">KEMENTERIAN AGAMA REPUBLIK INDONESIA</td>
            </tr>
            <tr>
                <td style="font-size:14px; font-weight: bold;">
                    <?= strtoupper($pelimpahan['nama_kab']); ?>
                </td>
            </tr>
            <tr>
                <td style="font-size:12px;">
                    <?= $pelimpahan['baris1']; ?>
                </td>
            </tr>
            <tr>
                <td style="font-size:12px;">
                    <?= $pelimpahan['baris2']; ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <hr>
                </td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2" style="font-size:14px; font-weight: bold;">
                    <B>REKAPITULASI NAMA-NAMA JAMAH PELIMPAHAN PORSI</B>

                </td>
            </tr>
            <tr>
                <td colspan="2" style="font-size:14px; font-weight: bold;">
                    Tanggal
                    <?php
                    echo $this->fungsi->tanggal2($tglm, false);
                    echo ' s.d ';
                    echo $this->fungsi->tanggal2($tgla, false);
                    ?>
                </td>
            </tr>

            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="2" style="padding-left:20px;">
                    <table class=" dt-responsive  isi" id="isi">
                        <tr>
                            <th>NO</th>
                            <th>NO PORSI</th>
                            <th>NAMA JAMAAH</th>
                            <th>JK</th>
                            <th>NIK</th>
                            <th>Tempat/TGL. LAHIR</th>
                            <th>JENIS PELIMPAHAN</th>
                            <th>STATUS PELIMPAHAN</th>
                        </tr>

                        <?php
                        $no = 1;
                        foreach ($data as $key => $val) {
                            $row = $this->statusPelimpahanModel->getStatusTerakhir($val->pelimpahan_id);
                            if ($row) {
                                $label = $row['status'];
                                if ($status != 'all' && $status != $row['status']) {
                                    continue;
                                }
                            } else {
                                $label = 'Draf';
                                if ($status != $label && $status != 'all') {
                                    continue;
                                }

                            }

                            echo '<tr>
                            <td style="text-align:center;">' . $no++ . '</td>
                            <td style="text-align:center;">' . $val->jamaah_no_porsi . '</td>
                            <td style="text-align:left;">' . $val->jamaah_nama . '</td>
                            <td style="text-align:center;">' . $val->jamaah_jk . '</td>
                            <td style="text-align:left;">' . $val->jamaah_nik . '</td>
                            <td style="text-align:left;">' . $val->jamaah_tptlahir . ', ' . $this->fungsi->tanggal2($val->jamaah_tgllahir, false) . '</td>
                            <td style="text-align:left;">' . $val->jamaah_jenis . '</td>
                            <td style="text-align:left;">' . $label . '</td>
                            ';
                        }
                        ?>

                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>