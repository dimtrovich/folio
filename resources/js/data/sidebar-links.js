export default [
	{
		text: 'tableau_de_bord',
		route: 'dashboard',
		icon: 'fa fa-tachometer-alt',
	},
	{
		text: 'MAIN',
		divider: true,
	},
	{
		text: 'portfolio',
		icon: 'fa fa-flask',
		submenu: [
			{
				text: 'configuration',
				route: 'portfolio.config'
			},
			{
				text: 'a_propos',
				route: 'portfolio.about'
			},
			{
				text: 'competences',
				route: 'competences.index'
			},
			{
				text: 'education',
				route: 'portfolio.education'
			},
			{
				text: 'experiences',
				route: 'experiences.index'
			},
			{
				text: 'projets',
				route: 'portfolio.project'
			},
			{
				text: 'services',
				route: 'portfolio.services'
			},
		],
		
	},
	{
		text: 'curriculum_vitae',
		route: 'cv',
		icon: 'fa fa-id-card',
	},
	{
		text: 'communaute',
		divider: true,
	},
	{
		text: 'blog',
		icon: 'fa fa-newspaper',
		submenu: [
			{
				text: 'categories',
				route: 'blog.categories'
			},
			{
				text: 'articles',
				route: 'blog.articles'
			},
		],
		
	},
	{
		text: 'communaute',
		icon: 'fa fa-newspaper',
		submenu: [
			{
				text: 'messages',
				route: 'communaute.messages'
			},
			{
				text: 'newsletter',
				route: 'communaute.newsletter'
			},
		],
		
	},
	{
		text: 'visiteurs',
		route: 'cv',
		icon: 'fa fa-users',
	},
	{
		text: 'configurations',
		divider: true,
	},
	{
		text: 'optimisation',
		route: 'optimize',
		icon: 'fa fa-bolt',
	},
	{
		text: 'logs',
		route: 'logs',
		icon: 'fa fa-file-lines',
	},
	{
		text: 'parametres',
		route: 'settings',
		icon: 'fa fa-cogs',
	},
]
