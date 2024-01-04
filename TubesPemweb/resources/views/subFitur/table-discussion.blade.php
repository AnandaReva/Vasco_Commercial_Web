<table class="w-full border-collapse border border-gray-300" id="discussion-container">
    <thead>
        <tr>
            <th class="p-2">No</th>
            <th class="col-span-4 p-2">Discussion</th>
            <th class="col-span-3 p-2">Follow Up Actions</th>
            <th class="col-span-2 p-2">Due Date</th>
            <th class="col-span-2 p-2">PIC</th>
        </tr>
    </thead>
    <tbody>
        {{-- create note --}}
        <tr>
            <td class="p-2">1</td>
            <td class="col-span-4 p-2">
                <textarea name="discussion[]" id="discussion" cols="30" rows="4"
                    class="w-full border border-gray-300 p-2"></textarea>
            </td>
            <td class="col-span-3 p-2" name="item[0][]" id="action-col-0"></td>
            <td class="col-span-2 p-2" name="due[0][]" id="due-date-col-0"></td>
            <td class="col-span-2 p-2">
                <div id="pic-0"></div>
                <button class="border-0 bg-transparent" id="add-action" onclick="addAction(event, 0)">
                    <i class="fa-solid fa-plus border border-black rounded-full p-1"></i>
                </button>
            </td>
        </tr>
    </tbody>
</table>

<button onclick="addRow(event)" class="border border-gray-300 p-2" id="addDiscussion">
    <i class="fa-solid fa-plus border border-black rounded-full p-1 me-2"></i>Add Item Discussion
</button>
