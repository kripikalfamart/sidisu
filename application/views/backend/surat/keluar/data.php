
<div class="app-main__outer">
    <div class="app-main__inner">
       
            <h5 >Data Surat Keluar</h5>
            <div class="col-lg-4"><?php echo $this->session->flashdata('pesan'); ?></div>

        <!-- row -->
        <div class="row">
              <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">
                        <a style="font-size: 12px;" href="<?php echo base_url('surat/tsuratkeluar'); ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Surat Keluar</a>
                        </h5>
                        <div class="table-responsive">
                        <table class="mb-0 table table-bordered table-hover datatable">
                            <thead>
                            <tr>
                                <th style="text-align: center; font-size: 12px;">NO</th>
                                <th style="text-align: center; font-size: 12px;">FILE</th>
                                <th style="text-align: center; font-size: 12px;">NO. AGENDA</th>
                                <th style="text-align: center; font-size: 12px;">NO. SURAT</th>
                                <th style="text-align: center; font-size: 12px;">TUJUAN</th>
                                <th style="text-align: center; font-size: 12px;">ACTION</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; foreach($datas as $r) { ?>
                            <tr>
                                <td style="text-align: center; font-size: 12px;"><?php echo $i; ?></td>
                                <td style="text-align: center; font-size: 12px;"><a href="<?php echo base_url('datasurat/keluar/'.$r->file) ?>"><?php echo $r->file; ?></a></td>
                                <td style="text-align: center; font-size: 12px;"><?php echo $r->no_agenda; ?></td>
                                <td style="text-align: center; font-size: 12px;"><?php echo $r->no_surat; ?></td>
                                <td style="text-align: center; font-size: 12px;"><?php echo $r->tujuan; ?></td>
                                <td   style="text-align: center; font-size: 12px;">
                                    <a class="btn btn-info" href="<?php echo base_url('disposisi/surat_keluar/'.$r->id_suratkeluar); ?>"><i class="fa fa-cog" title="Edit Data Surat "></i> Disposisi </a> 
                                    <a class="btn btn-warning" href="<?php echo base_url('surat/esuratkeluar/'.$r->id_suratkeluar); ?>"><i class="fa fa-pen" title="Edit Data Surat "></i></a> 
                                <a class="btn btn-danger" onclick="return confirm('apakah anda ingin menghapus data ?')" href="<?php echo base_url('surat/hsuratkeluar/'.$r->id_suratkeluar); ?>"><i class="fa fa-trash" title="Hapus Data Surat "></i></a> 
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
