import { defineStore } from 'pinia'
import { $storage} from '@/plugins/storage';

export const useUserinterfaceStore = defineStore('userinterface', {
  	state: () => ({
		hideConfigButton: false,
		isPinned        : true,
		showConfig      : false,
		sidebarType     : $storage.cookie.get('sidebar-type') || 'bg-white',
		isRTL           : false,
		mcolor          : "",
		sidebarColor    : $storage.cookie.get('sidebar-color') || 'primary',
		darkMode        : $storage.cookie.get('dark-mode') == true,
		isNavFixed      : $storage.cookie.get('nav-fixed') == true,
		isAbsolute      : false,
		showNavs        : true,
		showSidenav     : true,
		showNavbar      : true,
		showFooter      : true,
		showMain        : true,
		layout          : "default",
		isTransparent   : 'bg-transparent',
  	}),
  	getters: {},
  	actions: {
		toggleSidenav() {
			this.showSidenav = !this.showSidenav;
		},
		toggleSidebarColor(payload) {
			this.sidebarColor = payload;
			this.mcolor = `card-background-mask-${payload}`;
			$storage.cookie.set('sidebar-color', this.sidebarColor);
		},
		toggleSidebarType(payload) {
			this.sidebarType = payload;
			$storage.cookie.set('sidebar-type', this.sidebarType);
		},
		toggleConfigurator() {
			this.showConfig = !this.showConfig;
		},
		toggleDarkMode(payload) {
			this.darkMode = payload
			$storage.cookie.set('dark-mode', this.darkMode);
		},
		navbarMinimize() {
			const sidenav_show = document.querySelector(".g-sidenav-show");
	
			if (sidenav_show.classList.contains("g-sidenav-hidden")) {
				sidenav_show.classList.remove("g-sidenav-hidden");
				sidenav_show.classList.add("g-sidenav-pinned");
				this.isPinned = true;
			} else {
				sidenav_show.classList.add("g-sidenav-hidden");
				sidenav_show.classList.remove("g-sidenav-pinned");
				this.isPinned = false;
			}
		},
		toggleNavFixed() {
			this.isNavFixed = this.isNavFixed === false;
			$storage.cookie.set('nav-fixed', this.isNavFixed);
		},
  	}
})
