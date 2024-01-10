function getCities() {
    var provinceSelect = document.getElementById("province");
    var selectedProvince = provinceSelect.options[provinceSelect.selectedIndex].value;

    console.log("Selected Province ID:", selectedProvince);

    fetch("/getCitiesprovince/" + selectedProvince)
        .then(response => response.json())
        .then(data => {
            //console.log("Cities data:", data.cities);
            console.log("Cities data");

            // Clear existing options in the city dropdown
            var cityDropdown = document.getElementById("city");
            cityDropdown.innerHTML = "";

            // Add a disabled option as the first option
            var disabledOption = document.createElement("option");
            disabledOption.value = "";
            disabledOption.text = "Select City";
            disabledOption.disabled = true;
            disabledOption.selected = true; // Jika ingin membuatnya sebagai opsi terpilih secara default
            cityDropdown.appendChild(disabledOption);

            // Add new options based on the received cities data
            data.cities.forEach(city => {
                var option = document.createElement("option");
                option.value = city.city_id;
                option.text = city.city_name;
                cityDropdown.appendChild(option);
            });
        })
        .catch(error => {
            console.error('Error:', error);
        });
}




function getCouriers() {
    var citySelected = document.getElementById("city");
    var selectedCity = citySelected.options[citySelected.selectedIndex].value;

    var serviceSelected = document.getElementById("courier_service");
    var selectedService = serviceSelected.options[serviceSelected.selectedIndex].value;

    console.log(weight);
    console.log(selectedService);



    // console.log("Selected City ID:", selectedCity);
    // console.log("Selected Service ID:", selectedService);


    fetch("/getCouriers/" + selectedCity + "/" + selectedService + "/" + weight)
        .then(response => response.json())
        .then(data => {
            console.log("Couriers data:", data.couriers);

            var container = document.getElementById('servicesRadio');

            data.couriers.forEach(function (courier) {
                // Loop melalui setiap cost dalam array costs untuk setiap courier
                courier.costs.forEach(function (cost) {
                    var radio = document.createElement('input');
                    radio.className = 'bg-blue-500 text-white py-2 px-4 rounded';
                    radio.type = 'radio';
                    radio.name = 'service_description'; // Nama unik untuk grup radio
                    radio.value = cost.service + ',' + cost.cost[0].value + ',' + cost.cost[0].etd;

                    console.log(cost.service, cost.cost[0].value, cost.cost[0].etd);

                    var label = document.createElement('label');
                    label.appendChild(radio);
                    label.appendChild(document.createTextNode(
                        courier.name + ' - ' +
                        cost.description + ' Cost: Rp.' +
                        cost.cost[0].value + ',- Etd: ' +
                        cost.cost[0].etd + ' day'
                    ));
                    container.appendChild(label);
                });
            });
        })
        .catch(error => {
            console.error('Error:', error);
        });

}