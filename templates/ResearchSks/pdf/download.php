<?php
use Cake\I18n\DateTime;
use Cake\I18n\Date;
use Cake\Chronos\ChronosDate;

$this->loadHelper('QrCode.QrCode');
 ?>
<div>
  <p align='center' style="font-weight:bold; margin-top:0"> NOMOR :<?= $researchSk->no_sk ?> </p>
  <p align='justify'>
    Berdasrakan Peraturan Menteri Dalam Negeri Nomor 3 Tahun 2018 Tentang Surat Keterangan Penelitian, dan
    Peraturan Bupati Bone Bolango No 6 Tahun 2022 Tentang Pendelegasian Wewenang Penerbitan dan Penandatanganan Perizinan dan Non Perizinan Kepada Peyelenggara Pelayanan Terpadu Satu Pintu.
    Dengan mempertimbangkan surat permohonan/ pengantar/ rekomendasi dari instansi pemohon, Kepala Dinas Penanaman Modal dan Perizinan Terpadu Satu Pintu Kabupaten Bone Bolango, memberikan Surat Keterangan Penelitian Kepada:
  </p>
  <table style="width: 100%;">
      <tr>
          <td>Nama </td>
          <td>:</td>
          <td> <?= $profile->nama_lengkap ?></td>
      </tr>
      <tr>
          <td>Alamat </td>
          <td>:</td>
          <td> <?= $profile->alamat_lengkap ?></td>
      </tr>
      <tr>
          <td>Judul Penelitian</td>
          <td>:</td>
          <td> <?= $researchSk->research->judul ?></td>
      </tr>
      <tr>
          <td>Tujuan Penelitian </td>
          <td>:</td>
          <td> <?= $researchSk->research->tujuan ?></td>
      </tr>
      <tr>
          <td>Tempat Penelitian</td>
          <td>:</td>
          <td> <?= $researchSk->research->lokasi ?></td>
      </tr>
      <tr>
          <td>Bidang Penelitian</td>
          <td>:</td>
          <td> <?= $researchSk->research->bidang ?></td>
      </tr>
      <?php if (!empty($researchSk->research->anggota)) : ?>
        <tr>
            <td>Anggota Penelitian </td>
            <td>:</td>
            <td> <?= $researchSk->research->anggota ?></td>
        </tr>
      <?php endif; ?>
      <tr>
          <td>Penanggung Jawab</td>
          <td>:</td>
          <td> <?= $researchSk->research->penanggung_jawab ?></td>
      </tr>
      <tr>
          <td>Lembaga</td>
          <td>:</td>
          <td> <?= $researchSk->research->nama_lembaga ?></td>
      </tr>
      <tr>
          <td>Waktu Penelitian</td>
          <td>:</td>
          <td> Sejak Ditetapkan</td>
      </tr>


  </table>
    <p align='justify'>Pada prinsipnya rencana penelitian yang bersangkutan tidak bertentangan dengan Pancasila dan Undang-Undang Dasar 1945 serta yang bersangkutan disetujui untuk melanjutkan penelitian dengan ketentuan : </p>
    <ol align='justify'>
      <li>Ruang Lingkup dan Lokasi Penelitian yang bersangkutan bedasarkan pada kerangka kerja/proposal/protokol yang disampaikan;</li>
      <li>Peneliti harus menyampaikan hasil penelitiannya kepada Pemerintah Daerah Kabupaten Bone Bolango melalui Dinas Penanaman Modal Pelayanan Terpadu Satu Pintu setelah selesai melakukan penelitian.</li>
      <li>Surat Keterangan Penelitian ini berlaku sampai <?=(new ChronosDate($researchSk->tanggal_ttd))->addYears(1)->format('d-M-Y') ?> ,satu tahun sejak tanggal penetapan dan selanjutnya dapat diperpanjang kembali apabila yang bersangkutan belum selesai melakukan penelitian.</li>
    </ol>
    <p align='justify'>Demikian Surat Keterangan Penelitian ini diberikan untuk dipergunakan sebagaimana mestinya dalam melakukan penelitian</p>

    <p> Tanggal Penetapan: <?= $researchSk->tanggal_ttd->format('d-M-Y') ?> </p>
    <table style="width: 100%;">
      <tr>
          <td style="width: 30%;"></td>
          <td><?= $this->Html->image('profiles/pasfoto'.DS.$profile->pasfoto,['fullBase'=>true,'width'=>150, 'align'=>'center']) ?></td>
          <td align='center' style="width: 30%;">
              <h5>KEPALA DINAS </h5>
              <div class='qr' style="width: 80px;"> <?= $this->QrCode->image("SKP No:$researchSk->no_sk ditetapkan secara elektronik tanggal ".$researchSk->tanggal_ttd->format('d-M-Y')." Oleh Kepala Dinas PMPTSP Bone Bolango, JUMAIDIL.AP, S.Sos, M.Ec.Dev") ?> </div>
              <h5 style="margin-top:0; margin-bottom:0;">JUMAIDIL Ap, Mec.Dev</h5>
              <h5 style="margin-top:0; margin-bottom:0;">Pembina Utama Muda</h5>
              <h5 style="margin-top:0; margin-bottom:0;">Nip. 19741018 199311 1 002</h5>
          </td>
      </tr>
    </table>
</div>
<div style="font-size: 10px; "> Tembusan:
  <ul>
    <ol> 1. Bupati Bone Bolango di Suwawa sebagai laporan. </ol>
    <ol> 2. Universitas/Sekolah/Lembaga yang bersangkutan. </ol>
    <ol> 3. Pertinggal </ol>
  </ul>
</div>
