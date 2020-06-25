<?php include_once 'header.php'; ?>
<?php include_once 'menu.php'; ?>
<?php include_once 'api/create_article.php'; ?>


<form>
    <div class="form-group">
        <label for="exampleFormControlInput1">Titre</label>
        <input type="email" require class="form-control" id="exampleFormControlInput1" placeholder="Titre">
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Article</label>
        <textarea placeholder="Article" require class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <button type="submit" @click="createItem()" class="btn btn-primary">Submit</button>
</form>




<?php include_once 'footer.php'; ?>