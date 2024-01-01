<template>
	<b-modal size="lg" v-model="show" :title="title" @hide.prevent @hidden="hideModal" @close="show = false" @cancel="show = false" @ok.prevent="submitForm" :ok-title="$t('Valider')" :cancel-title="$t('Annuler')" :ok-disabled="mode === 'consult'">
		<b-row>
			<b-col lg="6" cols="12">
				<fieldset>
					<legend class="border-bottom mb-3">{{ $t('Informations de base') }}</legend>
					<b-form-group class="mb-3" :label="$t('Nom de la compétence') + ' (*)'" label-for="competence.nom">
						<b-form-input :disabled="mode === 'consult'" type="text" v-model="form.nom" trim :placeholder="$t('Entrez le nom de la compétence')" id="competence.nom" />
					</b-form-group>
					<b-form-group class="mb-3" :label="$t('Niveau de compétence') + ' (*)'" label-for="competence.niveau">
						<div class="d-flex justify-content-between align-items-center mt-n1">
							<b-form-input :disabled="mode === 'consult'" type="range" v-model="form.niveau" min="5" max="100" id="competence.niveau" />
							<span class="text-end text-muted ms-1 small" style="width: 12.5%">{{ form.niveau }}%</span>
						</div>
					</b-form-group>
					<b-form-group class="mb-3" :label="$t('Description')" label-for="competence.description">
						<b-form-textarea :disabled="mode === 'consult'" :placeholder="$t('Decrivez votre compétence')" rows="5" v-model="form.description" />
					</b-form-group>
					<b-form-checkbox :disabled="mode === 'consult'" v-model="form.active" switch>{{ $t('Actif') }}</b-form-checkbox>
				</fieldset>
			</b-col>
			<b-col lg="6" cols="12">
				<fieldset>
					<legend class="border-bottom mb-3">{{ $t('Métadonnées') }}</legend>
					<b-form-group class="mb-3" :label="$t('Icône')" label-for="competence.icone">
						<div class="d-flex justify-content-between align-items-center">
							<div class="my-0 py-0 me-1" style="flex: 1">
								<v-select :disabled="mode === 'consult'" :options="icons" v-model="form.icone">
									<template #option="{ label }">
									  	<span class="d-flex align-items-center">
											<i :class="label"></i>
											<span class="d-inline-block ms-2">{{ label }}</span>
									  	</span>
									</template>
									<template #selected-option="{ label }">
										<span class="d-flex align-items-center">
											<i :class="label" :style="`color: ${form.couleur}`"></i>
											<span class="d-inline-block ms-2">{{ label }}</span>
									  	</span>
									</template>
								</v-select>
							</div>
							<div class="my-0 py-0 ms-1">
								<b-form-input :disabled="mode === 'consult'" type="color" v-model="form.couleur"/>
							</div>
						</div>
					</b-form-group>
					<b-form-group class="mb-3" :label="$t('Description')" label-for="competence.description">
						<template #label>
							<label for="competence.description" class="form-label d-flex justify-content-between align-items-center">
								<span style="flex: 1">{{ $t('Métadonnées') }}</span>
								<span v-b-popover.hover.bottom="$t('Doit être un JSON VALIDE. Sinon ce champs ne sera pas pris en compte')">
									<i class="fa fa-question-circle"></i>
								</span>
							</label>
						</template>
						<JsonEditorVue class="jse-theme-dark" style="height: 12em"
							:mainMenuBar="false" :navigationBar="false" :statusBar="false"
							v-model="form.metadata"
							mode="text" :readOnly="mode === 'consult'"
						/>
					</b-form-group>
				</fieldset>
			</b-col>
		</b-row>
	</b-modal>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";
import { computed, onMounted, ref } from "vue"
import { useI18n } from "vue-i18n";
import JsonEditorVue from 'json-editor-vue'

import icons from "@/data/icons";
import { useAlert, useToast } from '@/utils/alert'

const props = defineProps({
	mode: { type: String, default: 'create' },
	item: { type: Object, required: false },
})

const emit = defineEmits(['finish'])

const { t: $t } = useI18n({ useScope: "global" });
const $alert    = useAlert()
const $toast    = useToast()

const show = ref(false)

const form = useForm({
	nom        : props.item.nom || '',
	niveau     : props.item.niveau || 5,
	description: props.item.description || '',
	active     : props.item.active === false ? false: true,
	metadata   : props.item.metadata || {},
	couleur    : props.item.couleur || '',
	icone      : props.item.icone || '',
})

const title = computed(() => {
	if (props.mode === 'create') {
		return $t('Ajouter une compétence')
	}
	if (props.mode === 'consult') {
		return $t('Détails de la compétence')
	}
	return $t('Modifier une compétence')
})


onMounted(() => {
	show.value = true
})

function submitForm() {
	form.transform((data) => ({
    	...data,
    	metadata: (typeof data.metadata !== 'string' && !(data.metadata instanceof String)) ? JSON.stringify(data.metadata) : data.metadata,
  })).post(route(`competences.${props.mode === 'create' ? 'create' : 'update'}`, [props.item.id]), {
    	onSuccess: ({ props }) => {
			form.reset()
			$toast.success(props.flash.success)
			show.value = false
    	},
		onError: (errors) => {
			let message = ''
			if (Array.isArray(errors)) {
				message = errors.join("<br/>")
			} else {
				message = $t("Une erreur s'est produite") 
			}
			$alert.error(message)
		}
	})
}

function hideModal() {
	form.reset()
	emit('finish')
}
</script>
