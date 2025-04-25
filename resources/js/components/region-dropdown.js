export default function setupWilayahDropdown() {
    const base = '/data/wilayah';

    const province = document.getElementById('provinsi');
    const city = document.getElementById('kota');
    const district = document.getElementById('kecamatan');
    const village = document.getElementById('kelurahan');

    if (!province || !city || !district || !village) return;

    let provinces = [], cities = [], districts = [], villages = [];

    // Load all wilayah data
    Promise.all([
        fetch(`${base}/provinces.json`).then(res => res.json()),
        fetch(`${base}/cities.json`).then(res => res.json()),
        fetch(`${base}/districts.json`).then(res => res.json()),
        fetch(`${base}/villages.json`).then(res => res.json())
    ])
    .then(([provData, cityData, distData, villData]) => {
        provinces = provData;
        cities = cityData;
        districts = distData;
        villages = villData;

        // Show provinsi name, but keep id in dataset for filtering
        provData.forEach(item => {
            province.innerHTML += `<option value="${item.name}" data-id="${item.id}">${item.name}</option>`;
        });
    });

    province.addEventListener('change', function () {
        const selectedId = this.selectedOptions[0]?.dataset.id;
        reset(city);
        reset(district);
        reset(village);

        const filteredCities = cities.filter(item => item.provinsi_id == selectedId);
        filteredCities.forEach(item => {
            city.innerHTML += `<option value="${item.name}" data-id="${item.id}">${item.type} ${item.name}</option>`;
        });
        city.disabled = false;
    });

    city.addEventListener('change', function () {
        const selectedId = this.selectedOptions[0]?.dataset.id;
        reset(district);
        reset(village);

        const filteredDistricts = districts.filter(item => item.kabupaten_id == selectedId);
        filteredDistricts.forEach(item => {
            district.innerHTML += `<option value="${item.name}" data-id="${item.id}">${item.name}</option>`;
        });
        district.disabled = false;
    });

    district.addEventListener('change', function () {
        const selectedId = this.selectedOptions[0]?.dataset.id;
        reset(village);

        const filteredVillages = villages.filter(item => item.kecamatan_id == selectedId);
        filteredVillages.forEach(item => {
            village.innerHTML += `<option value="${item.name}">${item.name}</option>`;
        });
        village.disabled = false;
    });

    function reset(select) {
        const label = select.id.charAt(0).toUpperCase() + select.id.slice(1); // Capitalize first letter
        select.innerHTML = `<option value="">${label}</option>`;
        select.disabled = true;
    }
}