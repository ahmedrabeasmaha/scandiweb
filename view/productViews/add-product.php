<div class="header">
  <div class="title">
    <h1>Product Add</h1>
  </div>
  <div class="buttons">
    <button class="margin-right fill add" type="submit" form="product_form">
      SAVE
    </button>
    <a href="/"><button class="fill mass">CANCEL</button></a>
  </div>
</div>
<div class="line"></div>
<?php if (!empty($errors)) { ?>
  <div class="validation container">
    <?php foreach ($errors as $error) { ?>
      <div class="container">
        <?= $error ?>
      </div>
      <?php } ?>
  </div>
<?php } ?>
<form method="post" id="product_form">
  <div class="container">
    <div class="input-container">
      <label for="sku" class="input-label">SKU</label>
      <input type="text" name="sku" id="sku" class="form-field" value="<?= $product->data['sku'] ?? "" ?>" required />
    </div>
    <div class="container">
      <p id="skuError"></p>
    </div>
    <div class="input-container">
      <label for="name" class="input-label">Name</label>
      <input type="text" name="name" id="name" class="form-field" value="<?= $product->data['name'] ?? "" ?>"
        required />
    </div>
    <div class="input-container">
      <label for="price" class="input-label">Price ($)</label>
      <input type="number" name="price" id="price" class="form-field" value="<?= $product->data['price'] ?? "" ?>"
        required />
    </div>
    <div class="input-container">
      <label for="switcher" class="input-label">Type Switcher</label>
      <select id="productType" name="type" class="form-field" value="<?= $product->data['type'] ?? "" ?>" required>
        <option value="DVD" <?php if ($product->data['type'] == "DVD") {
        echo "selected";
      } ?>>DVD</option>
        <option value="Book" <?php if ($product->data['type'] == "Book") {
        echo "selected";
      } ?>>Book</option>
        <option value="Furniture" <?php if ($product->data['type'] == "Furniture") {
        echo "selected";
      } ?>>Furniture
        </option>
      </select>
    </div>
  </div>
  <div class="container">
    <fieldset disabled id="DVD" hidden>
      <div class="input-container">
        <label for="size" class="input-label">Size (MB)</label>
        <input type="number" name="size" id="size" class="form-field" value="<?= $product->data['size'] ?? "" ?>"
          required />
      </div>
      <div>
        <h3>Please, provide weight</h3>
      </div>
    </fieldset>

    <fieldset disabled id="Furniture" hidden>
      <div class="input-container">
        <label for="height" class="input-label">Height (CM)</label>
        <input type="number" id="height" name="height" value="<?= $product->data['height'] ?? "" ?>" class="form-field"
          required />
      </div>
      <div class="input-container">
        <label for="width" class="input-label">Width (CM)</label>
        <input type="number" id="width" name="width" value="<?= $product->data['width'] ?? "" ?>" class="form-field"
          required />
      </div>
      <div class="input-container">
        <label for="lengrh" class="input-label">Length (CM)</label>
        <input type="number" id="length" name="length" value="<?= $product->data['length'] ?? "" ?>" class="form-field"
          required />
      </div>
      <div>
        <h3>Please, provide dimensions</h3>
      </div>
    </fieldset>
    <fieldset disabled id="Book" hidden>
      <div class="input-container">
        <label for="weight" class="input-label">Weight (KG)</label>
        <input type="number" id="weight" name="weight" value="<?= $product->data['weight'] ?? "" ?>" class="form-field"
          required />
      </div>
      <div>
        <h3>Please, provide weight</h3>
      </div>
    </fieldset>
  </div>
</form>