<template>
	<aside
		class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 overflow-hidden"
    	:class="`
			${userinterfaceStore.isRTL ? 'me-3 rotate-caret fixed-end' : 'fixed-start ms-3'}  
			${userinterfaceStore.sidebarType}`
		"
		:data-color="userinterfaceStore.sidebarColor"
		id="sidenav-main">
		<div class="sidenav-header">
			<i aria-hidden="true"
				class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
				id="iconSidenav">
			</i>
			<Link class="navbar-brand m-0 d-flex align-items-center" :href="route('admin.dashboard')">
				<img alt="" style="width: 2.5em; height: 2.5em" class="navbar-brand-logo img-fluid img-thumbnail rounded-circle" :src="$asset('img/logo/folio-mini-transparent.png')" />
				<span class="navbar-brand-title ms-1 font-weight-bold display-6">FOLIO</span>
			</Link>
		</div>
		<hr class="horizontal dark mt-0">
		<SidebarList />
		<div class="sidenav-footer mx-3 my-3">
			<div class="card card-plain shadow-none" id="sidenavCard">
				<div class="card-body text-center p-3 w-100 pt-0">
					<div class="docs-info">
						<h6 class="mb-0">{{ $t('Besoin d\'aide') }}?</h6>
						<p class="text-xs font-weight-bold mb-0">{{ $t('Veuillez consulter la docs') }}</p>
					</div>
				</div>
			</div>
			<a class="btn btn-dark btn-sm w-100 mb-3" href="https://www.github.com/dimtrovich/folio/wiki" target="_blank">
				Documentation
			</a>
		</div>
	</aside>
</template>

<script setup>
import { onMounted, ref, onUpdated } from 'vue'
import SidebarList from './SidebarList.vue'

import { useUserinterfaceStore } from '@/stores/userinterface';
const userinterfaceStore = useUserinterfaceStore()

let ps = null;

onMounted(() => {
	initSidebarScrollbar()
})

onUpdated(() => {
	initSidebarScrollbar()
})

function initSidebarScrollbar() {
	if (ps) {
		ps.update()
	} else {
		const sidebar = document.querySelector('.sidenav');
		ps = new PerfectScrollbar(sidebar);
	}
}
</script>
