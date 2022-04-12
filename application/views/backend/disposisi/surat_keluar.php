
<div class="app-main__outer">
    <div class="app-main__inner">
       
            <h5 >Data Disposisi Surat Keluar</h5>
            <div class="col-lg-4"><?php echo $this->session->flashdata('pesan'); ?></div>

        <!-- row -->
        <div class="row">
          <div class="col-lg-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">
                    <a style="font-size: 12px;" href="<?php echo base_url('disposisi/set_keluar/'.$row->id_suratkeluar); ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Disposisi </a>
                    </h5>
                    <table class="table">
                        <tr>
                            <td>No Surat : </td>
                            <td><?= $row->no_surat ?></td>
                        </tr>

                        <tr>
                            <td>
                                Tujuan Surat : 
                            </td>
                            <td>
                                <?= $row->tujuan ?>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                Klasifikasi : 
                            </td>
                            <td>
                                <?= $row->kode_klasifikasi ?> - <?= $row->nama_klasifikasi ?>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                Tanggal Terima : 
                            </td>
                            <td>
                                <?= $row->tgl_surat ?>
                            </td>
                        </tr>
                    </table>
                    <h5 class="label">Riwayat Disposisi</h5>
                    <div class="table-responsive">
                    <table class="mb-0 table table-bordered table-hover datatable">
                        <thead>
                        <tr>
                            <th style="text-align: center; font-size: 12px;">NO</th>
                            <th style="text-align: center; font-size: 12px;">FILE</th>
                            <th style="text-align: center; font-size: 12px;">NO. AGENDA</th>
                            <th style="text-align: center; font-size: 12px;">NO. SURAT</th>
                            <th style="text-align: center; font-size: 12px;">ASAL SURAT</th>
                            <th style="text-align: center; font-size: 12px;">TUJUAN</th>
                            <th style="text-align: center; font-size: 12px;">DISPOSISI</th>
                            <th style="text-align: center; font-size: 12px;">Status Disposisi</th>
                            <th style="text-align: center; font-size: 12px;">ACTION</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; foreach($datas as $r) { ?>
                        <tr>
                            <td style="text-align: center; font-size: 12px;"><?php echo $i; ?></td>
                            <td style="text-align: center; font-size: 12px;"><a href="<?php echo base_url('datasurat/masuk/'.$r->file) ?>"><?php echo $r->file; ?></a></td>
                            <td style="text-align: center; font-size: 12px;"><?php echo $r->no_agenda; ?></td>
                            <td style="text-align: center; font-size: 12px;"><?php echo $r->no_surat; ?></td>
                            <td style="text-align: center; font-size: 12px;"><?php echo $r->asal_surat; ?></td>
                            <td style="text-align: center; font-size: 12px;"><?php echo $r->tujuan; ?></td>
                            <td style="text-align: center; font-size: 12px;">
                                <span class="badge bg-success text-white"><?php echo $r->tujuan_disposisi; ?></span>
                            </td>
                           <td style="text-align: center; font-size: 12px;">
                                <span class="badge bg-success text-white"><?php echo $r->status; ?></span>
                            </td>
                            <td   style="text-align: center; font-size: 12px;">
                                <a class="btn btn-info" href="<?php echo base_url('disposisi/print/'.$r->id_suratkeluar); ?>"><i class="fa fa-cog" title="Edit Data Surat "></i> Print</a> 
                        
                            </td>
                        </tr>
                        <?php $i++; } ?>
                        
                        </tbody>
                    </table>
                </div>
                </div>
                
                
            </div>
        </div>

        </div>
        <!-- ahir row -->
        


                        
</div>
