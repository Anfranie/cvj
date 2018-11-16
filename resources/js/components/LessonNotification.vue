<template>
	<li class="nav-item dropdown">
		<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		<i class="fa fa-globe"></i> Notification <span class="badge badge-danger" id="count-notification">
		{{ lessons.length }}</span><span class="caret"></span>
		</a>
		<div class="dropdown-menu" aria-labelledby="navbarDropdown">
		
		<a class="dropdown-item" href="#" v-on:click="MarkAsRead(lesson)" v-for-key="lesson in lessons">
	
			{{ lesson.data['lesson']['title'] }} <b>{{ lesson.created_at | myOwnTime }}</b>
		</a>

		<div class="dropdown-divider"></div>

		<a class="dropdown-item" href="#" v-on:click="AllMarkAsRead()" v-if="lessons.length!=0">
			Read All Mark As Read
		</a>

		<!-- <div role="separator" class="dropdown-divider" v-if="lessons.length"></div> -->
		<a class="dropdown-item" href="#" v-if="lessons.length==0">
			No Notification
		</a>
		</div>
	</li>
</template>
<script>
	export default {
        props: ['lessons'],
        
        methods : {

            MarkAsRead: function(Lesson){

                var data = {

                    not_id : lesson.id,
                    lesson_id : lesson.data.lesson.id,

                };

                axios.post("/markAsRead", data).then(response =>{
                    window.location.href="/readLesson/" + data.lesson_id;
                });
                //alert(data.lesson_id);
                

			},
			
			AllMarkAsRead:function (){
				axios.post('/allMarkAsRead').then(response =>{

						window.location.href="/readAllLesson";

				});
			}

        }
	}
</script>