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


function handleOngkir() {
    // Buttons = document.querySelectorAll('.ongkiran');
    // Buttons.className = 'ongkiran text-black py-2 px-4 mx-4 rounded-full border-2 border-black hover:bg-gray-500 hover:text-white';
    // document.
}

function getCouriers() {
    var servicesButton = document.getElementById("servicesButton");
    servicesButton.innerHTML = '';
    let hiddenInput = document.createElement("input");
    hiddenInput.name = 'service_description';
    hiddenInput.id = 'hiddenInput';
    hiddenInput.className = 'hidden'
    servicesButton.appendChild(hiddenInput);
    // <input type="text" class="" name="service_description" id="hiddenInput"></input>
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

            var container = document.getElementById('servicesButton');
            var i = 0
            data.couriers.forEach(function (courier) {
                // Loop melalui setiap cost dalam array costs untuk setiap courier

                let selectedButton = null;

                courier.costs.forEach(function (cost) {
                    let ongkirButton = document.createElement("button");
                    ongkirButton.className = 'ongkiran text-white py-2 px-4 mx-4 rounded-full border-2 border-black bg-black hover:bg-gray-800';
                    ongkirButton.name = 'ongkirButton';
                    ongkirButton.type = 'button';
                    ongkirButton.id = "button" + i;
                    ongkirButton.textContent = cost.description + ', Rp.' +
                        cost.cost[0].value + ' - (' +
                        cost.cost[0].etd + ' day)'
                    ongkirButton.value = cost.service + ',' + cost.cost[0].value + ',' + cost.cost[0].etd;

                    ongkirButton.onclick = function () {
                        console.log(cost.service + ',' + cost.cost[0].value + ',' + cost.cost[0].etd);
                        passing = cost.service + ',' + cost.cost[0].value + ',' + cost.cost[0].etd;
                        document.getElementById('hiddenInput').value = passing;

                        // Reset background color of the previously selected button
                        if (selectedButton) {
                            selectedButton.style.backgroundColor = '#000000'; // Set the original background color
                        }

                        // Set background color of the newly selected button
                        ongkirButton.style.backgroundColor = '#808080'; // Warna abu-abu sesuai keinginan Anda
                        selectedButton = ongkirButton; // Update the currently selected button
                    };


                    // var radio = document.createElement('input');
                    // radio.className = 'bg-blue-500 text-white py-2 px-4 rounded';
                    // radio.type = 'radio';
                    // radio.name = 'service_description'; // Nama unik untuk grup radio
                    // radio.value = cost.service + ',' + cost.cost[0].value + ',' + cost.cost[0].etd;

                    console.log(cost.service, cost.cost[0].value, cost.cost[0].etd);

                    var label = document.createElement('label');
                    label.className = 'rounded bg-lg'
                    // label.appendChild(radio);
                    label.appendChild(ongkirButton);
                    // label.appendChild(document.createTextNode(
                    //     cost.description + ', Rp.' +
                    //     cost.cost[0].value + ' - (' +
                    //     cost.cost[0].etd + ' day)'
                    // ));
                    container.appendChild(label);
                    i = i + 1
                });
            });

        })
        .catch(error => {
            console.error('Error:', error);
        });

}




function validateForm() {
    var ongkirInput = document.getElementById('hiddenInput').value;

    if (!ongkirInput) {
        alert('Please select a shipping service before proceeding.');
        return false; // Form submission will be prevented
    }

    // If everything is valid, you can proceed with the form submission
    return true;
}