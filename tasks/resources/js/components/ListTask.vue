<template id = "task-list">
    <div class ="row">
        <router-link class="bth btn-outline-primary">
            Добавить задание
        </router-link>

        <div v-for="(task,index) in filteredTask">
            <div>{{index+1}}</div>
            <div>{{task.title}}</div>
            <div>{{task.descr}}</div>
            <div>{{task.status}}</div>
            <router-link class="bth btn-outline-primary" v-bind:to="{name: 'EditTask', params: {id:task.id}}">Редактировать</router-link>
        </div>
    </div>


</template>

<script>
    export default {
        data:function () {
            return{ tasks:''};

        },
        created:function () {
            let url ='http://127.0.0.1:8000/tasks/';
            Axios.get(url).then((response)=>{
                this.tasks = response.data;
            });

        },
        computed:{
            filteredTask: function () {
                if(this.tasks.length){
                    return this.tasks
                }

            }

        }

    }
</script>

