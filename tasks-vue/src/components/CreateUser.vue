<template>
    <div>
        <h3>Создать сотрудника</h3>
        <div class="col-8 offset-2">
            <form @submit.prevent="createUser" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">ФИО</label>
                    <input type="text" name="name" class="form-control" v-model="user.name" placeholder="ФИО">


                 <input type="file" id="img" ref="file" v-on:change="handleFileUpload()"/>

                    <div class="form-group">
                        <label for="tasks">Задачи</label>
                        <input type="text" id="tasks" class="form-control" v-model="user.tasks" placeholder="Задачи">
                    </div>
                    <button type="submit" class="btn-outline-success">Сохранить</button>


                </div>
            </form>
        </div>

    </div>
</template>

<script>
    import axios from 'axios';
    export default {
       data(){
           return{
               user:{}
           }
       },
        methods:{
           createUser(){
               let formData = new FormData();
               formData.append('file', this.file);
               axios.post('http://127.0.0.1:8000/api/users', this.user,formData, {
                   headers: {
                       'Content-Type': 'multipart/form-data'
                   }
               }).then(response=>{
                   this.$router.push('/')
                   console.log(response)
               }).catch(error=>{
                   console.log(error)
               })

           },
            handleFileUpload(){
                this.file = this.$refs.file.files[0];
            },

        }
    }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
