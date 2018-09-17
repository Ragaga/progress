<template>
    <div>
        <table>
            <thead>
            <tr>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Группа</th>
                <th>Дата рождения</th>
                <th>Email</th>
                <th>IP регистрации</th>
                <th>Время регистрации</th>
                <th>Предметы</th>
                <th>Средний бал</th>
                <th>Характеристика науч.рука</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="student in students">
                    <td>{{ student.name }}</td>
                    <td>{{ student.surname }}</td>
                    <td>{{ student.group }}</td>
                    <td>{{ student.birthdate }}</td>
                    <td>{{ student.email }}</td>
                    <td>{{ student.registration_ip }}</td>
                    <td>{{ student.registration_time }}</td>
                    <td>
                        <div v-for="subject in student.subjects">
                            {{subject.name}}: {{ subject.grades }}
                        </div>
                    </td>
                    <td>{{ student.average_grade }}</td>
                    <td>{{ student.advisor_review }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
    import Datepicker from 'vuejs-datepicker';
    import axios from 'axios';

    export default {
        data() {
            return {
                students: [],
            }
        },
        created() {
            this.loadStudents();
        },
        methods: {
            loadStudents() {
                axios.get('/api/student/get-list')
                    .then(response => {
                        console.log(response)
                        this.students = response.data;
                    })
            }
        }
    }
</script>