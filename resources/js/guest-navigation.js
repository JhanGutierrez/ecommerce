const nav = document.getElementById("nav-items");

nav.addEventListener("click", (e) => {
    if (
        e.target.classList.contains("trigger-dropdown") &&
        window.innerWidth <= 768
    ) {
        let dropdown = e.target.parentElement.querySelector(
            ".nav-dropdown-submenu"
        );

        //If it is already collapsed, hide it
        if (e.target.parentElement.classList.contains("active-nav-dropdown")) {
            closeDropdown();
        } else {
            if (nav.querySelector(".active-nav-dropdown")) {
                closeDropdown();
            }
            e.target.parentElement.classList.add("active-nav-dropdown");
            dropdown.style.maxHeight = dropdown.scrollHeight + "px";
        }
    }
});

function closeDropdown() {
    nav.querySelector(
        ".active-nav-dropdown .nav-dropdown-submenu"
    ).removeAttribute("style");
    nav.querySelector(".active-nav-dropdown").classList.remove(
        "active-nav-dropdown"
    );
}
