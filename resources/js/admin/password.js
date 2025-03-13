const btns = document.querySelectorAll(".js-toggle-password");
console.log("btns", btns);
btns.forEach(function (toggle) {
    toggle.addEventListener("click", function (e) {
        e.preventDefault();
        var input = e.currentTarget
            .closest(".input-group")
            .querySelector("input");
        if (input.getAttribute("type") == "password") {
            input.setAttribute("type", "text");
        } else {
            input.setAttribute("type", "password");
        }
    });
});
