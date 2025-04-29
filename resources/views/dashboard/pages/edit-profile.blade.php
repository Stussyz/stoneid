@extends('dashboard.layouts.app')

@section('title', 'Ubah Profil Agen | Stone.id')

@section('dashboard_content')


 <!-- halaman ubah profil saya -->
 <main class="container main-content pt-3">
    <div class="row py-3">
        <h3>Ubah Profil</h3>
        <p>Edit form berikut ini</p>
    </div>
    {{-- debugging: hapus nanti --}}
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    <div class="box-wrapper mb-5 px-5">
        
        <form action="{{ route('dashboard-agent.update-profile') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row d-flex justify-content-center">
                <div class="image-edit-agent-wrapper">
                    <img src="{{ asset('storage/images/agents/' . $profile->photo) }}" id="profileImage" class="w-100 h-100 rounded-circle" alt="">
                    <a href="#" data-bs-toggle="modal" class="hoverable-edit text-center align-items-center rounded-circle" data-bs-target="#changeImgModal">
                       
                        <div class="text-white d-flex h-100 align-items-center justify-content-center ">
                            <p><i class="far fa-edit me-2"></i>Ubah</p>
                        </div>
                    
                    </a>
                </div>

                <div class="col-12 lh-2 mt-3 text-center">
                    <h5 class="mb-2">Independent Agent</h5>
                    <span class="text-dark">Current Level : <span class="text-primary">{{$profile->level}}</span></span><br>
                    <small class="text-muted mt-2">NIB : {{$profile->NIB}}</> </small>
                </div>
                
        </div>


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
                            <div class="row d-flex justify-content-center text-center"><h5>Upload Foto Profil Anda</h5><p>Untuk hasil maksimal, gunakan foto berukuran 1 : 1 atau 4 : 5</p></div>
                            <div id="drop-area" class="p-3 m-3 rounded" style="cursor: pointer;">
                                <i class="fas fa-image fa-4x mt-5"></i>
                                <p class="fs-4">Drag & drop foto di sini atau klik</p>
                                <input type="file" id="modalFileInput" accept="image/*" hidden>
                                <img id="modalPreviewImage" src="{{ asset('storage/images/agents/' . $profile->photo) }}" class="rounded-circle mt-2">
                            </div>
                           
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button id="applyImageBtn" data-bs-dismiss="modal" type="button" class="btn btn-primary">Simpan</button>
                    </div>
            
                </div>
            </div>
        </div>
        <input type="file" name="profile_photo" id="profile_photo_input" hidden>
          <!-- modal end -->

        <h5 class="mb-3">Data Diri Anda</h5>
        <div class="row gx-3">
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="name" value="{{ $user->name }}" required >
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">No Telfon</label>
                <input type="tel"  name="phone" class="form-control" id="phone" aria-describedby="phone" value="{{ $user->phone }}" required >
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Email</label>
                <input type="email"  name="email" class="form-control" id="email" aria-describedby="email" value="{{ $user->email }}" required >
            </div>
            <h5 class="mt-5 mb-3">Data Alamat Anda</h5>
             {{-- addresses --}}
             <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat <sup class="text-danger">*</sup> </label>
                        <input 
                        type="text" 
                        value="{{ old('address[street]', $profile->address->street ?? '') }}" name="address[street]" class="form-control" 
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
                        value="{{ old('address[city]', $profile->address->city ?? '') }}" 
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
                        value="{{ old('address[province]', $profile->address->province ?? '') }}" 
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
                        value="{{ old('address[district]', $profile->address->district ?? '') }}" 
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
                        value="{{ old('address[postal_code]', $profile->address->postal_code ?? '') }}" 
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
        </div>
        
        <div class="mb-3">
            <label for="agenBio" class="form-label">Bio Anda</label>
            <div id="agenBio" style="height: 20em;">
                {!! old('bio', $profile->bio ?? '') !!} 
            </div>
            <!-- Hidden input for request -->
            <input type="hidden" name="bio" id="bio-input">
            @error('bio')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password" aria-describedby="emailHelp" required >
            <small class="text-danger my-2">{{ $errors->first('password') }}</small>
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Ketik Ulang Password</label>
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" aria-describedby="emailHelp" required >
        </div>
        <div class="mb-3 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary py-2 px-5 animated fadeIn">Simpan</button>
        </div>
    </form>
    </div>
</main>
 <!-- akhir halaman ubah profil -->

 @endsection


 @push('styles')
  <style>
    #modalPreviewImage{
        aspect-ratio:1;
        max-width: 150px;
    }
    .image-edit-agent-wrapper{
        width: 8rem;
        height:8rem;
    }

    #drop-area{
        border: 2px dashed #ccc;
        border-radius: 8px;
        padding: 20px;
        text-align: center;
        cursor: pointer;
        background-color: #e4e4e4;
        transition: all 1s ease;
    }

    #drop-area:hover{
        border-color: #00b98e;
        background-color: #f5f5f5;
    }
    
    #drop-area.dragover {
    color: var(--dark); 
    border-color: #00b98e;
    background-color: #e0fff0;
    animation: pulseBorder 1s infinite;
    }

    @keyframes pulseBorder {
        0% {
            box-shadow: 0 0 0 0 rgba(0, 185, 142, 0.4);
        }
        70% {
            box-shadow: 0 0 0 15px rgba(0, 185, 142, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(0, 185, 142, 0);
        }
    }

 </style>    
 @endpush

 @push('scripts')
 <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
 {{-- Quill editor --}}
<script>
    $(document).ready(function(){
        let quill = new Quill('#agenBio', {
                    debug: 'info',
                    modules: {
                        toolbar: true,
                    },
                    placeholder: 'Tuliskan bio anda secara detail...',
                    theme: 'snow'
                });
        
                $('form').on('submit', function (e) {
                    const quillContent = quill.root.innerHTML.trim();
                    if (quillContent === '<p><br></p>' || quillContent === '') {
                        e.preventDefault();
                        alert('Deskripsi tidak boleh kosong!');
                        return;
                    }
                    $('#bio-input').val(quillContent);
                });
    })
            
       
</script>


{{-- image uploader --}}
<script>
    const modalFileInput = document.getElementById('modalFileInput');
    const dropArea = document.getElementById('drop-area');
    const modalPreviewImage = document.getElementById('modalPreviewImage');
    const profileImage = document.getElementById('profileImage');
    const mainFileInput = document.getElementById('profile_photo_input');
    const applyBtn = document.getElementById('applyImageBtn');

    // Open file input on drop area click
    dropArea.addEventListener('click', () => modalFileInput.click());

    dropArea.addEventListener('dragover', e => {
        e.preventDefault();
        dropArea.classList.add('dragover');
    });

    dropArea.addEventListener('dragleave', () => dropArea.classList.remove('dragover'));

    dropArea.addEventListener('drop', e => {
        e.preventDefault();
        dropArea.classList.remove('dragover');
        const dt = e.dataTransfer;
        modalFileInput.files = dt.files;
        handlePreview();
    });

    modalFileInput.addEventListener('change', handlePreview);

    function handlePreview() {
        const file = modalFileInput.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = e => {
                modalPreviewImage.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }

    // Apply selected image to profile preview + copy file to main input
    applyBtn.addEventListener('click', () => {
        const file = modalFileInput.files[0];
        if (!file) return;

        // Update the main profile preview image
        const reader = new FileReader();
        reader.onload = e => {
            profileImage.src = e.target.result;
        };
        reader.readAsDataURL(file);

        // Copy the file from modal input to main form input
        // Note: direct assignment to input.files is readonly, so we use DataTransfer
        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(file);
        mainFileInput.files = dataTransfer.files;
    });

</script>
     
 @endpush
