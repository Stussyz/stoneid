 <!-- modal isi form pasang iklan -->
 <div class="modal fade" id="daftarIklanUserModal" tabindex="-1" aria-labelledby="daftarIklanUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="daftarIklanUserModalLabel">Isi Data Berikut Untuk Melanjutkan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 g-0 gx-5">

                        <!-- FORM UPLOAD FROM USER START -->
                        <form method="post" action="{{ route('stone.request-listing') }}" enctype="multipart/form-data">
                            @csrf

                            {{-- <input type="hidden" name="listing_request_id" value="" class="form-control"> --}}

                            <h5 class="my-4">Data Pribadi</h5>
                            <div class="mb-3">
                                <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" name="name" value="{{ $user->name; }}" class="form-control" id="namaLengkap">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            
                            </div>
                            <div class="mb-3">
                                <label for="inputEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ $user->email; }}" id="inputEmail">
                                @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            </div>
                            <div class="mb-3">
                                <label for="inputTelephone" class="form-label">No Telepon</label>
                                <div class="input-group"> 
                                    <span class="input-group-text" id="inputTelephone">+62</span>
                                    <input type="tel" class="form-control" placeholder="" aria-label="telephone" name="name" value="{{ $user->phone; }}" aria-describedby="inputTelephone">
                                </div>
                                @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                            </div>
                            <h5 class="my-4">Data Properti</h5>
                            <div class="mb-3">
                                <label for="propertyTitle" class="form-label">Judul Properti</label>
                                <input type="text" name="property_title" class="form-control" placeholder="Masukkan alamat properti anda..." id="propertyTitle">
                                @error('property_title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="inputTipe" class="form-label">Tipe Properti</label>
                                <select class="form-select" name="property_type" aria-label="Default select example" id="inputTipe">
                                    <option selected value="Rumah">Rumah</option>
                                    <option value="Ruko">Ruko</option>
                                    <option value="Apartmen">Apartmen</option>
                                    <option value="Tanah">Tanah</option>
                                    <option value="Villa">Villa</option>
                                    <option value="Gedung">Gedung</option>
                                    <option value="Pabrik">Pabrik</option>
                                </select>
                                @error('property_type')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            {{-- addresses --}}
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat <sup class="text-danger">*</sup> </label>
                                        <input 
                                        type="text" 
                                        value="{{ old('address[street]') }}" name="address[street]" class="form-control" 
                                        id="alamat" 
                                        placeholder="Alamat properti anda">
                                        @error('address[street]')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div> 
                                    <div class="mb-3">
                                        <label for="city" class="form-label">Kota / Kabupaten <sup class="text-danger">*</sup> </label>
                                        <select 
                                        id="kota" 
                                        class="form-select" 
                                        value="{{ old('address[city]') }}" 
                                        name="address[city]" 
                                        aria-label="Default select example"
                                        placeholder="Kota/Kabupaten" 
                                        disabled>
                                            <option selected value="Kota">Kota</option>
                                        </select>
                                        @error('address[city]')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                        
                                    </div>
                                    <div class="mb-3">
                                        <label for="kelurahan" class="form-label">Kelurahan <sup class="text-danger">*</sup> </label>
                                        <select 
                                        class="form-select" 
                                        value="{{ old('address[village]') }}" 
                                        name="address[village]" 
                                        id="kelurahan" 
                                        aria-label="Default select example"
                                        placeholder="Keurahan" 
                                        disabled >
                                            <option selected value="Kelurahan">Kelurahan</option>
                                        </select>
                                        @error('address[village]')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="provinsi" class="form-label">Provinsi <sup class="text-danger">*</sup> </label>
                                        <select 
                                        class="form-select" 
                                        value="{{ old('address[province]', $property->address->province ?? '') }}" 
                                        name="address[province]" 
                                        id="provinsi"
                                        placeholder="Provinsi" 
                                        aria-label="Default select example" >
                                            <option selected value="Provinsi">Provinsi</option>
                                        </select>
                                        @error('address[province]')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="kecamatan" class="form-label">Kecamatan <sup class="text-danger">*</sup> </label>
                                        <select 
                                        class="form-select" 
                                        value="{{ old('address[district]') }}" 
                                        name="address[district]" 
                                        id="kecamatan" 
                                        placeholder="Kecamatan"
                                        aria-label="Default select example" 
                                        disabled>
                                            <option selected value="Kecamatan">Kecamatan</option>
                                        </select>
                                        @error('address[district]')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputPostalCode" class="form-label">Kode Pos</label>
                                        <input 
                                        type="number" 
                                        value="{{ old('address[postal_code]') }}" 
                                        name="address[postal_code]" 
                                        class="form-control" 
                                        maxlength="6" 
                                        id="inputPostalCode" 
                                        placeholder="Isikan Kode pos properti">
                                        @error('address[postal_code]')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="inputSpec" class="form-label">Spesifikasi Properti (singkat)</label>
                                <textarea class="form-control" name="description" id="inputSpec" rows="3" placeholder="Contoh: Rumah lantai 2, luas 300m2 dsb"></textarea>
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                               
                            </div>
                            <div class="mb-3">
                                <label for="inputTransaksi" class="form-label">Jenis Transaksi</label>
                                <select class="form-select" name="transaction_type" aria-label="Default select example" id="inputTransaksi" >
                                    <option selected value="Dijual">Dijual</option>
                                    <option value="Disewa">Disewa</option>
                                    <option value="Dijual/Disewa">Jual/Sewa</option>
                                </select>
                                @error('transaction_type')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="inputHarga" class="form-label">Harga</label>
                                <div class="input-group"> 
                                    <span class="input-group-text">Rp</span>
                                    <input type="text"  class="form-control" id="price_display">
                                    <input type="hidden" name="price" id="price" />
                                </div>
                                @error('price')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="inputHarga" class="form-label">Upload Foto Rumah (1 foto)</label>
                                <input type="file" name="photo" id="photo-input" hidden>
                                <div id="drop-area" class="p-4 rounded position-relative d-flex flex-column align-items-center justify-content-center" 
                                style="cursor:pointer; 
                                border: 1px solid var(--primary); 
                                border-style:dashed;
                                height: 250px;">
                                    <!-- Profile Image Preview -->
                                    <img id="preview-photo" src="{{ asset('storage/images/listing_request/image-default.png') }}" 
                                        alt="Put image here" 
                                        class="rounded-3 mb-2" 
                                        style="width: 200px; height: 150px; object-fit: cover; display: block;">
                                
                                    <!-- Drop Area Text -->
                                    <div class="text-center">
                                        <i class="fas fa-cloud-upload-alt fa-3x text-muted"></i>
                                        <p class="m-0">Drag & Drop atau klik untuk memilih</p>
                                    </div>
                                </div>
                                @error('photo')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <h6>Catatan:</h6>
                            <ul>
                                <li>Anda adalah Pemilik langsung Properti yang akan dititipkan di Stone.id dan dengan ini menjamin bahwa Anda adalah pemilik yang sah atas Properti tersebut, dan/atau memang pihak yang berwenang atas Properti tersebut. Anda menjamin dan menyatakan bahwa; tidak ada pihak lain yang ikut berhak dan/atau ikut memiliki Properti tersebut; serta Properti tersebut bebas dari sitaan, dan tidak tersangkut dalam suatu perkara apapun.
                                    </li>
                                    <li>Anda menjamin kebenaran informasi yang diberikan sehubungan dengan Properti tersebut dan setuju membebaskan Stone.id dari segala tuntutan maupun kewajiban membayar ganti rugi apapun yang diakibatkan oleh informasi yang tidak benar, tidak tepat, atau yang tidak diberikan oleh Anda.</li>
                            </ul>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="TnCCheck">
                                <label class="form-check-label fst-italic" for="TnCCheck">*Dengan mengisi & mengirimkan data, Anda sudah langsung menyetujui <a class="text-primary" href="">syarat & ketentuan</a> yang berlaku.</label>
                            </div>
                            <div class="row my-3 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary mx-5 w-auto" disabled id="listingReqSubmit">Selanjutnya</button>
                            </div>
                           
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
       
      </div>
    </div>
</div>
