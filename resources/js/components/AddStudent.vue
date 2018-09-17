<template>
    <div>
        <form>
            <div class="form-group">
                <label for="name" class="col-3">Имя</label>
                <input type="text" id="name" v-model="student.name" required>
            </div>
            <div class="form-group">
                <label for="surname" class="col-3">Фамилия</label>
                <input type="text" id="surname" v-model="student.surname" required>
            </div>
            <div class="form-group">
                <label for="group" class="col-3">Группа</label>
                <select v-model="student.group_id" id="group" required>
                    <option v-for="group in groups" v-bind:value="group.id">
                        {{ group.name}}
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label for="birthdate" class="col-3">Дата рождения</label>
                <datepicker  id="birthdate" required v-model="student.birthdate"></datepicker>
            </div>
            <div class="form-group">
                <label for="email" class="col-3">Email</label>
                <input type="email" id="email" v-model="student.email" required>
            </div>
            <input type="button" class="btn btn-success" value="Сохранить" v-on:click="save()">
        </form>
    </div>
</template>
<script>
    import Datepicker from 'vuejs-datepicker';
    import axios from 'axios';
    export default {
        data(){
            return{
                student:{
                    name:null,
                    surname:null,
                    group_id:null,
                    birthdate:null,
                    email:null,
                },
                groups:[]
            }
        },
        components:{
            Datepicker
        },
        created(){
          this.loadGroups();
        },
        methods:{
            loadGroups(){
                window.ttt = this;
                axios.get('/api/groups')
                    .then(response => {
                        this.groups = response.data;
                    })
            },
            save(){
                let student = this.student;
                let data = {
                    name: student.name,
                    surname: student.surname,
                    group_id: student.group_id,
                    birthdate: student.birthdate,
                    email: student.email
                };
                axios.post('/api/student/add',data) .then(response => {
                    if(response.data.status == true){
                        this.flash('Студент добавлен', 'success');
                        // location.href = '/#success';
                    }
                })
            }
        }
    }
</script>