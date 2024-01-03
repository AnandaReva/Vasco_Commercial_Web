
// JavaScript to handle dynamic actions
document.getElementById("addDiscussion").addEventListener("click", function (e) {
    e.preventDefault(); // Mencegah pengiriman formulir utama
    var discussionDiv = document.createElement("div");
    discussionDiv.className = "discussion";
    var discussionIndex = document.querySelectorAll(".discussion").length;

    discussionDiv.innerHTML = `
       
       No. = ${discussionIndex + 1}
    <input class="form-control" type="text" name="discussion[]" placeholder="Please fill before adding Actions" style="height: 100px;">


       
        <button type="button" class="addAction" value="Add Action"
        data-discussion-index="${discussionIndex}"
        class="btn btn-outline-secondary btn-sm float-right btn-sm add-action">
        <i class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x"></i> <i
                class="fa fa-plus fa-stack-1x fa-inverse"></i></i> Tambah Action
    </button>
        <div class="actions">
            <div class="action">
             <table class="table">
               <tr>
                <th>Follow Up Action:</th>
                <th>Due Date:</th>
                <th>PIC:</th>

               </tr>

              <td>
                <input type="text" name="item[${discussionIndex}][]" id="item_${discussionIndex}" placeholder="Follow Up Action">
               </td>
               <td>
                <input type="date" name="due[${discussionIndex}][]" id="due_${discussionIndex}">
                </td>
               <td>
                <select name="pic[${discussionIndex}][]" id="pic_${discussionIndex}">
                <option value="0" >Select PIC</option> <!-- Placeholder -->
                ${pesertaTersedia.map(option => `<option value="${option.id}">${option.name}</option>`).join('')}
                </select>
                </td>
              <tr>

               </tr>
            </table>
            
            </div>
        </div>
    `;

    document.getElementById("discussions").appendChild(discussionDiv);
});

// Add action dynamically within each discussion
document.addEventListener("click", function (e) {
    if (e.target && e.target.className == "addAction") {
        e.preventDefault();
        var actionDiv = document.createElement("div");
        actionDiv.className = "action";
        var discussionIndex = e.target.getAttribute("data-discussion-index");

        actionDiv.innerHTML = `   
        <table class="table">
               <tr>

               </tr>

               <tr>
                 <td>
                    <input type="text" name="item[${discussionIndex}][]" id="item_${discussionIndex}" placeholder="Follow Up Action">
                 </td>
                 <td>
                 <input type="date" name="due[${discussionIndex}][]" id="due_${discussionIndex}">
                 </td>
                 <td>
                 <select name="pic[${discussionIndex}][]" id="pic_${discussionIndex}">
                    <option value="0" >Select PIC</option> <!-- Placeholder -->
                     ${pesertaTersedia.map(option => `<option value="${option.id}">${option.name}</option>`).join('')}
                   </select>
                   </td>
               </tr>
        </table>
        `;

        e.target.parentNode.querySelector(".actions").appendChild(actionDiv);
    }
});


