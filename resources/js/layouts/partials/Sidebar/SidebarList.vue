<template>
	<div class="collapse navbar-collapse w-auto h-auto" id="sidenav-collapse-main">
		<ul class="navbar-nav">
			<li class="nav-item" v-for="(item, i) in items" :key="i">
				<div v-if="item.isDivider">
					<hr class="horizontal dark" />
					<h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">{{ $t(item.text) }}</h6>
				</div>
				<SidebarLink v-else-if="!item.hasSubmenu" :icon="item.icon" :text="item.text" :href="item.route" />
				<div v-else>
					<a class="nav-link" data-bs-toggle="collapse" :href="`#${item.text.replace(' ', '_')}`" role="button">
						<div class="icon icon-shape icon-sm text-center d-flex align-items-center justify-content-center">
							<i :class="`${item.icon} text-dark text-sm opacity-10`"></i>
						</div>
						<span class="nav-link-text ms-1">{{ $t(item.text) }}</span>
					</a>
					<div class="collapse" :class="{ show: isShowable(item.submenu) }" :id="`${item.text.replace(' ', '_')}`">
						<ul class="nav ms-4">
							<li class="nav-item " v-for="(menu, j) in item.submenu" :key="j">
								<SidebarLink :text="menu.text" :href="menu.route" :is-submenu="true" />
							</li>
						</ul>
					</div>
				</div>
			</li>
		</ul>
	</div>
</template>

<script setup>
import { usePage } from '@inertiajs/inertia-vue3';

import sidebarItems from '@/data/sidebar-links'
import SidebarLink from './SidebarLink.vue';

const items = sidebarItems.map(elt => ({
	...elt,
	hasSubmenu: isObject(elt) && Array.isArray(elt.submenu),
	isDivider: isObject(elt) && elt.divider == true,
}))

function isObject(obj) {
  	return Object.prototype.toString.call(obj) === '[object Object]'
}

function isShowable(menus) {
	const url = usePage().url.value;
	for (const menu of menus) {
		if (route(menu.route) === url) {
			return true;
		}
	}

	return false;
}
</script>
