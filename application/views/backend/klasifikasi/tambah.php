<div class="app-main__outer">
    <div class="app-main__inner">

    <div class="tab-content">
      <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
        <div class="main-card mb-3 card">
          <div class="card-body"><h5 class="card-title">Form Tambah Klasifikasi </h5>
            <!-- <form class="" > -->
              <div class="col-md-6"><?php echo $this->session->flashdata('pesan'); ?></div>
              <?php echo form_open_multipart('klasifikasi/save'); ?>
              <input type="hidden" name="id" value="<?= $id?>">
              <div class="form-row">
                <div class="col-md-6">
                  <div class="position-relative form-group"><label for="" class="">Kode Klasifikasi</label>
                    <input type="text" name="kode" class="form-control" placeholder="Kode Klasifikasi" value="<?= $kode ?>">
                  </div>
                </div>
              </div>

              <div class="form-row">
                <div class="col-md-6">
                  <div class="position-relative form-group"><label for="" class="">Nama Klasifikasi</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama Klasifikasi" value="<?= $nama ?>">
                  </div>
                </div>
              </div>

              <div class="form-row">
                <div class="col-md-6">
                  <div class="position-relative form-group"><label for="" class="">Uraian /keterangan</label>
                    <textarea cols="30" class="form-control" name="uraian"><?= $uraian ?></textarea>
                  </div>
                </div>
              </div>

               
            <br><br>
           
                  
                  <a href="<?php echo base_url('klasifikasi'); ?>" class="mt-2 btn btn-warning btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
                  <?php if ($id != null): ?>
                    <button class="mt-2 btn btn-primary btn-sm"><i class="fas fa-save"></i> Update Data </button>
                  <?php else: ?>
                    <button class="mt-2 btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan Data </button>
                  <?php endif ?>
                  
                  <!-- </form> -->
                  <?php echo form_close(); ?>
                  </div>
                  </div>
                



              </div>
            </div>
          </div>
        