<template>
	<div>
		<Link class="nav-link" :class="{active: $page.url === url}" :href="url" v-if="isSubmenu">
			<span class="sidenav-mini-icon">{{ $t(text)[0] }}</span>
			<span class="sidenav-normal">{{ $t(text) }}</span>
		</Link>
		<Link class="nav-link" :class="{active: $page.url === url}" :href="url" v-else>
			<div class="icon icon-shape icon-sm text-center me-2 d-flex align-items-center justify-content-center">
				<i :class="`${icon} text-dark text-sm`"></i>
			</div>
			<span class="nav-link-text ms-1">{{ $t(text) }}</span>
		</Link>
	</div>
</template>

<script setup>
import { computed } from 'vue'

const props = defineProps({
  text: { type: String, required: true },
  href: { type: String, required: true },
  icon: { type: String, default: '' },
  isSubmenu: { type: Boolean, default: false },
})

const url = computed(() => route(props.href))
</script>
