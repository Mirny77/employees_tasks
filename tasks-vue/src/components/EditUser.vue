<template>
    <div>
        <h3>Редактировать сотрудника</h3>
        <div class="col-8 offset-2">
            <form @submit.prevent="updateUser" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">ФИО</label>
                    <input type="text" id="name" class="form-control" v-model="user.name" placeholder="ФИО">


                    <!--                     <div class="form-group">Фото:-->
                    <!--                     <input type = "file" name="img" v-model="user.img">-->
                    <!--                        </div>-->

                    <div class="form-group">
                        <label for="tasks">Задачи</label>
                        <input type="text" id="tasks" class="form-control" v-model="user.tasks_list" placeholder="Задачи">
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
        created() {
          let url=`http://127.0.0.1:8000/api/users/${this.$route.params.id}/edit`;
          axios.get(url).then(response=>{
              console.log(response)
              this.user=response.data;
          })
        },
        methods:{
            updateUser(){
                let url =`http://127.0.0.1:8000/api/users/${this.$route.params.id}`
                axios.put(url, this.user).then(response=>{
                    this.$router.push('/')
                    console.log(response)
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>

