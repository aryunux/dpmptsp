
 <div class="row">
   <div class="content column column-40">
      <?php if(empty($sk)) {
        echo "<span> Maaf Data Tidak Ditemukan </span>";
      }else{
        echo "<h5> No Surat : $sk->no_sk , telah diverifikas dan ditanda tangani secara elektronik pada tanggal $sk->tanggal_ttd </h5>";
      }
      ?>
     <div>
     </div>
   </div>
 </div>
