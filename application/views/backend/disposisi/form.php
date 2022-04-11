<div class="app-main__outer">
    <div class="app-main__inner">



 <div class="tab-content">
    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
      <div class="main-card mb-3 card">
        <div class="card-body"><h5 class="card-title">Disposisi Surat</h5>
          <!-- <form class="" > -->
            <div class="col-md-6"><?php echo $this->session->flashdata('pesan'); ?></div>
            
            <div class="row">
              <div class="col-md-8">
                <?php echo form_open_multipart('disposisi/set/'); ?>
            
            <div class="form-row">
              <div class="col-md-8">
                <div class="position-relative form-group"><label for="" class="">Tujuan Disposisi</label>
                  <input type="text" name="tujuan" class="form-control" placeholder="Tujuan..">
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-8">
                <div class="position-relative form-group"><label for="" class="">Isi</label>
                  <textarea class="form-control" name="isi_disposisi"></textarea>
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-8">
                <div class="position-relative form-group"><label for="" class="">Sifat</label>
                  <select class="form-control" name="klasifikasi">
                    <option>-Pilih Klasifikasi-</option>
                    <option value="Biasa">Biasa</option>
                    <option value="Penting">Penting</option>
                    <option value="Segera">Segera</option>
                    <option value="Rahasia">Rahasia</option>
                  </select>
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-8">
                <div class="position-relative form-group"><label for="" class="">Batas Waktu</label>
                  <input type="date" name="batas_waktu" class="form-control" >
                </div>
              </div>
            </div>

          
            <div class="form-row">
              <div class="col-md-8">
                <div class="position-relative form-group"><label for="" class="">Keterangan</label>
                  <textarea class="form-control" name="keterangan"></textarea>
                </div>
              </div>
            </div>
             
          <br><br>
         
                
                <a href="<?php echo base_url('surat/masuk'); ?>" class="mt-2 btn btn-warning btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
                <button class="mt-2 btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan Data </button>
                <!-- </form> -->
                <?php echo form_close(); ?>
              </div>
              <div class="md-12">
                <h5 class="card-title">Data Surat</h5>
                <table class="table table-bordered">
                    <?php foreach ($datas as $row): ?>
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
            </div>    
        </div>
      </div>

      </div>
    </div>
  </div>
        