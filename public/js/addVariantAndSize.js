function addVariant() {
    console.log('clicked');
    let originalDiv = document.getElementById('variantInput');
    let cloneDiv = originalDiv.cloneNode(true);

    // Generate a unique ID for the cloned div
    let uniqueId = Math.floor(Math.random() * 1000);
    cloneDiv.id = 'variantInput' + uniqueId;

    document.body.appendChild(cloneDiv);
}

let variantCounter = 1;

function addVariant() {
    variantCounter++;

    let newRow = document.createElement('tr');
    newRow.innerHTML = `
        <td class="py-2">
            <label class="text-sm">Choose Color ${variantCounter}</label>
        </td>
        <td class="py-2">
            <select class="border p-2 rounded-md" name="colorOption[${variantCounter}]">
                <option value="" disabled selected>Select Color</option>
                @foreach ($colors as $color)
                        ${colors.map(color => `<option value="${color.id}">${color.color_name}</option>`).join('')}
                        </option>
                    @endforeach
            </select>
        </td>
        <td class="py-2">
             <input type="file"  name="file[${variantCounter}]" accept="image/*" />
        </td>
    `;

    document.getElementById('variantInput').appendChild(newRow);
}











// add Size 
let sizeCounter = 1;

function addSize(idVariant) {
    sizeCounter++;

    //clone template
    let originalRow = document.getElementById('templateRow');
    let newRow = originalRow.cloneNode(true);

    // hspus "templateRow" ID dari row yg d clone
    newRow.removeAttribute('id');

    // Update IDs dan ame agar unik
    newRow.id = 'sizeInput' + sizeCounter;

    let labels = newRow.querySelectorAll('label');
    labels.forEach(label => {
        label.textContent = `Choose Size ${sizeCounter}`;
    });

    let selects = newRow.querySelectorAll('select');
    selects.forEach(select => {
        select.name = `sizeOption[${idVariant}][]`;
        select.value = '';
    });

    //cari price dan stock yg di clone
    let priceInput = newRow.querySelector('input[name^="price["]');
    let stockInput = newRow.querySelector('input[name^="stock["]');

    // set nama buat price dan stock
    priceInput.setAttribute('name', `price[${idVariant}][]`);
    stockInput.setAttribute('name', `stock[${idVariant}][]`);

    // set values
    priceInput.value = "";
    stockInput.value = "";

    // row baru
    newRow.style.display = 'table-row';

    // Append  row 
    let tableBody = document.getElementById('sizeInput' + idVariant);
    tableBody.appendChild(newRow);
}




















/*
document.getElementById("addDiscussion").addEventListener("click", function (e) {
    e.preventDefault();
    var discussionDiv = document.createElement("div");
    discussionDiv.className = "discussion bg-white border rounded p-4 mb-4";
    var discussionIndex = document.querySelectorAll(".discussion").length;

    console.log('btn add discussion pressed');

    function createDiscussionTemplate(index) {
        return `
            <div class="py-2">
                Variant ${index + 1}.
                <select class="border p-2 w-full" name="color[]"
                    placeholder="Please fill before adding Sizes" style="height: 100px;">
                    <option value="" disabled selected>Select Color</option>
                    ${colors.map(color => `<option value="${color.id}">${color.color_name}</option>`).join('')}
                </select>

                
                <input accept="image/*" type="file" name="fileAdded[]" 
                placeholder="file Added" class="border p-2 w-full">

                <button type="button" class="addAction btn btn-outline-primary p-2" data-discussion-index="${index}">
                    <i class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i> <i class="fa fa-plus fa-stack-1x fa-inverse"></i></i> Tambah Action
                </button>
            </div>
            Available Size:
            <div class="actions"></div>
        `;
    }

    discussionDiv.innerHTML = createDiscussionTemplate(discussionIndex);

    var discussionsContainer = document.getElementById("discussions");
    if (discussionsContainer) {
        discussionsContainer.appendChild(discussionDiv);
    }
});




document.addEventListener("click", function (e) {
    if (e.target && e.target.classList.contains("addAction")) {
        e.preventDefault();
        console.log('btn add action pressed');

        var actionDiv = document.createElement("div");
        actionDiv.className = "action";

        // var discussionIndex = parseInt(e.target.getAttribute("data-discussion-index")); // Convert to number
        var discussionIndex = parseInt(e.target.getAttribute("data-discussion-index")) || 0; // 0 sebagai deafult


        actionDiv.innerHTML = `
            <table class="w-full border-collapse border border-gray-300 p-2">
                <tr>
                    <td class="p-2">
                        <select class="border p-2" id="categoriesOption" name="size[${discussionIndex}][]" id="size_${discussionIndex}" >

                            <option value=""  disabled selected>Select Size</option>
                            ${sizes.map(size => `<option value="${size.id}">${size.size_name}</option>`).join('')}
                        </select>
                    </td>
                    <td class="p-2">
                        <input type="number" name="price[${discussionIndex}][]" id="price_${discussionIndex}"       
                            placeholder="Price" class="border p-2 w-full">
                    </td>
                    <td class="p-2">
                        <input type="number" name="stock[${discussionIndex}][]" id="stock_${discussionIndex}"       
                            placeholder="Stock" class="border p-2 w-full">
                    </td>
                    <td class="p-2">
                        <input type="date" name="dateAdded[${discussionIndex}][]" id="dateAdded_${discussionIndex}"       
                            placeholder="Date Added" class="border p-2 w-full">
                    </td>   
                                 
                </tr>
            </table>
        `;

        var discussionContainer = e.target.closest(".discussion");
        if (discussionContainer) {
            discussionContainer.querySelector(".actions").appendChild(actionDiv);
        }
    }
});
*/