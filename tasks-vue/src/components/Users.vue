<template>
    <div class ="table-responsive">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">ФИО</th>
                <th scope="col">Фото</th>
                <th scope="col">Редактировать</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="us in users" :key="us.id">
                <th scope="row">{{us.id}}</th>
                <th scope="row"><router-link :to="{name: 'user'}">{{us.name}}</router-link></th>
                <td >{{us.img}}</td>

                <td><router-link :to ="{name:'edit', params:{id: us.id}}">Редактировать</router-link>|<a href="#" @click="deleteUser(us.id)">Удалить</a></td>

            </tr>
            </tbody>
        </table>



    </div>
</template>

<script>
    import axios from 'axios'

    export default {
       data(){
           return{
               users:[]
           }
       },
        created() {
           this.getUsers();
        },
        methods:{
           getUsers(){
               axios.get('http://127.0.0.1:8000/api/users').then(response=>response.data)
                   .then( data=>{
                       this.users= data.data;
                       });
           },
           deleteUser(id){
               if(confirm("Вы хотите удалить запись" + id)){
                   axios.delete('http://127.0.0.1:8000/api/users/'+id).then(response=>response.data)

                       .then( data=>{
                           console.log(data)

                           alert("Запись удалена")
                           location.reload()
                       });

               }
           }

        }
    }
</script>

<style scoped>

</style>