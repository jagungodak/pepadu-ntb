<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        @page {
            margin: 25px;
        }



        body {
            margin: 25px;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 13px;
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
            width: 110%;
            font-size: 13px;
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
                <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="3" style="font-size:14px; font-weight: bold;"><B><u>SURAT REKOMENDASI</u></B></td>
            </tr>
            <tr>
                <td colspan="2">
                    Nomor: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php
                    $bln = Date('m');
                    $thn = Date('Y');
                    echo $pelimpahan['nomor'] . '/' . $bln . '/' . $thn; ?>
                </td>
            </tr>

            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="2" style="padding-left:20px;">
                    <table width="100%">
                        <tr>
                            <td colspan="2">Saya yang bertanda tangan dibawah ini :</td>
                        </tr>
                        <tr>
                            <td width="20%">Nama </td>
                            <td width="90%">:
                                <?= $pelimpahan['kepala']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>NIP </td>
                            <td>:
                                <?= $pelimpahan['nip']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Jabatan </td>
                            <td>:
                                <?= $pelimpahan['jabatan']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Unit Kerja/Instansi </td>
                            <td>:
                                <?= $pelimpahan['unit_kerja']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="padding-top:20px;">Dengan ini menyatakan bahwa :</td>
                        </tr>
                        <tr>
                            <td>Nama </td>
                            <td>:
                                <?= $pelimpahan['pelimpahan_nama']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Bin/Binti </td>
                            <td>:
                                <?= $pelimpahan['pelimpahan_nama_ayah']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Tempat/Tgl. Lahir </td>
                            <td>:
                                <?= $pelimpahan['pelimpahan_tptlahir'] . ', ' . $pelimpahan['pelimpahan_tgllahir']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:
                                <?= $pelimpahan['pelimpahan_alamat']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-top:20px;" colspan="2">Yang bersangkutan memang benar adalah ahli waris
                                <?= $pelimpahan['pelimpahan_hub_keluarga']; ?> dari Jemaah Haji
                                <?= $pelimpahan['jamaah_jenis']; ?> :
                            </td>

                        <tr>
                            <td>Nama</td>
                            <td>:
                                <?= $pelimpahan['jamaah_nama']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Nomor Porsi </td>
                            <td>:
                                <?= $pelimpahan['jamaah_no_porsi']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">berdasrkan hasil verifikasi persyaratan permohonan Pelimpahan Nomor Porsi
                                Jemaah Haji
                                <?= $pelimpahan['jamaah_jenis']; ?>.
                            </td>

                        </tr>
                        <tr>
                            <td colspan="2">Demikian surat rekomendasi ini dibuat dengan sesungguhnya dan
                                sebenar-benarnya untuk dapat digunakan sebagaimana mestinya. </td>

                        </tr>
                        <tr>
                            <td colspan="2">
                                <table>
                                    <tr>
                                        <td width="30%"></td>
                                        <td width="30%"></td>
                                        <td width="40%">
                                            <?= $pelimpahan['kota']; ?>,
                                            <?= $this->fungsi->tanggal2(Date("Y-m-d"), false); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%"></td>
                                        <td width="30%"></td>
                                        <td width="40%">
                                            <?= $pelimpahan['jabatan']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="30%"></td>
                                        <td width="30%"></td>
                                        <td width="40%" style="padding-top:50px;">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td width="30%"></td>
                                        <td width="30%"></td>
                                        <td width="40%">
                                            <u>
                                                <?= $pelimpahan['kepala']; ?>
                                            </u>
                                        </td>
                                    </tr>
                                </table>
                            </td>

                        </tr>

                    </table>
                </td>
            </tr>
        </tbody>
    </table>




</body>

</html>