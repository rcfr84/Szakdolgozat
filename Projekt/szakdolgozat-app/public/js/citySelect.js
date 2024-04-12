document.addEventListener("DOMContentLoaded", function () {
    var countySelect = document.getElementById("countySelect");
    var citySelect = document.getElementById("citySelect");

    if (countySelect && citySelect) {
        countySelect.addEventListener("change", function () {
            var selectedCounty = countySelect.value;
            citySelect.innerHTML = "<option value=''>Válassz várost</option>";

            if (selectedCounty) {
                fetch(`/get-cities-by-county/${selectedCounty}`)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(function (city) {
                            var option = document.createElement("option");
                            option.value = city.city_id;
                            option.text = city.name.length > 35 ? city.name.slice(0, 35) : city.name;
                            citySelect.appendChild(option);
                        });
                    })
                    .catch(error => console.error(error));
            }
        });
    }
});
