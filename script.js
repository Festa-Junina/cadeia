const closeModal = document.getElementById("closeModal");
const modal = document.getElementById("modal");
const blur = document.getElementById("blur");

closeModal.addEventListener("click", function () {
    modal.classList.add("hide");
    blur.classList.add("hide");
});
