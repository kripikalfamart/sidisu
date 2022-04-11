<div class="app-main__outer">
    <div class="app-main__inner">



 <div class="tab-content">
    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
      <div class="main-card mb-3 card">
        <div class="card-body"><h5 class="card-title">Form Tambah Surat Masuk </h5>
          <!-- <form class="" > -->
            <div class="col-md-6"><?php echo $this->session->flashdata('pesan'); ?></div>
            <?php echo form_open_multipart('surat/save_suratmasuk/'); ?>
            
            <div class="form-row">
              <div class="col-md-6">
                <div class="position-relative form-group"><label for="" class="">Agenda</label>
                  <input type="text" name="no_agenda" class="form-control" placeholder="No. Agenda..">
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-6">
                <div class="position-relative form-group"><label for="" class="">No. Surat</label>
                  <input type="text" name="no_surat" class="form-control" placeholder="No. Surat..">
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-6">
                <div class="position-relative form-group"><label for="" class="">Tujuan</label>
                  <input type="text" name="tujuan" class="form-control" placeholder="Surat Tujuan..">
                </div>
              </div>
            </div>

            <div class="form-row">
              <div class="col-md-6">
                <div class="position-relative form-group"><label for="" class="">File/Surat/Dokumen</label>
                  <input type="file" name="file" class="form-control" placeholder="Surat">
                </div>
              </div>
            </div>
          
            
             
          <br><br>
         
                
                <a href="<?php echo base_url('surat/masuk'); ?>" class="mt-2 btn btn-warning btn-sm"><i class="fas fa-arrow-left"></i> Kembali</a>
                <button class="mt-2 btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan Data </button>
                <!-- </form> -->
                <?php echo form_close(); ?>
                </div>
                </div>
                



              </div>
            </div>
          </div>
        