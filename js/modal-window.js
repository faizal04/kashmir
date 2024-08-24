document.addEventListener("DOMContentLoaded", function () {
    var modalContainer = document.getElementById("modalContainer");
    var openModalBtn = document.getElementById("openModalBtn");

    if (openModalBtn) {
        openModalBtn.onclick = function () {
            fetch('./starter/_adminlogin.php')
                .then(response => response.text())
                .then(data => {
                    modalContainer.innerHTML = data;
                    var modal = document.getElementById("loginModal");
                    var closeBtn = document.getElementsByClassName("close")[0];

                    if (modal) {
                        modal.style.display = "block";

                        closeBtn.onclick = function () {
                            modal.style.display = "none";
                        }

                        window.onclick = function (event) {
                            if (event.target == modal) {
                                modal.style.display = "none";
                            }
                        }
                    } else {
                        console.error("Modal not found.");
                    }
                })
                .catch(error => console.error('Error loading modal content:', error));
        }
    }
});
