<template>
    <card-component title="لیست کاربران">
        <div class="box-tool">
            <div class="btn-group pull-right">
                <router-link type="button" :to="{ name:'admin.dashboard' }" class="btn btn-sm primary pull-right">بازگشت</router-link>
                <router-link type="button" :to="{ name:'admin.users.create' }" class="btn btn-sm success">ایجاد</router-link>
            </div>
        </div>
        <!-- /.panel-heading -->
        <div class="box-body">
            <div class="table-responsive">
                <table class="table table-striped b-t">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>نام</th>
                        <th>ایمیل</th>
                        <th>تاریخ ایجاد</th>
                        <th>تاریخ بروزرسانی</th>
                        <th>عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-if="users === null">
                        <td colspan="6">
                            <h2>درحال خواندن اطلاعات...</h2>
                        </td>
                    </tr>
                    <tr v-else-if="users.data.length > 0" v-for="user in users.data">
                        <td>{{ user.id }}</td>
                        <td>{{ user.name }}</td>
                        <td>{{ user.email }}</td>
                        <td>{{ user.created_at }}</td>
                        <td>{{ user.last_update }}</td>
                        <td>
                            <div class="btn-group pull-right">
                                <router-link type="button" class="btn btn-sm info" :to="{name:'admin.users.show', params:{user_id:user.id}}"><i class="fa fa-eye"></i></router-link>
                                <router-link type="button" class="btn btn-sm warning" :to="{name:'admin.users.edit', params:{user_id:user.id}}"><i class="fa fa-pencil"></i></router-link>
                                <button type="button" class="btn btn-sm danger" @click.prevent="deleteUser(user)"><i class="fa fa-trash"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr v-else>
                        <td colspan="6">
                            <h3>هیچ کاربری در سیستم موجود نیست</h3>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- صفحه بندی پایین -->
            <ul v-if="users != null" class="pagination">
                <li v-for="page in users.last_page" :class="{active : users.current_page == page}"><router-link :to="{ name:'admin.users.index', query: { page } }">{{ page }}</router-link></li>
            </ul>
        </div>
    </card-component>
</template>

<script>
    export default {
        data() {
            return {
                users: null // list of users (with pagination info) . if this was null it mean list of users is on loading
            }
        },
        mounted() {
            document.title = "CRUD Example - Users"; // set page title
            this.loadUsers();
        },
        watch: {
            '$route.query'(newValue, oldValue) { // when user click's on pagination number list of users will refetch
                this.loadUsers();
            }
        },
        methods: {
            // load users
            loadUsers() {
                var self = this;
                this.users = null;
                axios.get("/api/users?page="+(this.$route.query.page ? this.$route.query.page : 1))
                    .then(function(res){
                        self.users = res.data;
                    })
                    .catch(function(error) {
                        alert("OOPS... something went wrong!");
                    });
            },
            // remove a user
            deleteUser(user) {
                if(confirm("Are you sure you want delete user '"+user.name+"'?")) {
                    var self = this;
                    axios.delete("/api/users/"+user.id).then(function(res){
                        alert("The user deleted successfully!");
                    })
                        .catch(function(error) {
                            alert("OOPS... something went wrong!");
                        }).then(function(){
                        self.loadUsers();
                    });
                }
            }
        },
    }
</script>
