import { ltrim, rtrim } from 'php-in-js/modules/string'

export default function (app) {
	app.use({
		install(app, options) {
			app.config.globalProperties.$asset = (path) => {
				let base = null;
				if (Zygot) {
					base = Zygot.url || null;
				}
				if (! base) {
					base = window.location.origin;
				}
				
				return `${rtrim(base, '/')}/${ltrim(path, '/')}`;
			}
		},
	})

	return app
}
