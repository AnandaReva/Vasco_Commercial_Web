// Nyomot dari Project Nolan Gua
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

                <button type="button" class="addAction btn btn-outline-primary p-2" data-discussion-index="${index}">
                    <i class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i> <i class="fa fa-plus fa-stack-1x fa-inverse"></i></i> Tambah Action
                </button>
            </div>
            <div class="actions"></div>
        `;
    }

    discussionDiv.innerHTML = createDiscussionTemplate(discussionIndex);

    var discussionsContainer = document.getElementById("discussions");
    if (discussionsContainer) {
        discussionsContainer.appendChild(discussionDiv);
    }
});


//Menambah Action secara dinamis setiap discussion
document.addEventListener("click", function (e) {
    if (e.target && e.target.classList.contains("addAction")) {
        e.preventDefault();
        console.log('btn add action pressed');

        var actionDiv = document.createElement("div");
        actionDiv.className = "action";

        var discussionIndex = e.target.getAttribute("data-discussion-index");

        actionDiv.innerHTML = `
            Available Size:
            <table class="w-full border-collapse border border-gray-300 p-2">
                <tr>
                    <th class="p-2">Size:</th>
                    <th class="p-2">Price:</th>
                    <th class="p-2">Stock:</th>
                    <th class="p-2">Date Added::</th>
                </tr>
                <tr>
                    <td class="p-2">
                        <select class="border p-2" id="categoriesOption" name="[${discussionIndex}][]" id="size_${discussionIndex}" >
                            <option value=""  disabled selected>Select Size</option>
                            @foreach ($sizes as $size)
                                <option value="{{ $size->id }}">
                                ${sizes.map(size => `<option value="${size.id}">${size.size_name}</option>`).join('')}
                                </option>
                            @endforeach
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






/* Backup : //Menambah Action secara dinamis setiap discussion
document.addEventListener("click", function (e) {
    if (e.target && e.target.classList.contains("addAction")) {
        e.preventDefault();
        console.log('btn add action pressed');

        var actionDiv = document.createElement("div");
        actionDiv.className = "action";

        var discussionIndex = e.target.getAttribute("data-discussion-index");

        actionDiv.innerHTML = `
        Available Size:
            <table class="w-full border-collapse border border-gray-300 p-2">
                <tr>
                <th class="p-2">Size:</th>
                    <th class="p-2">Price:</th>
                    <th class="p-2">Stock:</th>
                    <th class="p-2">Date Added::</th>
                </tr>
                <tr>

                




                    <td class="p-2">
                        <input type="text" name="item[${discussionIndex}][]" id="item_${discussionIndex}" placeholder="Follow Up Action" class="border p-2 w-full">
                    </td>
                    <td class="p-2">
                        <input type="date" name="due[${discussionIndex}][]" id="due_${discussionIndex}" placeholder="Due Date" class="border p-2 w-full">
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