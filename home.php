<?php
// Get the 4 most recently added products
$stmt = $pdo->prepare('SELECT * FROM products ORDER BY date_added DESC LIMIT 4');
$stmt->execute();
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?=template_header('Home')?>

<div class="featured">

<div>
    <button id="btn-1">1</button>
    <button id="btn-2">2</button>
    <button id="btn-3">3</button>
</div>
<script >
    
let btn1 = document.querySelector('#btn-1');
let btn2 = document.querySelector('#btn-2');
let btn3 = document.querySelector('#btn-3');

btn1.addEventListener('click', () =>{
    document.body.style.backgroundImage = "url(imgs/silver.jpg)";
})

btn2.addEventListener('click', () =>{
    document.body.style.backgroundImage = "url(imgs/leather.jpg)";
})

btn3.addEventListener('click', () =>{
    document.body.style.backgroundImage = "url(imgs/tan.jpg)";
})
</script>





    <h2>Premium Shirts</h2>
    <p>Best in-class material at affordable prices</p>
</div>
<div class="recentlyadded content-wrapper">
    <h2>Recently Added Products</h2>
    <div class="products">
        <?php foreach ($recently_added_products as $product): ?>
        <a href="index.php?page=product&id=<?=$product['id']?>" class="product">
            <img src="imgs/<?=$product['img']?>" width="200" height="200" alt="<?=$product['name']?>">
            <span class="name"><?=$product['name']?></span>
            <span class="price">
                &dollar;<?=$product['price']?>
                <?php if ($product['rrp'] > 0): ?>
                <span class="rrp">&dollar;<?=$product['rrp']?></span>
                <?php endif; ?>
            </span>
        </a>
        <?php endforeach; ?>
    </div>
</div>

<?=template_footer()?>
