

{{-- for debugging only --}}
@if ($errors->has('error'))
<div class="row">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ $errors->first('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>   
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<section class="container">
    {{-- Displaying success/error messsages --}}   
    <input type="hidden" name="listing_request_id" value="" class="form-control">
    <div class="row flex-column-reverse flex-xl-row">
        <div class="col-xl-7 py-3">
            <article class="bg-light rounded p-3">
                <div class="bg-white rounded p-4" 
                    style="border: 1px dashed rgba(0, 185, 142, .3)">
                    <h4>Detail Properti</h4>
                        <h5 class="my-4">Informasi Properti</h5>

                        {{-- title --}}
                        <div class="mb-3">
                            <label for="namaProperti"  class="form-label">Nama Properti <sup class="text-danger">*</sup></label>
                            <input type="text" value="{{ old('title', $property->name ?? '') }}" name="title" class="form-control" id="namaProperti" maxlength="120" placeholder="Jelaskan nama properti secara singkat, Maksimal 120 huruf">
                            @error('title')
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
                                    value="{{ old('address[street]', $property->address->street ?? '') }}" name="address[street]" class="form-control" 
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
                                    value="{{ old('address[city]', $property->address->city ?? '') }}" 
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
                                    value="{{ old('address[village]', 
                                    $property->address->village ?? '') }}" 
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
                                    value="{{ old('address[district]', $property->address->district ?? '') }}" 
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
                                    value="{{ old('address[postal_code]', $property->address->postal_code ?? '') }}" 
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
                        {{-- price --}}
                        <h5 class="my-4">Harga Properti</h5>
                        <div class="mb-3 form-check">
                            <input class="form-check-input" type="radio" name="priceRadio" value="Disewa" id="CB_rent"
                            {{ old('priceRadio', ($property->transaction_type ?? null) === 'Disewa') ? 'checked' : '' }}>
                            <label class="form-check-label" for="CB_rent">
                            <strong>Properti Disewa</strong>
                            </label>
                        </div>
                        <div class="row selling-pricing">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="inputHarga" class="form-label">Harga <sup class="text-danger">*</sup></label>
                                    <div class="input-group"> 
                                        <span class="input-group-text" id="inputCurr">Rp</span>
                                        <input type="text" placeholder="Harga sewa properti" class="form-control" maxlength="12" id="rent_price"
                                        value="{{ old('rent_price',number_format($property->price ?? 0, 0, ',', '.') ?? '') }}" disabled required>
                                        <input type="hidden" name="rent_price" value="{{ old('rent_price') }}" id="rent_raw">
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="selectRent" class="form-label">Minimal Sewa <sup class="text-danger">*</sup> </label>
                                    <select class="form-select" value="{{ old('min_rent_period', $property->min_rent_period ?? '') }}" name="min_rent_period" aria-label="Default select example" id="rent_period" disabled required>
                                        <option selected value="">Pilih jangka waktu</option>
                                        <option value="Perbulan">Perbulan</option>
                                        <option value="Per 6 bulan">Per 6 bulan</option>
                                        <option value="Pertahun">Pertahun</option>
                                        <option value="Per 5 tahun">Per 5 tahun</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 form-check">
                                <input class="form-check-input" type="radio" name="priceRadio" value="Dijual" id="CB_sale" 
                                {{ old('priceRadio', ($property->transaction_type ?? null) === 'Dijual') ? 'checked' : '' }}>
                                <label class="form-check-label" for="CB_sale">
                                <strong>Properti Dijual</strong>
                                </label>
                        </div>
                        <div class="mb-3">
                            <label for="inputHarga" class="form-label">Harga <sup class="text-danger">*</sup></label>
                                <div class="input-group"> 
                                    <span class="input-group-text" id="inputHarga">Rp</span>
                                    <input type="text" placeholder="Harga jual properti" id="price-formatted" class="form-control" maxlength="17" value="{{ old('sale_price',number_format($property->price ?? 0, 0, ',', '.') ?? '') }}" >

                                    <input type="hidden" name="sale_price" value="{{ old('sale_price', $property->price ?? '') }}" id="price-raw">
                                </div>
                                @error('price')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                               
                        </div>
                        <h5 class="my-4">Spesifikasi Properti</h5>
                        <div class="row property-type">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="inputTipe" class="form-label">Tipe Properti</label>
                                    <select class="form-select" name="property_type" value="{{ old('property_type', $property->property_type ?? '') }}" aria-label="Default select example" id="inputTipe">
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
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="inputTransaksi" class="form-label">Jenis Transaksi</label>
                                    <select class="form-select" value="{{ old('transaction_type', $property->transaction_type ?? '') }}" name="transaction_type" aria-label="Default select example" id="inputTransaksi" >
                                        <option selected value="Dijual">Dijual</option>
                                        <option value="Disewa">Disewa</option>
                                        <option value="Diual/Disewa">Jual/Sewa</option>
                                    </select>
                                    @error('transaction_type')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="inputSpec" class="form-label">Deskripsi Properti</label>
                            <div id="editorContainer" style="height: 20em;">
                               {!! old('description', $property->description ?? '') !!} 
                            </div>
                            <!-- Hidden input for request -->
                            <input type="hidden" name="description" id="description-input">
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="inputTipe" class="form-label">Kamar Mandi</label>
                                    <input type="number" value="{{ old('bathrooms', $property->details->bathrooms ?? '') }}" name="bathrooms" step="1" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="inputTipe" class="form-label">Luas Tanah (m<sup>2</sup>)</label>
                                    <input type="number" value="{{ old('land_area', $property->details->land_area ?? '') }}" name="land_area" step="1" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="inputTipe" class="form-label">Carport</label>
                                    <input type="number" value="{{ old('carport', $property->details->carport ?? '') }}" name="carport"  step="1" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="inputTipe" class="form-label">Jumlah Lantai</label>
                                    <input type="number" value="{{ old('floors', $property->details->floors ?? '') }}" name="floors" step="1" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="inputTipe" class="form-label">Listrik (Watt)</label>
                                    <input type="number" value="{{ old('electricity', $property->details->electricity ?? '') }}" name="electricity" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="inputTipe" class="form-label">Konsep dan Gaya</label>
                                    <input type="text" value="{{ old('concept_and_style', $property->details->concept_and_style ?? '') }}" name="concept_and_style" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="inputTipe" class="form-label">Kamar Tidur</label>
                                    <input type="number" value="{{ old('bedrooms', $property->details->bedrooms ?? '') }}" name="bedrooms" step="1" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="inputTipe" class="form-label">Luas Bangunan (m<sup>2</sup>)</label>
                                    <input type="number" value="{{ old('building_area', $property->details->building_area ?? '') }}" name="building_area" step="1" class="form-control">
                                    
                                </div>
                                <div class="mb-3">
                                    <label for="inputTransaksi" class="form-label">Sertifikat</label>
                                    <select class="form-select" value="{{ old('certificate', $property->details->certificate ?? '') }}" name="certificate" aria-label="Default select example" id="inputTransaksi" >
                                        <option selected value="SHM">SHM</option>
                                        <option value="SHGB">SHGB</option>
                                        <option value="SHGU">SHGU</option>
                                        <option value="SHP">SHP</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="inputTransaksi" class="form-label">Furnished</label>
                                    <select class="form-select" value="{{ old('furnished', $property->details->furnishing ?? '') }}" name="furnished" aria-label="Default select example" id="inputTransaksi" >
                                        <option selected value="Non-Furnished">Non-Furnished</option>
                                        <option value="Semi-Furnished">Semi-Furnished</option>
                                        <option value="Full-Furnished">Full-Furnished</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="inputTipe" class="form-label">Dapur</label>
                                    <input type="number" value="{{ old('kitchen', $property->details->kitchen ?? '') }}" name="kitchen" step="1" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="inputTipe" class="form-label">Kondisi Properti</label>
                                    <select class="form-select" value="{{ old('condition', $property->details->condition ?? '') }}" name="condition" aria-label="Default select example" id="inputTransaksi" >
                                        <option selected value="Baru">Baru</option>
                                        <option value="Bagus">Bagus</option>
                                        <option value="Tua">Tua</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <h5 class="my-4">Fasilitas Properti</h5>
                        <h6>Fasilitas Rumah</h6>
                        <div class="row my-3 gx-0">
                                @foreach (['Taman','AC', 'Telfon','Kolam Renang', 'Kolam Ikan','Teras', 'CCTV', 'Balkon', 'Smart Home', 'Basement'] as $item)
                                    <div class="form-check col-6  pb-2">
                                        <input  
                                        class="form-check-input" 
                                        type="checkbox" 
                                        name="in_house[]" 
                                        id="checkbox-{{ Str::slug($item) }}" 
                                        value="{{ $item }}"
                                        {{ in_array($item, old('in_house[]', $in_house ?? [])) ? 'checked' : '' }}>

                                        <label class="form-check-label" for="checkbox-{{ Str::slug($item) }}">
                                        {{ $item }}
                                        </label>
                                    </div>
                                @endforeach
                                {{-- {{ old('property_type', $property->property_type ?? '') == 'Dijual' ? 'checked' : '' }} --}}
                        </div>
                        <h6>Fasilitas Perumahan</h6>
                        <div class="row my-3 gx-0">
                            @foreach (['Akses Parkir','Trek Jogging', 'Tempat Ibadah','Keamanan 24 jam', 'One Gate System','Tempat Gym', 'Foodcourt'] as $item)
                            
                                <div class="form-check pb-2 col-6">
                                    <input class="form-check-input" 
                                    name="complex[]" 
                                    type="checkbox" 
                                    value="{{ $item }}" 
                                    id="checkbox-{{ Str::slug($item) }}" 
                                    {{ in_array($item, old('complex[]', $complex ?? [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="checkbox-{{ Str::slug($item) }}">
                                        {{ $item }}
                                    </label>
                                </div>
                            @endforeach
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
                        <div class="text-end">
                            <button type="submit" id="listingSubmit" disabled class="btn btn-primary">Kirim</button>
                        </div>
          
                </div>
            </article>
        </div>
        <div class="col-xl-5 py-3">
            <article class="bg-light rounded p-3 sticky-top">
                <div class="bg-white rounded p-4" 
                    style="border: 1px dashed rgba(0, 185, 142, .3)">
                    <h4>Gambar Properti</h4>
                    <!-- DRAG AND DROP PROPERTY IMAGE -->
                    <div class="mb-3 mt-3"> 
                        <h5>Foto Properti</h5>
                        <small class="text-danger"><sup>*</sup>Wajib (Maksimal 10 Foto)</small>
                     {{-- drag and drop zone --}}
                        <div id="drop-zone" class="mt-3">
                            <div class="image-grid">
                             
                                {{-- Existing images from DB --}}
                             <input type="hidden" name="removed_images" id="removedImages">
                            @foreach (($property->propertyImages ?? []) as $image)
                                 <div 
                                    class="image-thumb" 
                                    id="image-thumb-{{ $image->id }}" 
                                    data-image-name="{{ $image->image_path }}">
                                    <img src="{{ asset('storage/' . $image->image_path) }}" class="thumb-preview">
                                    <button type="button" class="remove-existing-image-btn bg-dark w-100" data-image-id="{{ $image->id }}">Remove</button>
                                </div>
                            @endforeach
                            </div>
                            <span>Drag & drop gambar properti disini</span><br> 
                            <em>atau</em><br>
                            <span class="btn btn-primary mb-2">Choose file(s)</span>
                            <input type="file" id="image-input" name="images[]" accept="image/*" multiple hidden>
                            <div id="preview-container">
                            </div>
                        </div>
                        @error('images[]')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- DRAG AND DROP ONLINE TOUR -->
                    <div class="my-3">
                        <h5>Video Uploader</h5>
                        <small class="text-danger"><sup>*</sup>(Maksimal 1 Video, Ukuran 50MB)</small>
                        <!-- VIDEO DROPZONE -->
                        <div id="video-drop-zone" class="custom-dropzone mt-4">
                            <span class="text-danger">(Opsional)</span><br>
                            <span>Drag & drop video properti disini</span><br> 
                            <em>atau</em><br>
                            <span class="btn btn-primary mb-2">Choose file(s)</span>
                            <input type="file" id="video-input" name="video" accept="video/*" hidden>
                            <div id="video-preview-container">
                                @if(!empty($property->videos->video_path ?? ''))
                                    <div class="video-preview">
                                        <video src="{{ asset('storage/' . $property->videos->video_path ) }}" 
                                            controls="true" style="
                                                width: 100%;
                                                max-height:300px;
                                                object-fit:cover;
                                                border-radius:8px" 
                                            >
                                        <button class="remove-video-btn" 
                                        >Remove</button>
                                    </div>
                                @endif
                            </div>
                        </div>

                        @error('video')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <!-- END DRAG AND DROP ONLINE TOUR -->


                     <!-- DRAG AND DROP VIRTUAL TOUR 360 -->             
                    <div class="mb-3">
                        <h5>360<sup>o</sup> Tur Online</h5>Upload Foto 360
                        <small class="text-danger"><sup>*</sup>Sesuai yang dibutuhkan</small>

                        <div class="row mt-3">
                            <div class="wrapper coming-soon-virtual-tour">
                                <h3 class="text-center">COMING SOON</h3>
                            </div>
                            
                        </div>
        
                    </div>
                      <!-- END DRAG AND DROP VIRTUAL TOUR 360 -->  
                </div>
            </article>
        </div>
    </div>
</section>


 {{-- additional script or style for certain page --}}
 @push('styles')
<style>
    /* drag and drop image */
    #drop-zone , #video-drop-zone, .coming-soon-virtual-tour{
        border: 2px dashed #a0c5ff;
        border-radius: 10px;
        padding: 20px;
        text-align: center;
        cursor: pointer;
        background-color: #f5f9ff;
        position: relative;
    }

    #drop-zone p {
        margin-bottom: 20px;
        color: #777;
    }

    #preview-container {
        display: grid;
        gap: 15px;
    }

    @media (min-width: 1024px) {
        #preview-container {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (min-width: 768px) and (max-width: 1023px) {
        #preview-container {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 767px) {
        #preview-container {
            grid-template-columns: 1fr;
        }
    }

    .preview-image {
        position: relative;
        overflow: hidden;
        border: 1px solid #ccc;
        border-radius: 5px;
        background: #fff;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: auto; /* Fixed height */
    }

    .preview-image img {
        object-fit: cover;
    }

    .remove-btn {
        width: 100%;
        background: var(--dark);
        color: white;
        border: none;
        padding: 6px;
        font-size: 14px;
        cursor: pointer;

    }

    /* video dropzone */
    #video-preview-container {
        margin-top: 10px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .video-preview {
        background: #fefefe;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        width: 100%;
        max-width: 500px;
        text-align: center;
    }

    .video-preview span {
        display: block;
        margin-bottom: 10px;
        font-size: 14px;
        color: #555;
    }

    .remove-video-btn {
        width: 100%;
        background: #dc3545;
        color: #fff;
        border: none;
        padding: 6px 12px;
        font-size: 14px;
        border-radius: 5px;
        cursor: pointer;
    }


    /* existing image  */
    .image-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr); /* 2 columns */
        gap: 10px;
        margin-top: 10px;
    }
    .thumb-preview {
        width: 100%;
        height: 100px;
        object-fit: cover;
        border-radius: 4px;
        margin-bottom: 6px;
    }
     .image-thumb {
        display: flex;
        flex-direction: column;
        align-items: center;
        border: 1px dashed #ccc;
        padding: 5px;
        background-color: #f9f9f9;
    } 
    .remove-existing-image-btn {
        color: white;
        border: none;
        padding: 4px 10px;
        font-size: 12px;
        cursor: pointer;
        border-radius: 3px;
    }
        
</style>
@endpush

@push('scripts')
 <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

{{-- multiple image dropzone config --}}
 <script>
    const dropZone = document.getElementById('drop-zone');
    const imageInput = document.getElementById('image-input');
    const previewContainer = document.getElementById('preview-container');
    let filesArray = [];

        // Prevent remove click from triggering the input
    dropZone.addEventListener('click', (e) => {
        if (!e.target.classList.contains('remove-btn')) {
            imageInput.click();
        }
    });
    
    // Drag & drop handlers
    dropZone.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropZone.style.background = '#e3f2fd';
    });
    
    dropZone.addEventListener('dragleave', () => {
        dropZone.style.background = '#f5f9ff';
    });
    
    dropZone.addEventListener('drop', (e) => {
        e.preventDefault();
        dropZone.style.background = '#f5f9ff';
        handleFiles(e.dataTransfer.files);
    });
    
    imageInput.addEventListener('change', () => {
        handleFiles(imageInput.files);
    });

    
        
    function handleFiles(files) {
        for (let file of files) {
            if (filesArray.length >= 10) {
                alert("You can only upload a maximum of 10 images.");
                return;
            }
    
            if (file.size > 5 * 1024 * 1024) {
                alert(`${file.name} exceeds 5MB.`);
                continue;
            }
    
            if (!file.type.startsWith('image/')) {
                alert(`${file.name} is not an image.`);
                continue;
            }
    
            filesArray.push(file);
            previewFile(file);
        }
    
        updateInput();
    }
    
    function previewFile(file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            const wrapper = document.createElement('div');
            wrapper.classList.add('preview-image');
    
            const img = document.createElement('img');
            img.src = e.target.result;
    
            const removeBtn = document.createElement('button');
            removeBtn.classList.add('remove-btn');
            removeBtn.innerText = 'Remove';
            removeBtn.addEventListener('click', () => {
                wrapper.remove();
                filesArray = filesArray.filter(f => f !== file);
                updateInput();
            });
    
            wrapper.appendChild(img);
            wrapper.appendChild(removeBtn);
            previewContainer.appendChild(wrapper);
        };
        reader.readAsDataURL(file);
    }
    
    // Create virtual file list for input
    function updateInput() {
        const dataTransfer = new DataTransfer();
        filesArray.forEach(file => dataTransfer.items.add(file));
        imageInput.files = dataTransfer.files;
    }
</script>

{{-- image existing in EDIT PROPERTY drag and drop handler--}}
<script>
    document.addEventListener("DOMContentLoaded", function () {
    const removedImages = [];
    const removedInput = document.getElementById("removedImages");

    document.querySelectorAll(".remove-existing-image-btn").forEach((btn) => {
        btn.addEventListener("click", function (e) {
            e.stopPropagation();
           
            const wrapper = btn.closest(".image-thumb");
            const imageName = wrapper.getAttribute("data-image-name");

            // Add to removed list
            removedImages.push(imageName);
            removedInput.value = JSON.stringify(removedImages);
            // Remove from UI
            wrapper.remove();
            });
        });
    });
</script>
    

{{-- video dropzone config --}}
<script>
    const videoDropZone = document.getElementById('video-drop-zone');
    const videoInput = document.getElementById('video-input');
    const videoPreviewContainer = document.getElementById('video-preview-container');
    let videoFile = null;

    // Prevent remove from triggering click
    videoDropZone.addEventListener('click', (e) => {
        if (!e.target.classList.contains('remove-video-btn')) {
            videoInput.click();
        }
    });

    videoDropZone.addEventListener('dragover', (e) => {
        e.preventDefault();
        videoDropZone.style.background = '#e3f2fd';
    });

    videoDropZone.addEventListener('dragleave', () => {
        videoDropZone.style.background = '#f5f9ff';
    });

    videoDropZone.addEventListener('drop', (e) => {
        e.preventDefault();
        videoDropZone.style.background = '#f5f9ff';
        handleVideoFile(e.dataTransfer.files[0]);
    });

    videoInput.addEventListener('change', () => {
        handleVideoFile(videoInput.files[0]);
    });

    function handleVideoFile(file) {
        if (!file.type.startsWith('video/')) {
            alert("Please upload a valid video file.");
            return;
        }

        if (file.size > 50 * 1024 * 1024) {
            alert("Video exceeds 50MB limit.");
            return;
        }

        videoFile = file;
        updateVideoPreview();
        updateVideoInput();
    }

    function updateVideoPreview() {
        videoPreviewContainer.innerHTML = '';

        const preview = document.createElement('div');
        preview.className = 'video-preview';

        // VIDEO ELEMENT
        const videoElement = document.createElement('video');
        videoElement.controls = true;
        videoElement.src = URL.createObjectURL(videoFile);
        videoElement.style.width = '100%';
        videoElement.style.maxHeight = '300px';
        videoElement.style.borderRadius = '8px';
        videoElement.style.objectFit = 'cover';

        // REMOVE BUTTON
        const removeBtn = document.createElement('button');
        removeBtn.className = 'remove-video-btn';
        removeBtn.innerText = 'Remove';
        removeBtn.onclick = () => {
            videoFile = null;
            videoPreviewContainer.innerHTML = '';
            updateVideoInput();
        };

        preview.appendChild(videoElement);
        preview.appendChild(removeBtn);
        videoPreviewContainer.appendChild(preview);
    }

    function updateVideoInput() {
        const dataTransfer = new DataTransfer();
        if (videoFile) {
            dataTransfer.items.add(videoFile);
        }
        videoInput.files = dataTransfer.files;
    }

</script>

{{-- Price to currency --}}
<script>
    function formatRupiah(angka) {
        return angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }
    
    function cleanRupiah(rp) {
        return rp.replace(/\./g, '');
    }

    const rentInput = document.getElementById('rent_price'); 
    const rentRaw = document.getElementById('rent_raw'); 
    const priceInput = document.getElementById('price-formatted');
    const priceRaw = document.getElementById('price-raw');
    
    priceInput.addEventListener('input', function () {
        let raw = this.value.replace(/\D/g, ''); // Remove non-digits
        let formatted = formatRupiah(raw);
    
        this.value = formatted;
        priceRaw.value = raw;
    });

    rentInput.addEventListener('input', function () {
        let raw = this.value.replace(/\D/g, ''); // Remove non-digits
        let formatted = formatRupiah(raw);
    
        this.value = formatted;
        rentRaw.value = raw;
    });

    const rentRadio = document.getElementById('CB_rent');
    const saleRadio = document.getElementById('CB_sale');
    const rentPeriod = document.getElementById('rent_period');
    const saleInput = document.getElementById('price-formatted');

    function toggleInputs() {
        if (rentRadio.checked) {
            rentInput.disabled = false;
            rentPeriod.disabled = false;
            saleInput.disabled = true;
            saleInput.value = ''; // Optional: clear value
        } else if (saleRadio.checked) {
            saleInput.disabled = false;
            rentPeriod.disabled = true;
            rentInput.disabled = true;
            rentInput.value = ''; // Optional: clear value
        }
    }

    // Initial check
    toggleInputs();

    rentRadio.addEventListener('change', toggleInputs);
    saleRadio.addEventListener('change', toggleInputs);
</script>

{{-- TnC and button checked --}}
<script>
    const tnc = document.getElementById('TnCCheck'); 
    const sbmt = document.getElementById('listingSubmit'); 

    tnc.addEventListener('change', function () {
        sbmt.disabled = !this.checked;
    });
</script>

{{-- Quill editor --}}
<script>
   $(function () {
       let quill = new Quill('#editorContainer', {
           debug: 'info',
           modules: {
               toolbar: true,
           },
           placeholder: 'Tuliskan deskripsi properti anda secara detail...',
           theme: 'snow'
       });

       $('form').on('submit', function (e) {
           const quillContent = quill.root.innerHTML.trim();
           if (quillContent === '<p><br></p>' || quillContent === '') {
               e.preventDefault();
               alert('Deskripsi tidak boleh kosong!');
               return;
           }
           $('#description-input').val(quillContent);
       });
   });
</script>

@endpush