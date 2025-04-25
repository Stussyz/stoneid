 <!-- isi tab Kemampuan KPR -->
 <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
    <section class="row mt-3 g-0">

        <!-- INPUT SIMULASI KEMAMPUAN KPR -->
        <aside class="col-lg-5 ">

            <div class="wrapper border shadow-sm rounded-3 p-4">
                <h5>Simulasi Kemampuan KPR</h5>
            <small class="text-muted">Ubah data di bawah ini untuk menghitung kemampuan KPR</small>
            <form class="my-3" action="">
                <div class="mb-3">
                    <label for="inputHarga" class="form-label">Penghasilan Perbulan</label>
                    <div class="input-group"> 
                        <span class="input-group-text" id="inputTelephone">Rp</span>
                        <input type="text" id="monthlyIncome" placeholder="Masukkan penghasilan-mu perbulan"  class="form-control price-control" pattern="[0-9.,]+" data-type="number">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputHarga" class="form-label">Uang Muka</label>
                    <div class="input-group"> 
                        <span class="input-group-text" id="inputTelephone">Rp</span>
                        <input type="text" id="initialPayment" placeholder="Masukkan uang muka"  class="form-control price-control" pattern="[0-9.,]+" data-type="number">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="inputHarga" class="form-label">Masa KPR yang diinginkan</label>
                    <div class="input-group mb-3"> 
                        <input type="number" id="insPeriod" class="form-control float-right" style="max-width: 20%;" value="20">
                        <span class="input-group-text" id="inputTelephone">Tahun</span>
                    </div>
                    <input class="w-100" id="periodRange" type="range" min="5" max="30" value="20" />
                    <div class="row">
                        <div class="col-6">
                             <small class="text-muted">5 tahun</small>
                        </div>
                        <div class="col-6">
                            <small class="text-muted text-end float-end">30 tahun</small>
                       </div>
                       
                    </div>
                </div>
                <button type="button" id="result" class="btn btn-primary w-100 px-2" href=""
                data-bs-target="">Simulasikan</button>
            </form>
            <small><sup>*</sup>Simulasi berdasarkan bunga KPR terendah di Stone.id</small>
            </div>
            
        </aside>

        <!-- HASIL SIMULASI -->
        <article class="col-lg-7 px-4 pb-4 my-lg-0 my-5">
            <h5 class="ps-3">Hasil Simulasi</h5>
            <hr>
            <div class="row">
                <div class="col-6 py-4">
                    <div class="border-primary bg-light p-3 rounded-3 text-center">
                        <p>Harga Properti Maksimal <i class="far fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Dihitung berdasarkan maksimal pinjaman yang bisa diambil dan DP 20%"></i></p>
                        <h6 id="maxProp">Rp 0</h6>
                    </div>
                    
                </div>
                <div class="col-6 py-4">
                    <div class="border-primary bg-light p-3 rounded-3 text-center">
                        <p>Cicilan Maksimal <i class="far fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Dihitung berdasarkan 30% gaji dikurangi cicilan bulanan kamu. Biasanya kita sebut nominal 30% ini sebagai debt to income ration yang menjadi persyaratan KPR"></i></p>
                        <h6 id="maxInterest">Rp 0</h6>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <div class="border-primary px-0 bg-light py-3 rounded-3 text-center">
                        <p>Uang Muka Maksimal <i class="far fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Jumlah uang muka yang harus disiapkan biasanya 20% dari harga properti"></i></p>
                        <h6 id="maxDP">Rp 0</h6>
                    </div>
                </div>

                
            </div>
            <div class="row gx-0 pt-3 border-primary px-4 bg-light my-3 rounded-3">
                <div class="col-6"><p>Uang muka yang kamu siapkan</p></div>
                <div class="col-6 text-end"><h6 id="yourDP">Rp 0</h6></div>
            </div>
            <div class="row gx-0 pt-3 border-dark px-4 bg-light mb-3 rounded-3 text-primary d-none" id="noDebt">
                <p><i class="fas fa-check-circle me-2"></i> Sesuai dengan persyaratan bank pada umumnya</p>
            </div>
            <div class="row gx-0 pt-3 border-dark px-4 bg-dark mb-3 rounded-3 text-white" id="withDebt">
                <div class="col-6"><p>Masih kurang sejumlah</p></div>
                <div class="col-6 text-end"><h6 class="text-white" id="needMore">Rp 0</h6></div>
            </div>

            {{-- Ajukan KPR langsung ke whatsapp korporat --}}
            <div class="row gx-0 px-4 mb-3 rounded-3 text-white" id="withDebt">
                <a type="button" id="result" class="btn btn-primary w-100 px-2" href=""
                data-bs-target="">Ajukan KPR-mu Sekarang!</a>
            </div>
            <div class="px-2 pb-3">
                <small><span class="fw-bold">Disclaimer</span> : Hasil di atas merupakan angka estimasi, data perhitungan dapat berbeda dengan perhitungan bank. Hubungi kami untuk info lebih lanjut.</small>
            </div>
            
           
           
        </article>
    </section>
</div>


@push('stone-scripts')
<script>
          
    const 
    periodRange = document.getElementById('periodRange'),
    monthlyIncome = document.getElementById('monthlyIncome'),
    initialPayment = document.getElementById('initialPayment'),
    insPeriod = document.getElementById('insPeriod'),
    result = document.getElementById('result'),
    annualInterestRate = 0.0672, //6,72%
    
    maxProp = document.getElementById('maxProp'),
    maxInterest = document.getElementById('maxInterest'),
    maxDownPayment = document.getElementById('maxDP'),
    yourDP = document.getElementById('yourDP'),
    needMore = document.getElementById('needMore');

    // When typing period 
    insPeriod.addEventListener('input', function () {
        let val = parseInt(this.value);
        if (val < 5) val = 5;
        if (val > 30) val = 30;
        insPeriod.value = val;
        periodRange.value = val;
       
    });

    // When sliding range period
    periodRange.addEventListener('input', function () {
        insPeriod.value = this.value;

    });

    //Calculation 
    function calculateAffordability(monthlyIncome, downPayment, loanTermYears, annualInterestRate) {
    const affordablePayment = monthlyIncome * 0.3;
    const monthlyInterestRate = (annualInterestRate / 100) / 12;
    const numberOfPayments = loanTermYears * 12;

    function calculateLoanAmount(affordablePayment) {
        return affordablePayment * ((Math.pow(1 + monthlyInterestRate, numberOfPayments) - 1) /
               (monthlyInterestRate * Math.pow(1 + monthlyInterestRate, numberOfPayments)));
    }

    const maxLoanAmount = calculateLoanAmount(affordablePayment);
    const maxPropertyPrice = maxLoanAmount + downPayment;
    const maxDownPayment = maxPropertyPrice * 0.2;

    return {
        affordablePayment,
        maxDownPayment,
        maxPropertyPrice
        };
    }
    result.addEventListener('click', function () {

        // parsing value
        const
        incomeVal = parseCurrency(monthlyIncome.value),
        initVal = parseCurrency(initialPayment.value);


      
        const affordability = calculateAffordability(incomeVal, initVal, insPeriod.value, annualInterestRate);

       
        maxProp.textContent = "Rp " + formatCurrency(affordability.maxPropertyPrice);
        maxInterest.textContent = "Rp " + formatCurrency(affordability.affordablePayment);
        maxDownPayment.textContent = "Rp " + formatCurrency(affordability.maxDownPayment);
        yourDP.textContent = "Rp " + initialPayment.value;
        const underpayment = affordability.maxDownPayment - initVal;

        console.log(underpayment);
        if(underpayment < 0){
            document.getElementById("withDebt").classList.add('d-none');
            document.getElementById("noDebt").classList.remove('d-none');
           
        } else{
            document.getElementById("withDebt").classList.remove('d-none');
            document.getElementById("noDebt").classList.add('d-none');
            needMore.textContent = "Rp " + formatCurrency(underpayment);
        }
        return
    });


    </script>
    
@endpush