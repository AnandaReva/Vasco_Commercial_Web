 // Fungsi untuk membuka modal
 function openModal(modalId) {
    var modal = document.getElementById(modalId);
    modal.classList.remove('hidden');
}

// Fungsi untuk menutup modal
function closeModal(modalId) {
    var modal = document.getElementById(modalId);
    modal.classList.add('hidden');
}

// Menutup modal ketika latar belakangnya diklik
window.onclick = function (event) {
    if (event.target.className === 'modal') {
        event.target.classList.add('hidden');
    }
}