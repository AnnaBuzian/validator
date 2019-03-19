<template>
    <div>
        <div class="form-group">
            <router-link :to="{name: 'createAnswer'}" class="btn btn-success">{{trans('admin.createAnswer')}}</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">{{trans('admin.answersList')}}</div>
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>{{trans('admin.answer')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="answer, index in answers">
                        <td>{{ answer.answer }}</td>
                        <td>
                            <router-link :to="{name: 'editAnswer', params: {id: answer.id}}" class="btn btn-xs btn-default">
                                {{trans('admin.edit')}}
                            </router-link>
                            <a href="#"
                               class="btn btn-xs btn-danger"
                               v-on:click="deleteEntry(answer.id, index)">
                                {{trans('admin.delete')}}
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                answers: []
            }
        },
        mounted() {
            var app = this;
            axios.get('/api/v1/answers')
                .then(function (resp) {
                    app.answers = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Не удалось загрузить список ответов");
                });
        },
        methods: {
            deleteEntry(id, index) {
                if (confirm("Вы действительно хотите удалить ответ?")) {
                    var app = this;
                    axios.delete('/api/v1/answers/' + id)
                        .then(function (resp) {
                            app.companies.splice(index, 1);
                        })
                        .catch(function (resp) {
                            alert("Не удалось удалить ответ");
                        });
                }
            }
        }
    }
</script>