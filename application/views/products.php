<?php if($this->session->flashdata('registered')) : ?>
    <div class="alert alert-success">
        <?php echo $this->session->flashdata('registered') ; ?>
    </div>
<?php endif;?>

<?php if($this->session->flashdata('pass_login')) : ?>
    <div class="alert alert-success">
        <?php echo $this->session->flashdata('pass_login') ; ?>
    </div>
<?php endif;?>

<?php if($this->session->flashdata('fail_login')) : ?>
    <div class="alert alert-danger">
        <?php echo $this->session->flashdata('fail_login') ; ?>
    </div>
<?php endif;?>
<?php foreach ($products as $product) : ?>
    <div class="col-md-4 book">
        <div class="book-price"><?php echo $product->price;?></div>
        <a href="<?php echo base_url();?>products/details/<?php echo $product->id; ?>">
            <img src="<?php echo base_url();?>assets/images/products/<?php echo $product->image;?>" />
        </a>
        <div class="book-title">
            <? echo $product->title; ?>
        </div>
        <div class="book-add">
            <form method="post" action="<?php echo base_url(); ?>cart/add">
                QTY: <input class="qty"  type="number" min="1" name="qty" value="1" />
                <input type="hidden" name="item_number" value="<?php echo $product->id; ?>" />
                <input type="hidden" name="price" value="<?php echo $product->price; ?>" />
                <input type="hidden" name="title" value="<?php echo $product->title; ?>" />
                <button class="btn btn-primary" type="submit">Add To Cart</button>
            </form>
        </div>
    </div>
<?php endforeach ; ?>