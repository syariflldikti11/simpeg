  <div class="container">
 <div class="row justify-content-center">

     <div class="col-xl-10 col-lg-12 col-md-12">

         <div class="card o-hidden border-0 shadow my-5">
             <div class="card-body p-0">
                 <!-- Nested Row within Card Body -->
                 <div class="row">
                     <div class="col-lg-4 d-none d-lg-block ">
                         <iframe src="<?= base_url(); ?>/tour" height="100%" width="100%" title="Pinandu LLDIKTIXI Kalimantan"></iframe>
                     </div>
                     <div class="col-lg-8">
                         <div class="p-5">
                             <div class="text-center">
                                 <h1 class="h4 text-gray-900 mb-4">PINANDU LLDIKTI XI</h1>
                             </div>
                             <?php  
             echo validation_errors();                       
    echo form_open('umum/cek_tiket','class="user"'); ?>
                              
                                 <div class="form-group">
                                     <label for="nomor_tiket">Nomor Tiket</label>
                                     <input type="text" name="nomor_tiket" class="form-control" placeholder="Isi Dengan Nomor Tiket">
                                  
                                 </div>
                                 <button type="submit" name="submit" class="btn btn-info btn-user btn-block" name="button"><strong>PERIKSA TIKET</strong></button>
                             </form>
                             <hr>
                             <div class="text-center">
                                 <a class="small" href="<?= base_url('umum'); ?>">Buat Tiket</a>
                             </div>
                              <div class="text-center">
                             <a class="small" href="<?= base_url('umum/info_sp'); ?>">Info Standar Layanan</a>
                         </div>
                        
                             
                           
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 </div>