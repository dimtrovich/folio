
<template>
	<div id="main-wrapper" class="show">
		<AppHeader />
		<Sidebar />
		<div class="content-body ">
			<div class="container-fluid">
				<slot />
			</div>
		</div>
		<AppFooter />
	</div>	
</template>

<script setup>
import AppFooter from './partials/Footer.vue';
import AppHeader from './partials/Header.vue';
import Sidebar from './partials/Sidebar.vue';

import { onMounted } from "vue";
import { initSidebar, contentBodyHeight, initTemplate } from "@/assets/js/template.js";
onMounted(() => {
	switchStyle();
    initSidebar();
    contentBodyHeight();
})

function switchStyle() {
	initTemplate();
}
</script>

@/assets/js/template.js