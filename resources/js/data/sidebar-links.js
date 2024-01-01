import { i18n } from '@/plugins/i18n'
const _t = i18n.global.t;

export default [
	{
		text: _t('Tableau de bord'),
		route: 'dashboard',
		icon: 'flaticon-layout',
	},
	{
		text: 'MAIN',
		divider: true,
	},
	{
		text: _t('Portfolio'),
		icon: 'fa fa-flask',
		submenu: [
			{
				text: _t('Configuration'),
				route: 'portfolio.config'
			},
			{
				text: _t('A propos'),
				route: 'portfolio.about'
			},
			{
				text: _t('Competences'),
				route: 'competences.index'
			},
			{
				text: _t('Education'),
				route: 'portfolio.education'
			},
			{
				text: _t('Experiences'),
				route: 'experiences.index'
			},
			{
				text: _t('Projets'),
				route: 'portfolio.project'
			},
			{
				text: _t('Services'),
				route: 'portfolio.services'
			},
		],
		
	},
	{
		text: _t('Curriculum Vitae'),
		route: 'cv',
		icon: 'fa fa-id-card',
	},
	{
		text: _t('Communaute'),
		divider: true,
	},
	{
		text: _t('Blog'),
		icon: 'fa fa-newspaper',
		submenu: [
			{
				text: _t('Categories'),
				route: 'blog.categories'
			},
			{
				text: _t('Articles'),
				route: 'blog.articles'
			},
		],
		
	},
	{
		text: _t('Communaute'),
		icon: 'flaticon-381-newspaper',
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
		text: _t('Visiteurs'),
		route: 'cv',
		icon: 'flaticon-user',
	},
	{
		text: _t('Configurations'),
		divider: true,
	},
	{
		text: _t('optimisation'),
		route: 'optimize',
		icon: 'fa fa-bolt',
	},
	{
		text: _t('Logs'),
		route: 'logs',
		icon: 'flaticon-381-list',
	},
	{
		text: _t('Parametres'),
		route: 'settings',
		icon: 'flaticon-admin',
	},
]
