<template>
	<b-container class="mt-4" v-if="props.total > 0"  v-b-color-mode="currentColor">
		<hr v-if="hr === 'top'" class="mb-0">
		<div class="d-flex align-items-center">
            <div v-if="props.noControl === false" class="me-1 d-flex align-items-center me-3">
                <span class="text-muted d-inline-block text-small me-2">{{ $t('affichage_de_x_y_sur_z_elements', {x: offset, y: last, z: total }) }}</span>
				<div class="dropdown">
					<button class="btn btn-outline-secondary m-0 px-3 btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">{{ dropdownText }}</button>
					<ul class="dropdown-menu dropdown-menu-end" :class="{'dropdown-menu-dark': userinterfaceStore.darkMode}">
					  	<li v-for="i in props.range" :key="i"><a class="dropdown-item" href="#" @click.prevent="changeLimit(i)">{{ i }}</a></li>
					</ul>
				</div>
            </div>
			<div class="pagination-container justify-content-center">
				<ul :class="`pagination pagination-${props.size}`">
					<li class="page-item " :class="{disabled: props.prev == null}">
						<Link class="page-link" :href="props.prev">«</Link>
					</li>
					<li class="page-item" :class="{'active': link.active}" v-for="(link, i) in computedLinks" :key="i">
						<Link class="page-link" :class="{'text-white': link.active}" :href="link.url">{{ link.label }}</Link>
					</li>
					<li class="page-item" :class="{disabled: props.next == null}">
						<Link class="page-link" :href="props.next">»</Link>
					</li>
				</ul>
			</div>
			
        </div>
		<hr v-if="hr === 'bottom'" class="mt-0">
	</b-container>
</template>

<script setup>
import { computed, ref } from 'vue';
import {vBColorMode} from 'bootstrap-vue-next'

import { useUserinterfaceStore } from '@/stores/userinterface';

const userinterfaceStore = useUserinterfaceStore()

const props = defineProps({
	total: {type: Number, required: true},
	modelValue: {type: Number, default: 20},
	from: {type: Number, default: null},
	to: {type: Number, default: null},
    hr: {type: [String, Boolean], default: false},
	noControl: {type: Boolean, default: false},
	range: {type: Array, default: () => [5, 10, 20, 30, 50, 100]},
	size: {type: [Number, String], default: 'md'},
	links: {type: Array, required: true},
    prev: {type: String, default: ""},
    next: {type: String, default: ""}
})

const emit = defineEmits(['update:modelValue'])


const limiter = ref(props.modelValue);
const current = ref(1);

const currentColor = computed(() => userinterfaceStore.darkMode ? 'dark' : 'light')
const computedLinks = computed(() => {
    props.links.shift();
    props.links.pop();
	
    return props.links;
})
const offset = computed(() => {
	if (props.from) {
		return props.from
	}

	return ((current.value * limiter.value) - limiter.value) + 1
})
const last = computed(() => {
	if (props.to) {
		return props.to
	}
	const l = offset.value + limiter.value
	if (l > props.total) {
		return props.total
	}
	return l
})
const dropdownText = computed(() => `${props.range.length < 2 ? props.range[0] : limiter.value}`)

function changeLimit(limit) {
	limiter.value = limit
	emit('update:modelValue', limit)
}
</script>
