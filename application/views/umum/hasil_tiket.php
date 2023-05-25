<div class="container">
<div class="row justify-content-center">

         <div class="col-xl-10 col-lg-12 col-md-9">

             <div class="card o-hidden border-0 shadow my-5">
                 <div class="card-body p-0">
                     <!-- Nested Row within Card Body -->
                     <div class="row">
                         <div class="col-lg-4 d-none d-lg-block bg-login-image">
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
                                     <div class="input-group mb-3">
                                         <input type="text" name="nomor_tiket" class="form-control" id="nomor_tiket"
                                             value="<?= $kode_tiket; ?>" placeholder="Isi Dengan Nomor Tiket" readonly>
                                         <div class="input-group-append">
                                             <button class="btn btn-info" type="button" onclick="copy()"><i
                                                     class="fa fa-copy"></i>
                                                 Copy</button>
                                         </div>
                                     </div>
                                     <p>Silakan simpan nomor tiket ini untuk pengajuan layanan LLDIKTI Wilayah XI
                                         Kalimantan
                                         <button type="submit" name="submit" class="btn btn-info btn-user btn-block" name="button"><strong>PERIKSA TIKET</strong></button>
                                     </p>
                                 </div>
</form>
                                 <hr>
                                 <div class="text-center">
                                     <a class="small" href="<?= base_url('umum/input_tiket'); ?>">Input Tiket</a>
                                 </div>
                                 <div class="text-center">
                                     <a class="small" href="<?= base_url('umum/info_sp'); ?>">Lihat Layanan
                                         Tersedia</a>
                                 </div>
                                 <div class="text-center">
                                 <a class="small" href="<?= base_url('umum'); ?>">Buat Tiket</a>
                             </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
    </div>

    <script>
        

         function copy() {
             var copyText = document.getElementById("nomor_tiket");

             copyText.select();
             copyText.setSelectionRange(0, 99999); /* For mobile devices */

            // ini kada mau bila kada https
            //  navigator.clipboard.writeText(copyText.value);

             copyToClipboard(copyText.value)
                 .then(() => {
                     Toast.fire({
                         icon: 'success',
                         title: '"' +copyText.value + '" sudah dicopy'
                     })
                 })
                 .catch(() => {
                     Toast.fire({
                         icon: 'danger',
                         title: 'gagal dicopy/disalin'
                     })
                 });

             Toast.fire({
                 icon: 'success',
                 title: copyText.value + ' sudah dicopy/disalin'
             })
         }

         function copyToClipboard(textToCopy) {
             // navigator clipboard api needs a secure context (https)
             if (navigator.clipboard && window.isSecureContext) {
                 // navigator clipboard api method'
                 return navigator.clipboard.writeText(textToCopy);
             } else {
                 // text area method
                 let textArea = document.createElement("textarea");
                 textArea.value = textToCopy;
                 // make the textarea out of viewport
                 textArea.style.position = "fixed";
                 textArea.style.left = "-999999px";
                 textArea.style.top = "-999999px";
                 document.body.appendChild(textArea);
                 textArea.focus();
                 textArea.select();
                 return new Promise((res, rej) => {
                     // here the magic happens
                     document.execCommand('copy') ? res() : rej();
                     textArea.remove();
                 });
             }
         }
     </script>