
<div class="app-main__outer">
    <div class="app-main__inner">
       
            <h5 >Data Surat Masuk</h5>
            <div class="col-lg-4"><?php echo $this->session->flashdata('pesan'); ?></div>

        <!-- row -->
        <div class="row">
              <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">
                        <a style="font-size: 12px;" href="<?php echo base_url('klasifikasi/add'); ?>" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Klasifikasi </a>
                        </h5>
                        <div class="table-responsive">
                        <table class="mb-0 table table-bordered table-hover datatable">
                            <thead>
                            <tr>
                                <th style="text-align: center; font-size: 12px;">Kode</th>
                                <th style="text-align: center; font-size: 12px;">Nama</th>
                                <th style="text-align: center; font-size: 12px;">Keterangan</th>
                                <th style="text-align: center; font-size: 12px;">ACTION</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($klasifikasi as $row): ?>
                                    <tr>
                                        <td><?= $row->kode ?></td>
                                        <td><?= $row->nama ?></td>
                                        <td><?= $row->uraian ?></td>
                                        <td>
                                            <a href="" class="btn btn-warning "><i class="fa fa-pen"></i> Edit</a>
                                            <a onclick="return confirm('apakah anda ingin menghapus data ?')" href="<?= base_url('klasifikasi/deleteData/'.$row->id_klasifikasi) ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            
                            </tbody>
                        </table>
                    </div>
                    </div>
                    
                    
                </div>
            </div>

        </div>
        <!-- ahir row -->
</div>
