import Vue from 'vue'
import VueRouter from 'vue-router'

import Users from './components/Users.vue'


Vue.use(VueRouter)
/* Rutas de acceso para el panel del menu */
const router = new VueRouter({
	routes: [
		{
			path: "/users",

			component: Users
		}
	],
	linkActiveClass: 'active' /* <---- proceso para que el menu quede selected activo */
})

export default router