<?php include_once 'header.php'; ?>
<?php include_once 'menu.php'; ?>
<?php // include_once 'api/login.php'; pour les tests php?>


<form method="POST" action="login.php" id='login'>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" name="email" v-model="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="password" v-model="password" class="form-control" id="exampleInputPassword1">
    </div>
    <button type="button" @click="login()" class="btn btn-primary">Submit</button>
</form>

<?php
echo @$_SESSION["id_user"];
?>


<script>
    var app = new Vue({
        el: '#login',
        data: {
            password: '',
            email: '',
            contacts: []
        },

        mounted: function() {
            console.log('Hello from Vue!')
            // this.resetForm()
        },

        methods: {

            login: function() {
                console.log("Create contact!")

                let formData = new FormData();
                console.log("email:", this.email)
                console.log("password:", this.password)
                formData.append('email', this.email)
                formData.append('password', this.password)


                var contact = {};
                formData.forEach(function(value, key) {
                    contact[key] = value;
                });

                axios({
                        method: 'post',
                        url: 'api/login.php',
                        data: formData,
                        config: {
                            headers: {
                                'Content-Type': 'multipart/form-data'
                            }
                        }
                    })
                    .then(function(response) {
                        //handle success
                        console.log(response)
                        app.contacts.push(contact)
                        app.resetForm();
                    })
                    .catch(function(response) {
                        //handle error
                        console.log(response)
                    });
            },
            resetForm: function() {
                this.email = '';
                this.password = '';
            }
        }
    })
</script>



<?php include_once 'footer.php'; ?>