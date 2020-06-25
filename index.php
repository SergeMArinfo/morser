<?php include_once 'header.php'; ?>
<?php include_once 'menu.php'; ?>

<div class="container">
    <div id='vueapp' class="row">

        <div v-for='article in articles'>
            <div class="card" style="width: 20rem;">
                <img src="https://picsum.photos/seed/picsum/318/318" class="card-img-top" alt="img">
                <div class="card-body">
                    <h5 class="card-title">{{ article.titre_item }}</h5>
                    <p class="card-text">{{ article.article_item }}</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>

    </div>

</div>





<script>
    var app = new Vue({
        el: '#vueapp',
        data: {
            id_items: '',
            id_user: '',
            titre_item: '',
            article_item: '',
            img_item: '',
            articles: []
        },
        mounted: function() {
            console.log('Hello from Vue!')
            this.getArticles()
        },

        methods: {
            getArticles: function() {
                axios.get('api/liste_article.php')
                    .then(function(response) {
                        console.log(response.data);
                        app.articles = response.data;
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
            }
            // createContact: function() {},
            // resetForm: function() {}
        }
    })
</script>




<?php include_once 'footer.php'; ?>