import 'bootstrap-vue-next/dist/bootstrap-vue-next.css'
import BootstrapVueNext from 'bootstrap-vue-next'

import 'vue-select/dist/vue-select.css';
import vSelect from 'vue-select';

export default function (app) {
	app.use(BootstrapVueNext)
	app.component('v-select', vSelect);

	return app;
}
