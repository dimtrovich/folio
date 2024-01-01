<template>
	<div class="fixed-plugin">
		<a @click="userinterfaceStore.toggleConfigurator" class="fixed-plugin-button text-dark position-fixed px-3 py-2">
			<i class="fa fa-cog py-2"> </i>
		</a>
		<div class="card shadow-lg">
			<div class="card-header pb-0 pt-3 ">
				<div class="float-start">
					<h5 class="mt-3 mb-0">{{ $t('configuration_de_l_interface') }}</h5>
				</div>
				<div class="mt-4" :class="userinterfaceStore.isRTL ? 'float-start' : 'float-end'" @click="userinterfaceStore.toggleConfigurator">
					<button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
						<i class="fa fa-close"></i>
					</button>
				</div>
				<!-- End Toggle Button -->
			</div>
			<hr class="horizontal dark my-1">
			<div class="card-body pt-sm-3 pt-0 overflow-auto">
				<!-- Sidenav Type -->
				<div class="mt-3">
					<h6 class="mb-0">{{ $t('langue_d_affichage') }}</h6>
				</div>
				<div class="d-flex">
					<button @click="changeLanguage('fr')" :class="{'active': $i18n.locale === 'fr'}" class="btn bg-gradient-primary w-100 px-3 mb-2 me-2">{{ $t('francais') }}</button>
					<button @click="changeLanguage('en')" :class="{'active': $i18n.locale === 'en'}" class="btn bg-gradient-primary w-100 px-3 mb-2">{{ $t('anglais') }}</button>
				</div>
				<hr class="horizontal dark my-sm-4">
				<!-- Sidebar Backgrounds -->
				<div>
					<h6 class="mb-0">{{ $t('couleur_de_la_sidebar') }}</h6>
				</div>
				<a href="javascript:void(0)" class="switch-trigger background-color">
					<div class="badge-colors my-2" :class="userinterfaceStore.isRTL ? 'text-end' : ' text-start'">
						<span class="badge filter bg-gradient-primary" :class="{active: userinterfaceStore.sidebarColor === 'primary'}" @click="userinterfaceStore.toggleSidebarColor('primary')"></span>
						<span class="badge filter bg-gradient-dark" :class="{active: userinterfaceStore.sidebarColor === 'dark'}" @click="userinterfaceStore.toggleSidebarColor('dark')"></span>
						<span class="badge filter bg-gradient-info" :class="{active: userinterfaceStore.sidebarColor === 'info'}" @click="userinterfaceStore.toggleSidebarColor('info')"></span>
						<span class="badge filter bg-gradient-success" :class="{active: userinterfaceStore.sidebarColor === 'success'}" @click="userinterfaceStore.toggleSidebarColor('success')"></span>
						<span class="badge filter bg-gradient-warning" :class="{active: userinterfaceStore.sidebarColor === 'warning'}" @click="userinterfaceStore.toggleSidebarColor('warning')"></span>
						<span class="badge filter bg-gradient-danger" :class="{active: userinterfaceStore.sidebarColor === 'danger'}" @click="userinterfaceStore.toggleSidebarColor('danger')"></span>
					</div>
				</a>
				<!-- Sidenav Type -->
				<div class="mt-3">
					<h6 class="mb-0">{{ $t('type_de_sidebar') }}</h6>
				</div>
				<div class="d-flex">
					<button class="btn w-100 px-3 mb-2 me-1 bg-gradient-primary" :class="{active: userinterfaceStore.sidebarType === 'bg-white'}" @click="userinterfaceStore.toggleSidebarType('bg-white')">Light</button>
					<button class="btn w-100 px-3 mb-2 ms-1 bg-gradient-primary" :class="{active: userinterfaceStore.sidebarType === 'bg-default'}" @click="userinterfaceStore.toggleSidebarType('bg-default')">Dark</button>
				</div>
				<!-- Navbar Fixed -->
				<div class="d-flex my-3">
					<h6 class="mb-0">{{ $t('navbar_fixe') }}</h6>
					<div class="form-check form-switch ps-0 ms-auto my-auto">
						<input class="form-check-input mt-1 ms-auto" type="checkbox" :checked="userinterfaceStore.isNavFixed" @click="userinterfaceStore.toggleNavFixed" />
					</div>
				</div>
				<hr class="horizontal dark my-sm-4">
				<div class="mt-2 mb-5 d-flex">
					<h6 class="mb-0">Light / Dark</h6>
					<div class="form-check form-switch ps-0 ms-auto my-auto">
						<input class="form-check-input mt-1 ms-auto" type="checkbox" :checked="userinterfaceStore.darkMode" @click="setDarkMode" />
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script setup>
import { onMounted } from 'vue';
import { changeLanguage } from '@/plugins/i18n'
import { activateDarkMode, deactivateDarkMode } from "@/assets/js/dark-mode";

import { useUserinterfaceStore } from '@/stores/userinterface';
const userinterfaceStore = useUserinterfaceStore()

onMounted(() => {
	makeDarkMode()
})

function setDarkMode() {
	if (userinterfaceStore.darkMode) {
		userinterfaceStore.toggleSidebarType('bg-white')
		userinterfaceStore.toggleDarkMode(false)
        deactivateDarkMode();
        return;
	} else {
		userinterfaceStore.toggleSidebarType('bg-default')
		userinterfaceStore.toggleDarkMode(true)
        activateDarkMode();
	}
}

function makeDarkMode() {
	if (userinterfaceStore.darkMode) {
		activateDarkMode();
	} else {
		deactivateDarkMode();
	}
}

</script>
