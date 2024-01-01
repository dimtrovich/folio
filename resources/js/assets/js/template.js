export function toggleSidebar() {
	const sidenavShow = document.getElementsByClassName("g-sidenav-show")[0]
	const toggleNavbarMinimize = document.getElementById("navbarMinimize")
	
	if (sidenavShow) {
		if (sidenavShow.classList.contains("g-sidenav-hidden")) {
			sidenavShow.classList.remove("g-sidenav-hidden")
			sidenavShow.classList.add("g-sidenav-pinned")
			toggleNavbarMinimize && (toggleNavbarMinimize.click(), toggleNavbarMinimize.removeAttribute("checked"))
		} else {
			sidenavShow.classList.remove("g-sidenav-pinned")
			sidenavShow.classList.add("g-sidenav-hidden")
			toggleNavbarMinimize && (toggleNavbarMinimize.click(), toggleNavbarMinimize.setAttribute("checked", "true"))
		}
	}
}
