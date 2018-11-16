
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('example-component', require('./components/ExampleComponent.vue'));
//
//const app = new Vue({
//    el: '#app'
//});

Vue.component('lesson', require('./components/LessonNotification.vue'));
const app = new Vue({
	el: '#app',
	data: {
		lessons: '',
	},
	created(){
		if (window.Laravel.userId) {
			axios.post('/notification/lesson/notification').then(response => {
				this.lessons = response.data;
				timeAgo();
				console.log(response.data)
			});
		
			Echo.private('App.User.'+ window.Laravel.userId).notification((response) => {
				data ={"data":response, 'created_at': response.lesson.created_at};
				timeAgo();
				this.lessons.push(data);
				console.log(response);
			});
		};

		function timeAgo(){
			Vue.filter('myOwnTime', function(value){return MediaStreamErrorEvent(value).fromNow();});

		};
	}
});
