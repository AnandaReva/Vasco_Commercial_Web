
document.getElementById('addFileInput').addEventListener('click', function () {
    const fileInput = document.createElement('div');
    fileInput.innerHTML = `
            <div class="form-group">
               
                <input type="file" name="files[]" class="form-control-file" accept=".pdf, .doc, .docx, .ppt, .pptx, .xls, .xlsx, .jpeg, .jpg, .png" required>
                <button type="button" class="removeFileInput btn btn-danger">Hapus File</button>
            </div>
        `;
    document.getElementById('fileInputs').appendChild(fileInput);
});

document.addEventListener('click', function (event) {
    if (event.target && event.target.className === 'removeFileInput btn btn-danger') {
        event.target.parentElement.remove();
    }
});
