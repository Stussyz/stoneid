@extends('stone.layouts.app')

@section('title', 'Edit Profil - William')

@section('content')

 <!-- edit user start -->
 <main class="container-fluid header bg-white p-0">
    <form method="post" action="{{ route('stone.profile-update') }}" enctype="multipart/form-data">
        @csrf
    <div class="row g-0">
        <h1 class="ms-5 margin-top-setting">
            <a href="{{ route('stone.user-profile') }}">
                <i class="fas fa-chevron-left me-5">
                </i>
            </a>
            Edit Profil
        </h1>

        
            <div class="col-md-6 px-5">
                <div class="row g-0 gx-5 mt-0 mt-lg-5">
                    <div class="col-md-4 d-flex align-items-center justify-content-center ">
                        <a href="" class="animated fadeIn">
                            <div class="edit-img text-center position-relative">
                                <img src="{{ asset('storage/images/users/' . $profile->photo) }}" class="rounded-circle img-thumbnail mb-md-0"  alt="" style="aspect-ratio:1/1;">

                                <a href="#" data-bs-toggle="modal" data-bs-target="#changeImgModal">
                                    <div class="position-absolute top-50 start-50 translate-middle hoverable-edit text-center align-items-center">
                                        <div class="text-white align-items-center">
                                            <p><i class="far fa-edit me-2" style="margin-top: 45%;"></i>Ubah</p>
                                        </div>
                                        
                                    </div>
                                </a>
                            </div>
                            <input type="file" name="photo" id="photo-input" hidden>

                            <!-- edit img modal -->
                            <div class="modal fade" id="changeImgModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ganti Foto</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="inputHarga" class="form-label">Upload Foto Profil Anda</label>

                                            <div id="drop-area" class="p-4 rounded position-relative d-flex flex-column align-items-center justify-content-center" 
                                            style="cursor:pointer; 
                                            border: 1px solid var(--primary); 
                                            border-style:dashed;
                                            height: 250px;">
                                                <!-- Profile Image Preview -->
                                                <img id="preview-photo" src="{{ asset('storage/images/users/' . ($profile->photo ?? 'user-default.png')) }}" 
                                                     alt="Put image here" 
                                                     class="rounded-circle mb-2" 
                                                     style="width: 100px; height: 100px; object-fit: cover; display: block;">
                                            
                                                <!-- Drop Area Text -->
                                                <div class="text-center">
                                                    <i class="fas fa-cloud-upload-alt fa-3x text-muted"></i>
                                                    <p class="m-0">Drag & Drop atau klik untuk memilih</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                    <a type="button" class="btn btn-primary" data-bs-dismiss="modal">Simpan</a>
                                    </div>
                                
                                </div>
                                </div>
                            </div>
                            <!-- modal end -->
                            
                        </a> 
                    </div>
                    <div class="col-md-8 profile-desc mt-3 mt-md-0">
                            <div class="mb-3 form-floating">
                                <input type="text" name="name" class="form-control" id="namaLengkap" value="{{ $user->name }}" maxlength="100">
                                <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                                <h5 class="text-muted mb-3">User</h5>
                            <div class="mb-3 form-floating">
                                <textarea class="form-control" name="description" id="inputDesc" maxlength="120" style="height: 8rem">{{ ($profile->description  ?? 'Halo saya user baru!') }}</textarea>
                                <label for="inputDesc" class="form-label">Deskripsi</label>
                            </div>
                    </div>     
                </div> 
            </div>
            <div class="col-md-6 px-5 pb-0">
                <div class="row">
                    <h5 class="animated fadeIn mb-4">Ubah Data Akun</h5>
                    <hr class="w-100 text-center">
                </div>
                <form>
                    <div class="mb-3">
                        <label for="inputEmail" class="form-label" >Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $user->email }}" id="inputEmail">
                        @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    </div>
                    <div class="mb-3">
                        <label for="inputTelephone" class="form-label">No Telepon</label>
                        <div class="input-group"> 
                            <span class="input-group-text" id="inputTelephone">+62</span>
                            <input type="tel" name="phone" class="form-control" placeholder="" aria-label="telephone" value="{{ ($user->phone  ?? '-') }}" aria-describedby="inputTelephone" maxlength="15">
                        </div>
                        @error('phone')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    </div>
                                        {{-- alamat lengkap --}}
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="inputEmail" class="form-label">Alamat <sup class="text-danger">*</sup> </label>
                                                    <input type="text" name="street" value="" class="form-control" id="inputEmail" placeholder="Alamat lengkap anda">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="inputCity" class="form-label">Kota / Kabupaten <sup class="text-danger">*</sup> </label>
                                                    <select disabled class="form-select" id="kota" name="city" aria-label="Default select example" id="inputCity">
                                                        <option selected value="">Kota</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="inputVillage" class="form-label">Kelurahan <sup class="text-danger">*</sup> </label>
                                                    <select disabled class="form-select" id="kelurahan" name="village" aria-label="Default select example" id="inputVillage">
                                                        <option selected value="">Kelurahan</option>
                                                    </select>
                                                </div>
                                                
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="inputProvince" class="form-label">Provinsi <sup class="text-danger">*</sup> </label>
                                                    <select  class="form-select" id="provinsi" name="province" aria-label="Default select example" id="inputProvince">
                                                        <option selected value="">Provinsi</option>
                                                    </select>
                                                </div> 
                                               
                                                <div class="mb-3">
                                                    <label for="inputDistrict" class="form-label">Kecamatan <sup class="text-danger">*</sup> </label>
                                                    <select disabled class="form-select" id="kecamatan" name="district" aria-label="Default select example" id="inputDistrict">
                                                        <option selected value="">Kecamatan</option>
                                                    </select>
                                                </div>
                                                
                            
                                                <div class="mb-3">
                                                    <label for="inputPostalCode" class="form-label">Kode Pos</label>
                                                    <input type="number" name="postal_code" class="form-control" maxlength="6" id="inputPostalCode" placeholder="Isikan Kode pos" value="127822">
                                                </div>
                                            </div>
                                        </div>
                    <div class="mb-3">
                        <label for="inputTelephone" class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" id="password" name="password"  class="form-control" maxlength="16" placeholder="buat password anda..." required>
                            <button id="toggle-password" type="button" class="d-none"
                            aria-label="Show password as plain text. Warning: this will display your password on the screen.">
                            </button>
                        </div>
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        
                    </div>
                    <div class="mb-3">
                        <label for="inputTelephone" class="form-label">Ketik Ulang Password</label>
                        <div class="input-group">
                            <input type="password" id="password" name="password_confirmation"  class="form-control" maxlength="16" placeholder="ketik ulang password anda..." required>
                            <button id="toggle-password" type="button" class="d-none"
                            aria-label="Show password as plain text. Warning: this will display your password on the screen.">
                            </button>
                        </div>
                        @error('password_confirmation')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                <button type="submit" class="btn btn-primary py-2 px-5 w-100 animated fadeIn">Simpan</button>
            </div>
    </div>
</form>
</main>

<!-- edit user end -->
@endsection


@push('stone-styles')
<style>       
    .margin-top-setting{
        margin-top:10rem;
    }
    .hoverable-edit{
        width: 100%;
        height: 100%;
        border-radius: 50%;
        align-items: center;
        opacity: 0;
        background-color: rgba(0,0,0,0.6);
        transition: .3s ease-in;
        overflow: hidden;
    }

    .hoverable-edit:hover{
        opacity: 1;
    }

    @media (max-width: 992px) { 
        .hoverable-edit{
            width: 50%;
            height: 100%;
        }
        .edit-img img{
            width: 50%;
            height: auto;
        }
        
        .margin-top-setting{
            margin-top:2rem;
        }
    }
</style>
@endpush


@push('stone-scripts')
<script>

    const dropArea = document.getElementById('drop-area');
    const photoInput = document.getElementById('photo-input');
    const fileName = document.getElementById('file-name');
    const previewPhoto = document.getElementById('preview-photo');
  
    dropArea.addEventListener('click', () => photoInput.click());
  
    dropArea.addEventListener('dragover', (e) => {
      e.preventDefault();
      dropArea.classList.add('bg-light');
    });
  
    dropArea.addEventListener('dragleave', () => {
      dropArea.classList.remove('bg-light');
    });
  
    dropArea.addEventListener('drop', (e) => {
      e.preventDefault();
      photoInput.classList.remove('d-none');
      dropArea.classList.remove('bg-light');
      const files = e.dataTransfer.files;
      if (files.length > 0) {
        photoInput.files = files;
        updatePreview(files[0]);
      }
    });
  
    photoInput.addEventListener('change', () => {
      if (photoInput.files.length > 0) {
        updatePreview(photoInput.files[0]);
      }
    });
  
    function updatePreview(file) {
      const reader = new FileReader();
      reader.onload = function (e) {
        previewPhoto.src = e.target.result;
        fileName.textContent = `Dipilih: ${file.name}`;
      };
      reader.readAsDataURL(file);
    }
  
    </script>
@endpush