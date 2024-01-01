<template>
	<div class="g-sidenav-show  bg-gray-200">
		<div class="min-height-300 position-absolute w-100" :class="`${userinterfaceStore.darkMode ? 'bg-transparent' : 'bg-primary'}`"></div>
		<Sidebar 
			:class="[
				userinterfaceStore.isRTL ? 'fixed-end' : 'fixed-start'
			]"
			v-if="userinterfaceStore.showSidenav"
		/>
		<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
			<Navbar :class="[navClasses]"
				:textWhite="userinterfaceStore.isAbsolute ? 'text-white opacity-8' : 'text-white'"
			/>
			<div class="container-fluid py-4">
				<slot />
				<AppFooter />
			</div>
		</main>
		<Config :class="[
			userinterfaceStore.showConfig ? 'show' : '',
			userinterfaceStore.hideConfigButton ? 'd-none' : ''
		]" />
	</div>	
</template>

<script setup>
import { computed } from 'vue'

import Sidebar from './partials/Sidebar/Index.vue';
import Navbar from './partials/Navbar.vue';
import AppFooter from './partials/Footer.vue';
import Config from './partials/Config.vue';

import { useUserinterfaceStore } from '@/stores/userinterface';
const userinterfaceStore = useUserinterfaceStore()

const navClasses = computed(() => ({
	"position-sticky bg-white left-auto top-2 z-index-sticky": userinterfaceStore.isNavFixed && !userinterfaceStore.darkMode,
	"position-sticky bg-default left-auto top-2 z-index-sticky": userinterfaceStore.isNavFixed && userinterfaceStore.darkMode,
	"position-absolute px-4 mx-0 w-100 z-index-2": userinterfaceStore.isAbsolute,
	"px-0 mx-4": !userinterfaceStore.isAbsolute
}))
</script>
