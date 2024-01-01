<template>
	<nav
		class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl"
		:class="userinterfaceStore.isRTL ? 'top-0 position-sticky z-index-sticky' : ''"
		:data-scroll="userinterfaceStore.isNavFixed"
		v-bind="$attrs"
		id="navbarBlur"
	  >
		<div class="container-fluid py-1 px-3">
			<div @click="toggleSidebar" class="sidenav-toggler sidenav-toggler-inner d-xl-block d-none me-2">
				<a class="nav-link p-0" href="#">
					<div class="sidenav-toggler-inner">
						<i v-for="i in 3" :key="i" class="sidenav-toggler-line" :class="userinterfaceStore.isNavFixed ? 'bg-dark' : 'bg-white'"></i>
					</div>
				</a>
			</div>
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-5"
					:class="`
						${userinterfaceStore.isRTL ? '' : ' me-sm-6'} 
						${textColor}
				`">
					<li class="breadcrumb-item text-sm">
						<a class="text-white" href="javascript:;">
							<i class="ni ni-box-2"></i>
						</a>
					</li>
					<li class="breadcrumb-item text-sm">
						<a class="opacity-5" :class="textColor" href="javascript:;">
							Pages
						</a>
					</li>
					<li aria-current="page" class="breadcrumb-item text-sm active" :class="textColor">
						Default
					</li>
				</ol>
				<h6 class="font-weight-bolder mb-0" :class="textColor">
					Default
				</h6>
			</nav>
			<div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0" :class="userinterfaceStore.isRTL ? 'px-0' : 'me-sm-4'" id="navbar">
				<div class="pe-md-3 d-flex align-items-center" :class="userinterfaceStore.isRTL ? 'me-md-auto' : 'ms-md-auto'"></div>
				<ul class="navbar-nav justify-content-end">
					<li class="nav-item d-flex align-items-center">
						<Link class="nav-link font-weight-bold border rounded px-0" :class="textColor" :href="route('admin.portfolio.about')">
							<i class="fa fa-user-circle fa-lg ms-2 me-1" :class="textColor"></i>
							<span class=" ms-1 me-2">{{ user.username }}</span>
						</Link>
					</li>
					<li class="nav-item d-xl-none ps-3 d-flex align-items-center">
						<a class="nav-link p-0" :class="textColor" href="#" @click.prevent="toggleSidebar">
							<div class="sidenav-toggler-inner">
								<i v-for="i in 3" :key="i" class="sidenav-toggler-line" :class="userinterfaceStore.isNavFixed ? 'bg-dark' : 'bg-white'"></i>
							</div>
						</a>
					</li>
					<li class="nav-item px-3 d-flex align-items-center">
						<a class="nav-link p-0" :class="textColor" @click.prevent="userinterfaceStore.toggleConfigurator">
							<i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
						</a>
					</li>
					<li class="nav-item dropdown pe-2 d-flex align-items-center">
						<a class="nav-link p-0" :class="textColor" :href="route('logout')">
							<i class="fa fa-power-off"></i>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</template>

<script setup>
import { usePage } from '@inertiajs/inertia-vue3';
import { computed, onMounted } from 'vue';
import { useUserinterfaceStore } from '@/stores/userinterface';
import { toggleSidebar } from '@/assets/js/template';

const userinterfaceStore = useUserinterfaceStore()
const user = computed(() => ({
	username: 'Default'
}))
// const user = computed(() => usePage().props.value.auth.user)

const textColor = computed(() => userinterfaceStore.isNavFixed ? 'text-dark' : 'text-white')

const props = defineProps({
	textWhite: {type: String},
})

</script>
