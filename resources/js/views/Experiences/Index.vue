<template>
	<Head :title="$t('experiences')"></Head>

	<b-row class="h-100" style="height: 100vh;">
		<b-col cols="12">
			<b-card header-class="d-flex justify-content-between align-items-center" body-class=" h-100 px-0 pt-0 pb-2">
				<template #header>
					<div>
						<h4 class="card-title">{{ $t('experiences') }}</h4>
						<h6 class="card-subtitle mb-2 text-body-secondary">{{ $t('Mes experiences professionnelles') }}</h6>
					</div>
					<div class="d-flex justify-content-end align-items-center" style="flex: 1">
						<b-form-input  @keyup="handleSearch" v-model="search" type="search" :placeholder="$t('Rechercher')" class="w-90 w-lg-35 rounded-pill"/>
						<b-button @click="showModal = true" variant="primary" pill class="mt-3 ms-n5">
							<i class="fa fa-plus-circle me-1"></i> 
							<span class="d-none d-lg-inline-block">{{ $t('Ajouter') }}</span>
						</b-button>
					</div>
				</template>

				<div class="p-0">
					<table class="table align-items-center justify-content-center mb-0">
						<thead>
						  	<tr>
								<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{ $t('Entreprise') }}</th>
								<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{ $t('Période') }}</th>
								<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{ $t('Poste') }}</th>
								<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{ $t('Statut') }}</th>
								<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">{{ $t('Type d\'experience') }}</th>
								<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7" style="width: 25%">{{ $t('Description') }}</th>
								<th></th>
						  	</tr>
						</thead>
						<tbody v-if="!items.length">
							<tr>
								<td colspan="7">
									<b-alert variant="info" :model-value="true">
										<i class="fa fa-exclamation-triangle text-white me-1"></i>
										{{ $t('Aucune expérience trouvée') }}
									</b-alert>
								</td>
							</tr>
						</tbody>
						<tbody v-else>
							<tr v-for="item in items" :key="item.id">
								<td><div class="d-flex px-2">
									<div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
										<i :class="`${item.icone || ''} fa-lg text-white opacity-10`"></i>
									</div>
									<div class="my-auto"><h6 class="mb-0 text-sm">{{ item.nom }}</h6></div>
								</div></td>
								<td class="align-middle text-center"><div class="d-flex align-items-center justify-content-center">
									<span class="me-2 text-xs font-weight-bold">{{ item.niveau }}%</span>
									<div>
										<div class="progress" style="height: .5em; ">
											<div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" :style="`width: ${item.niveau}%;`"></div>
										</div>
									</div>
							  	</div></td>
								<td>
									<span v-if="item.active" class="badge badge-sm bg-gradient-success">{{ $t('Actif') }}</span>
									<span v-else class="badge badge-sm bg-gradient-danger">{{ $t('Inactif') }}</span>
								</td>
								<td>
							  	<span class="text-xs font-weight-bold">{{ item.description }}</span>
								</td>
								
								<td class="align-middle">
									<b-dropdown variant="link" toggle-class="text-decoration-none text-secondary" no-caret>
										<template #button-content><i class="fa fa-ellipsis-v text-xs"></i></template>
										<b-dropdown-item href="#" @click.prevent="openItem(item, 'consult')">{{ $t('Détails') }}</b-dropdown-item>
										<b-dropdown-item href="#" @click.prevent="openItem(item, 'edit')">{{ $t('Modifier') }}</b-dropdown-item>
										<b-dropdown-item href="#" @click.prevent="removeItem(item)" class="text-danger">{{ $t('Supprimer') }}</b-dropdown-item>
									</b-dropdown>
								</td>
						  	</tr>
						</tbody>
					</table>

					<Pagination
						:links="props.experiences.links"
						:prev="props.experiences.prev_page_url"
						:next="props.experiences.next_page_url"
						:total="props.experiences.total"
						v-model="per_page"
						:from="props.experiences.from"
						:to="props.experiences.to"
					/>
				  </div>
			</b-card>
		</b-col>
	</b-row>

	<SkillForm :item="item" :mode="mode" v-if="showModal" @finish="resetModal" />
</template>

<script setup>
import { Inertia } from "@inertiajs/inertia";
import { computed, ref, watch } from "vue";
import { useI18n } from "vue-i18n";
import _ from 'lodash'

import Pagination from "@/shared/Pagination.vue";
import { useAlert, useToast } from '@/utils/alert'
import SkillForm from "./Form.vue";

const props = defineProps({
	experiences: Object,
});

const $alert    = useAlert()
const $toast    = useToast()
const { t: $t } = useI18n({ useScope: "global" });

const showModal = ref(false);
const item      = ref({});
const mode      = ref('create');
const search    = ref('')
const per_page  = ref(props.experiences.per_page ?? 5)

const items = computed(() => props.experiences.data)

watch(per_page, () => handleSearch())


function openItem(elt, mod) {
	item.value      = elt
	mode.value      = mod
	showModal.value = true
}

function removeItem(item) {
	$alert.confirm($t('Voulez-vous vraiment supprimer cette compétence ?'), () => {
		Inertia.post(route("experiences.delete", item.id), {
			onSuccess: ({ props }) => {
				$toast.success(props.flash.success)
			},
			onError: (errors) => {
				let message = ''
				if (Array.isArray(errors)) {
					message = errors.join("<br/>")
				} else {
					message = $t("Une erreur s'est produite") 
				}
				$alert.error(message)
			},
  		});	
	})
}

function resetModal() {
	showModal.value = false
	item.value = {}
	mode.value = 'create'
}

const handleSearch = _.throttle(function() {
	const query = { 
		search  : search.value,
		limit: per_page.value
	}

  	Inertia.get(route('experiences.index', query), {}, {
    	replace: true,
    	preserveState: true
  	})
}, 500)
</script>
