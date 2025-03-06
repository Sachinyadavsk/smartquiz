document.addEventListener("DOMContentLoaded", function () {
    if (typeof blockAdBlock === 'undefined') {
        showAdBlockerDialog();
    } else {
        blockAdBlock.onDetected(function() {
            showAdBlockerDialog();
        });
    }
function showAdBlockerDialog() {
    const dialog = document.getElementById("adBlockerDialog");
    dialog.classList.remove("hidden");
}
});

function closeModal(){
const dialog = document.getElementById("adBlockerDialog");
dialog.classList.add("hidden");

}