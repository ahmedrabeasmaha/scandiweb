<div class="header">
  <div class="title">
    <h1>Product List</h1>
  </div>
  <div class="buttons">
    <a href="/add-product"><button class="margin-right fill add">ADD</button></a>
    <form action="/delete-product" method="post" id="delete-form" class="d-inline-block">
      <button id="delete-product-btn" for="delete-form" type="submit" class="fill mass">MASS DELETE</button>
    </form>
  </div>
</div>
<div class="line"></div>
<div class="list">
  <?= var_dump(__DIR__) ?>
  <?php foreach ($products as $product) { ?>
    <div class="box red">
      <input type="checkbox" class="delete-checkbox" id="delete-form" form="delete-form" name="<?= $product['sku'] ?>" />
      <h2>
        <?= $product['sku'] ?>
      </h2>
      <p><?= $product['name'] ?></p>
      <p>
        <?= $product['price'] ?> $
      </p>
      <p>
        <?= $product['value'] ?>
      </p>
    </div>
    <?php } ?>
</div>