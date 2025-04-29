<!-- isi tab Simulasi KPR -->
<div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <section class="row mt-3 g-0">

        <!-- INPUT SIMULASI KEMAMPUAN KPR -->
        <aside class="col-lg-5">
            <div class="wrapper border shadow-sm rounded-3 p-4">
                <h5>Simulasi KPR</h5>
                <small class="text-muted">Cek estimasi pembiayaan kredit rumah dengan kalkulator KPR</small>
                <form class="my-3" action="">
                    <div class="mb-3">
                        <label for="inputHarga" class="form-label">Harga Properti</label>
                        <div class="input-group"> 
                            <span class="input-group-text" id="inputTelephone">Rp</span>
                            <input type="text" placeholder="Masukkan harga properti" id="propertyPrice"  class="form-control">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="inputHarga" class="form-label">Uang Muka</label>
                        <div class="input-group mb-3"> 
                            <input type="number" value="20" class="form-control"  style="max-width: 20%;" id="percentageInput">
                            <span class="input-group-text" id="inputTelephone">%</span>
                            <span class="input-group-text" id="inputTelephone">Rp</span>
                            <input type="text" id="downPayment" class="form-control" value='0' readonly>
                            
                        </div>
                        <input class="w-100" type="range"  min="20" max="50" value="20" id="percentageRange" />
                            <div class="row">
                                <div class="col-6">
                                    <small class="text-muted">20%</small>
                                </div>
                                <div class="col-6">
                                    <small class="text-muted text-end float-end">50%</small>
                                </div>
                            
                            </div>
                    </div>
                    <div class="mb-3">
                        <label for="inputHarga" class="form-label">Pilihan Suku Bunga</label>
                        <div class="col-12">
                            <ul class="nav nav-pills d-inline-flex justify-content-end">
                                <li class="nav-item me-2">
                                    <a class="btn btn-outline-primary active" data-bs-toggle="pill" href="#tabRekomendasi">Rekomendasi</a>
                                </li>
                                <li class="nav-item me-2">
                                    <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#tabBungaBank">Bunga Bank</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div id="tabRekomendasi" class="tab-pane fade show p-0 active mb-3">
                            <div class="bg-light border-light rounded-3 p-3 text-dark">
                                William Bank | Suku Bunga 8.43% | Masa Fix 2 Tahun
                            </div>
                        </div>
                        <div id="tabBungaBank" class="tab-pane fade show p-0 mb-3">
                            <div class="bg-light border-light rounded-3 p-3 text-dark">
                                <label for="inputTransaksi" class="form-label">Pilih Program KPR dari Bank</label>
                                <select class="form-select" aria-label="Default select example" id="inputTransaksi" >
                                    <option selected value="1">CIMB Niaga</option>
                                    <option value="2">Bank BRI</option>
                                    <option value="2">Bank BCA</option>
                                    <option value="3">Maybank</option>
                                    <option value="3">Bank Mandiri</option>
                                </select>
                                
                            </div>
                        </div>
                    </div>
                
                    <div class="mb-3">
                        <label for="inputHarga" class="form-label">Jangka Waktu KPR </label>
                        <div class="input-group mb-3"> 
                            <input type="number" id="loanTerm" class="form-control float-right" value="20" style="max-width: 20%;">
                            <span class="input-group-text" id="inputTelephone">Tahun</span>
                        </div>
                        <input class="w-100" id="termRange" data-id='ex1RangePicker' type="range" min="5" max="30" step="1" value="20"/>
                        <div class="row">
                            <div class="col-6">
                                <small class="text-muted">5 tahun</small>
                            </div>
                            <div class="col-6">
                                <small class="text-muted text-end float-end">30 tahun</small>
                        </div>
                        
                        </div>
                    </div>
                    <button type="button" id="resultBtn" class="btn btn-primary w-100 px-2" href=""
                    data-bs-target="">Simulasikan</button>
                </form>
                <small><sup>*</sup>Simulasi berdasarkan bunga KPR terendah di Stone.id</small>

            </div>
            
        </aside>

        <!-- HASIL SIMULASI -->
        <article class="col-lg-7 px-3 my-lg-0 my-5">
            <h5 class="ps-3">Hasil Simulasi</h5>
            <hr>
            <div class="row mb-3">
                <div class="col-12">
                    <div class="border-primary px-0 bg-light py-3 rounded-3 text-center">
                        <h6>Angsuran/bulan Fix <i class="far fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="Jumlah uang muka yang harus disiapkan biasanya 20% dari harga properti"></i></h6>
                        <hr class="mx-4 bg-dark">
                        <div class="row g-0 px-3">
                            <div class="col-6 g-0 text-start">
                                <smal class="small text-muted">Tahun ke-1 </smal> <br>
                                <p class="text-dark" id="showRate">Bunga 0 %</p>
                            </div>
                            <div class="col-6 text-end align-content-center"><h6 id="mortgageResult">Rp
                                0</h6></div>
                        </div>
                        <button type="button" class="btn btn-primary" href=""
                        data-bs-toggle="modal" data-bs-target="#daftarIklanUserModal"><i class="fab fa-whatsapp float-start py-1 pe-2" aria-hidden="true"></i>Pengajuan KPR</button>                      
                    </div>
                </div>   
            </div>
            
            <div class="row gx-0 pt-3 border-primary px-4 bg-dark mb-3 rounded-3 text-white">
                <div class="col-6"><p>Detail Pembayaran</p></div>
                <div class="col-6 text-end"><h6 class="text-white">Rp 10.555.927</h6></div>
            </div>
            <div class="px-2 pb-3">
                <small><span class="fw-bold">Disclaimer</span> : Hasil di atas merupakan angka estimasi, data perhitungan dapat berbeda dengan perhitungan bank. Hubungi kami untuk info lebih lanjut.</small>
            </div>
            <div class="row mt-5">
                <h5 class="mb-4">Pilihan Program KPR Sesuai Simulasi</h5>
            
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <article class="bg-white border rounded p-3">
                            <div class="row align-items-center">
                                <div class="col-md-4 overflow-hidden">
                                    <img class="rounded-circle img-thumbnail" src="{{ asset('images/logo/logo-bank-cimb-niaga.jpg') }}" alt="" style="height: 5rem;"> 
                                </div>
                                <div class="col-md-8">
                                    <p class="fs-5 p-0 m-0 fw-bold text-primary">Bank CIMB Niaga</p>
                                </div>
                            </div>
                            <hr class="w-100">
                            <div class="row bg-light rounded-3 mb-3 mx-1">
                                <div class="col-md-6 text-left py-3 lh-sm">
                                    <small class="text-muted">Tahun ke-1 </small><br>
                                    <p class="text-dark">Bunga 4.65 %</p>
                                    
                                </div>
                                <div class="col-md-6 text-right py-3 lh-sm">
                                    <small class="">Angsuran/Bulan</small>
                                    <p class="text-dark fw-bold">Rp 2.752.533</p>
                                </div>
                            </div>
                        
                            <div class="row mb-3 mx-1 justify-content-center">
                                <button type="button" class="btn btn-primary" href=""
                                data-bs-toggle="modal" data-bs-target="#daftarIklanUserModal"><i class="fab fa-whatsapp float-start py-1 pe-2" aria-hidden="true"></i>Tanya KPR</button> 
                            </div>
                    </article>
                </div>
                <div class="col-md-6 mb-3">
                    <article class="bg-white border rounded p-3">
                            <div class="row align-items-center">
                                <div class="col-md-4 overflow-hidden">
                                    <img class="rounded-circle img-thumbnail" src="{{ asset('images/logo/logo-bank-bni.jpg') }}" alt="" style="height: 5rem;"> 
                                </div>
                                <div class="col-md-8">
                                    <p class="fs-5 p-0 m-0 fw-bold text-primary">Bank BNI</p>
                                </div>
                            </div>
                            <hr class="w-100">
                            <div class="row bg-light rounded-3 mb-3 mx-1">
                                <div class="col-md-6 text-left py-3 lh-sm">
                                    <small class="text-muted">Tahun ke-1 </small><br>
                                    <p class="text-dark">Bunga 2.75 %</p>
                                    
                                </div>
                                <div class="col-md-6 text-right py-3 lh-sm">
                                    <small class="">Angsuran/Bulan</small>
                                    <p class="text-dark fw-bold">Rp 2.767.865</p>
                                </div>
                            </div>
                        
                            <div class="row mb-3 mx-1 justify-content-center">
                                <button type="button" class="btn btn-primary" href=""
                                data-bs-toggle="modal" data-bs-target="#daftarIklanUserModal"><i class="fab fa-whatsapp float-start py-1 pe-2" aria-hidden="true"></i>Tanya KPR</button> 
                            </div>
                    </article>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <article class="bg-white border rounded p-3">
                            <div class="row align-items-center">
                                <div class="col-md-4 overflow-hidden">
                                    <img class="rounded-circle img-thumbnail" src="{{ asset('images/logo/logo-bank-cimb-niaga.jpg') }}" alt="" style="height: 5rem;"> 
                                </div>
                                <div class="col-md-8">
                                    <p class="fs-5 p-0 m-0 fw-bold text-primary">Bank CIMB Niaga</p>
                                </div>
                            </div>
                            <hr class="w-100">
                            <div class="row bg-light rounded-3 mb-3 mx-1">
                                <div class="col-md-6 text-left py-3 lh-sm">
                                    <small class="text-muted">Tahun ke-1 </small><br>
                                    <p class="text-dark">Bunga 4.65 %</p>
                                    
                                </div>
                                <div class="col-md-6 text-right py-3 lh-sm">
                                    <small class="">Angsuran/Bulan</small>
                                    <p class="text-dark fw-bold">Rp 2.752.533</p>
                                </div>
                            </div>
                        
                            <div class="row mb-3 mx-1 justify-content-center">
                                <button type="button" class="btn btn-primary" href=""
                                data-bs-toggle="modal" data-bs-target="#daftarIklanUserModal"><i class="fab fa-whatsapp float-start py-1 pe-2" aria-hidden="true"></i>Tanya KPR</button> 
                            </div>
                    </article>
                </div>
                <div class="col-md-6 mb-3">
                    <article class="bg-white border rounded p-3">
                            <div class="row align-items-center">
                                <div class="col-md-4 overflow-hidden">
                                    <img class="rounded-circle img-thumbnail" src="{{ asset('images/logo/logo-bank-bni.jpg') }}" alt="" style="height: 5rem;"> 
                                </div>
                                <div class="col-md-8">
                                    <p class="fs-5 p-0 m-0 fw-bold text-primary">Bank BNI</p>
                                </div>
                            </div>
                            <hr class="w-100">
                            <div class="row bg-light rounded-3 mb-3 mx-1">
                                <div class="col-md-6 text-left py-3 lh-sm">
                                    <small class="text-muted">Tahun ke-1 </small><br>
                                    <p class="text-dark">Bunga 2.75 %</p>
                                    
                                </div>
                                <div class="col-md-6 text-right py-3 lh-sm">
                                    <small class="">Angsuran/Bulan</small>
                                    <p class="text-dark fw-bold">Rp 2.767.865</p>
                                </div>
                            </div>
                        
                            <div class="row mb-3 mx-1 justify-content-center">
                                <button type="button" class="btn btn-primary" href=""
                                data-bs-toggle="modal" data-bs-target="#daftarIklanUserModal"><i class="fab fa-whatsapp float-start py-1 pe-2" aria-hidden="true"></i>Tanya KPR</button> 
                            </div>
                    </article>
                </div>
            </div>
           
        </article>
    </section>
    
</div>


@push('stone-scripts')
 <script>
    
    const propertyPriceInput = document.getElementById('propertyPrice');
    const percentageInput = document.getElementById('percentageInput');
    const percentageRange = document.getElementById('percentageRange');
    const downPaymentInput = document.getElementById('downPayment');
    const loanTerm = document.getElementById('loanTerm');
    const termRange = document.getElementById('termRange');
    const mortgageResult = document.getElementById('mortgageResult');
    const resultBtn = document.getElementById('resultBtn');
    const intRate = 0.0487 //4,87% //AMBIL VALUE DARI PILIHAN SUKU BUNGA
    const showRate = document.getElementById('showRate'); 

    function formatCurrency(number) {
        return new Intl.NumberFormat('id-ID').format(number);
    }

    function parseCurrency(value) {
        return parseFloat(value.replace(/\./g, '').replace(/,/g, '')) || 0;
    }

    function updateDownPayment() {
        const price = parseCurrency(propertyPriceInput.value);
        const percent = parseFloat(percentageInput.value) || 0;
        const result = price * (percent / 100);
        downPaymentInput.value = formatCurrency(result);
    }

    // When typing price 
    propertyPriceInput.addEventListener('input', function () {
        const numericValue = parseCurrency(this.value);
        this.value = formatCurrency(numericValue);
        updateDownPayment();
    });

    // When sliding percent range
    percentageRange.addEventListener('input', function () {
        percentageInput.value = this.value;
        updateDownPayment();
    });

    // When manually typing percentage
    percentageInput.addEventListener('input', function () {
        let val = parseInt(this.value);
        if (val < 20) val = 20;
        if (val > 50) val = 50;
        percentageRange.value = val;
        percentageInput.value = val;
        updateDownPayment();
    });

    // When sliding percent term
    termRange.addEventListener('input', function () {
        loanTerm.value = this.value;
    });

    // When manually typing loan Term
    loanTerm.addEventListener('input', function () {
        let val = parseInt(this.value);
        if (val < 5) val = 5;
        if (val > 30) val = 30;
        loanTerm.value = val;
        termRange.value = val;
    });
    //calculate when result button clicked
    resultBtn.addEventListener('click', function () {
               
            const remaining = (parseCurrency(propertyPriceInput.value) - parseCurrency(downPaymentInput.value));
            const term = loanTerm.value * 12 //years to months
            const instalment = (remaining/term) + (remaining * intRate / term) ;
            mortgageResult.textContent = "Rp " + formatCurrency(instalment);
            showRate.textContent = "Bunga " + (intRate*100) + " %"

    });

</script>   
@endpush
