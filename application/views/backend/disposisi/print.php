<style>
	.isi {
		height: 300px;
	}
</style>
<div class="container" style="margin-top:50px">
	<div class="table-reponsive">
		<table class="table table-bordered" id="tbl">
            <tbody>
                <tr>
                    <td class="tgh" id="lbr" colspan="5">LEMBAR DISPOSISI</td>
                </tr>
                <tr>
                    <td id="right" width="18%"><strong>Indeks Berkas</strong></td>
                    <td id="left" style="border-right: none;" width="57%">: <?= $surat->nama_index ?></td>
                    <td id="left" width="25"><strong>Kode</strong> : <?= $surat->kode ?> - <?= $surat->nama ?></td>
                </tr>
                <tr><td id="right"><strong>Tanggal Surat</strong></td>
                    <td id="left" colspan="2">: <?= $surat->tgl_surat ?></td>
                </tr>
                <tr>
                    <td id="right"><strong>Nomor Surat</strong></td>
                    <td id="left" colspan="2">: <?= $surat->no_surat ?></td>
                </tr>
                <tr>
                    <td id="right"><strong>Asal Surat</strong></td>
                    <td id="left" colspan="2">: <?= $surat->asal_surat ?></td>
                </tr>
                <tr>
                    <td id="right"><strong>Isi Ringkas</strong></td>
                    <td id="left" colspan="2">: <?= $surat->keterangan ?></td>
                </tr>
                <tr>
                    <td id="right"><strong>Diterima Tanggal</strong></td>
                    <td id="left" style="border-right: none;">:<?= $surat->tgl_terima ?></td>
                    <td id="left"><strong>No. Agenda</strong> : <?= $surat->no_agenda ?></td>
                </tr>
                <tr>
                    <td id="right"><strong>Tanggal Penyelesaian</strong></td>
                    <td id="left" colspan="2">: <?= $surat->batas_waktu ?></td>
                </tr>
                <tr>
                </tr><tr class="">
                    <td colspan="2"><strong>Isi Disposisi : </strong>
                    </td>

                    <td><strong>Diteruskan Kepada</strong> : </td>
                </tr>
                <tr class="isi">
                    <td colspan="2">
                     <p>
                     	<?= $surat->isi_disposisi ?>
                     </p>
                    </td>
                    
                    <td>
                    	<strong>
                    		<?= $surat->tujuan_disposisi ?>
                    	</strong>
                    </td>
                </tr>
         	</tbody>
    	</table>
	</div>
</div>
<script>
		window.print()
	</script>