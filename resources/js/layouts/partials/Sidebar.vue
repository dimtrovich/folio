<template>
    <div class="deznav">
        <div class="deznav-scroll">
            <ul class="metismenu" id="menu">
                <li class="nav-item" v-for="(item, i) in items" :key="i">
                    <div v-if="item.isDivider">
                        <hr class="horizontal dark" />
                        <h6 class="ms-2 text-uppercase text-xs font-weight-bolder opacity-6">{{ item.text }}</h6>
                    </div>
                    <Link v-else-if="!item.hasSubmenu" :href="route(item.route)" class="ai-icon">
                        <i :class="item.icon"></i>
                        <span class="nav-text">{{ item.text }}</span>
                    </Link>
                    
                    <a v-if="!item.isDivider && item.hasSubmenu" class="has-arrow ai-icon" href="javascript:void(0);" aria-expanded="false">
                        <i :class="item.icon"></i>
                        <span class="nav-text">{{ item.text }}</span>
                    </a>
                    <ul v-if="!item.isDivider && item.hasSubmenu">
                        <li v-for="(menu, j) in item.submenu" :key="j">
                            <Link :href="route(menu.route)">{{ menu.text }}</Link>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="plus-box">
                <p class="fs-15 font-w500 mb-1">Documentation</p>
                <a class="text-white fs-26" href="https://github.com/dimtrovich/folio" target="_blank">
					<i class="fas fa-long-arrow-alt-right"></i>
				</a>
            </div>
            <div class="copyright text-center">
                <p class="fs-13 font-w200">
					<strong class="font-w400">Folio CMS</strong> © 2024
				</p>
                <p>All Rights Reserved</p>
            </div>
        </div>
    </div>
</template>

<script setup>
import { usePage } from '@inertiajs/inertia-vue3';

import sidebarItems from '@/data/sidebar-links.js'

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
