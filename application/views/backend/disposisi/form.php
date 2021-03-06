<div class="app-main__outer">
    <div class="app-main__inner">



 <div class="tab-content">
    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
      <div class="main-card mb-3 card">
        <div class="card-body"><h5 class="card-title">Disposisi Surat Masuk</h5>
          <!-- <form class="" > -->
            <div class="col-md-12"><?php echo $this->session->flashdata('pesan'); ?></div>
            
            <div class="row" >
               <?php echo form_open_multipart('disposisi/save/'); ?>
              <div class="col-md-8">
               
            
            
                    <div class="mb3"><label for="" class="form-label">Tujuan Disposisi</label>
                      <input type="text" name="tujuan" class="form-control" placeholder="Tujuan..">
                    </div>
                

                
                    <div class="mb3"><label for="" class="form-label">Isi</label>
                      <textarea class="form-control" name="isi_disposisi"></textarea>
                    </div>
                 

                
                    <div class="mb3"><label for="" class="form-label">Sifat</label>
                      <select class="form-control" name="sifat">
                        <option>-Pilih Sifat Surat-</option>
                        <option value="Biasa">Biasa</option>
                        <option value="Penting">Penting</option>
                        <option value="Segera">Segera</option>
                        <option value="Rahasia">Rahasia</option>
                      </select>
                    </div>
                 

            
                    <div class="mb3"><label for="" class="form-label">Batas Waktu</label>
                      <input type="date" name="batas_waktu" class="form-control" >
                    </div>
               

              
                
                    <div class="mb3"><label for="" class="form-label">Keterangan</label>
                      <textarea class="form-control" name="keterangan"></textarea>
                    </div>
                 
                   <div class="mb3"><label for="" class="form-label">Status Penerima</label>
                      <select class="form-control" name="status_surat">
                        <option value="diproses">Status Surat</option>
                        <option value="diproses">Diproses</option>
                        <option value="Diperikas">Diterima</option>
                        <option value="Disetujui">Disetujui</option>
                        <option value="Ditolak">Ditolak</option>
                      </select>
                    </div>


              <br><br>
         
                
                <a href="<?php echo base_url('surat/masuk'); ?>" class="mt-2 btn btn-warning btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
                <button class="mt-2 btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan Data </button>
                <!-- </form> -->
                
              </div>
              <div class="col-md-4" style="margin-top: 20px;">
                <h5 class="card-title">Data Surat</h5>
                <table class="table table-bordered">
                    <?php foreach ($datas as $row): ?>
                      <input type="hidden" name="id" value="<?= $row->id_suratmasuk ?>">
                      <tr>
                        <td>Tujuan Surat</td>
                        <td> <?= $row->tujuan ?></td>
                      </tr>
                      <tr>
                        <td>
                          Asal Surat
                        </td>
                        <td>
                          <?= $row->asal_surat ?>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Nomor Surat
                        </td>
                        <td>
                          <?= $row->no_surat ?>
                        </td>
                      </tr>

                      <tr>
                        <td>
                          File
                        </td>
                        <td>
                          <a href="<?php echo base_url('datasurat/masuk/'.$row->file) ?>"><?php echo $row->file; ?></a>
                        </td>
                      </tr>

                    <?php endforeach ?>
                </table>
              </div>
              <?php echo form_close(); ?>
            </div>    
        </div>
      </div>

      </div>
    </div>
  </div>
        