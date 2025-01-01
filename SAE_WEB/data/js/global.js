

document.addEventListener("DOMContentLoaded", function () {
    var backToTopButton = document.createElement("button");
    backToTopButton.id = "backToTop";
    backToTopButton.textContent = "   ↑   ";
    document.body.appendChild(backToTopButton);

    window.addEventListener("scroll", function () {
        if (window.scrollY > 200) {
            backToTopButton.style.display = "block";
            backToTopButton.style.outline = "thin solid #FFFF";
        } else {
            backToTopButton.style.display = "none";
        }
    });

    backToTopButton.addEventListener("click", function () {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    });
});
