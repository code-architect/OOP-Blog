<?php include('includes/header.php'); ?>
<?php if(!isLoggedIn()) : ?>

    <?php redirect('index.php', 'Only members are allowed on this page, please login.', 'error'); ?>

    <?php else : ?>

    <form role="form" enctype="multipart/form-data" method="post" action="create.php">

        <div class="form-group">
            <label for="name">Topic Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Topic Title">
        </div>
        <div class="form-group">
            <label>Category</label>
            <select class="form-control" name="category">
                <?php foreach(getCategories() as $category){ ?>
                    <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label>Topic Body</label>
            <textarea id="body" rows="10" cols="90" name="body" class="form_control"></textarea>
            <script>CKEDITOR.replace( 'body' )</script>
        </div>
        <button name="do_create" type="submit" class="btn btn-info">Submit Topic</button>

    </form>

<?php endif; ?>
<?php include('includes/footer.php') ?>