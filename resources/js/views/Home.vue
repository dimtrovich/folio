<template>
	<b-row>
		<b-col xl="3" sm="6" class="mb-xl-0 mb-4">
			<b-card body-class="p-3">
				<b-row>
					<b-col cols="8">
						<div class="numbers">
							<p class="text-sm mb-0 text-uppercase font-weight-bold">{{ $t('competences') }}</p>
							<h5 class="font-weight-bolder text-primary">{{ stats.competences }}</h5>
							<p class="mb-0">
								<Link :href="route('competences.index')" class="text-secondary text-sm font-weight-bolder">{{ $t('Voir les détails') }} <i class="fa fa-long-arrow-right"></i></Link>
							</p>
						</div>
					</b-col>
					<b-col cols="4" class="text-end">
						<div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
							<i class="fa fa-keyboard text-lg opacity-10" aria-hidden="true"></i>
						</div>
					</b-col>
				</b-row>
			</b-card>
		</b-col>
		<b-col xl="3" sm="6" class="mb-xl-0 mb-4">
			<b-card body-class="p-3">
				<b-row>
					<b-col cols="8">
						<div class="numbers">
							<p class="text-sm mb-0 text-uppercase font-weight-bold">{{ $t('education') }}</p>
							<h5 class="font-weight-bolder text-primary">{{ stats.formations }}</h5>
							<p class="mb-0">
								<Link :href="route('competences.index')" class="text-secondary text-sm font-weight-bolder">{{ $t('Voir les détails') }} <i class="fa fa-long-arrow-right"></i></Link>
							</p>
						</div>
					</b-col>
					<b-col cols="4" class="text-end">
						<div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
							<i class="fa fa-book text-lg opacity-10" aria-hidden="true"></i>
						</div>
					</b-col>
				</b-row>
			</b-card>
		</b-col>
		<b-col xl="3" sm="6" class="mb-xl-0 mb-4">
			<b-card body-class="p-3">
				<b-row>
					<b-col cols="8">
						<div class="numbers">
							<p class="text-sm mb-0 text-uppercase font-weight-bold">{{ $t('experiences') }}</p>
							<h5 class="font-weight-bolder text-primary">{{ stats.experiences }}</h5>
							<p class="mb-0">
								<Link :href="route('competences.index')" class="text-secondary text-sm font-weight-bolder">{{ $t('Voir les détails') }} <i class="fa fa-long-arrow-right"></i></Link>
							</p>
						</div>
					</b-col>
					<b-col cols="4" class="text-end">
						<div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
							<i class="fa fa-briefcase text-lg opacity-10" aria-hidden="true"></i>
						</div>
					</b-col>
				</b-row>
			</b-card>
		</b-col>
		<b-col xl="3" sm="6" class="mb-xl-0 mb-4">
			<b-card body-class="p-3">
				<b-row>
					<b-col cols="8">
						<div class="numbers">
							<p class="text-sm mb-0 text-uppercase font-weight-bold">{{ $t('projets') }}</p>
							<h5 class="font-weight-bolder text-primary">{{ stats.projets }}</h5>
							<p class="mb-0">
								<Link :href="route('competences.index')" class="text-secondary text-sm font-weight-bolder">{{ $t('Voir les détails') }} <i class="fa fa-long-arrow-right"></i></Link>
							</p>
						</div>
					</b-col>
					<b-col cols="4" class="text-end">
						<div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
							<i class="fa fa-box-open text-lg opacity-10" aria-hidden="true"></i>
						</div>
					</b-col>
				</b-row>
			</b-card>
		</b-col>
	</b-row>
	
</template>

<script setup>
import { usePage } from '@inertiajs/inertia-vue3';
import { computed } from 'vue';

const stats = computed(() => usePage().props.value.stats)

</script>
