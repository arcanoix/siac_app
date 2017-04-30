import VueRouter from 'vue-router';

let routes = [
		{
			path:'/Example',
			component:require('./components/Example')
		}

];

export default new VueRouter({
    //mode:'history',
    base: __dirname,
    routes,
    linkActiveClass: 'active'
});

