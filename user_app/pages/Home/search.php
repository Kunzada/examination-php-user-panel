<main>
    <div class="product-container">

        <div class="container">

            <div class="product-box">

                <div class="product-main">

                    <h2 class="title">Все Товары</h2>

                    <div class="product-grid">
                        <?php foreach ($data['products'] as $product) : ?>

                            <div class="showcase">

                                <div class="showcase-banner">

                                    <img src="/user/images/products/<?= htmlspecialchars($product->image_url) ?>" alt="Mens Winter Leathers Jackets" width="300" class="product-img default">
                                    <img src="/user/images/products/<?= htmlspecialchars($product->image_url) ?>" alt="Mens Winter Leathers Jackets" width="300" class="product-img hover">


                                    <div class="showcase-actions">

                                        <form method="post">
                                            <input type="text" name="product_id" value="<?= htmlspecialchars($product->id) ?>" hidden>

                                            <button type="submit" class="btn-action">

                                                <ion-icon name="heart-outline"></ion-icon>
                                            </button>
                                        </form>

                                        <button class="btn-action">
                                            <a href="../../user/home/id<?= htmlspecialchars($product->id) ?>">
                                                <ion-icon name="eye-outline"></ion-icon>
                                            </a>
                                        </button>



                                    </div>
                                </div>

                                <div class="showcase-content">

                                    <a href="#" class="showcase-category"><?= htmlspecialchars($product->name) ?></a>

                                    <a href="#">
                                        <h3 class="showcase-title"><?= htmlspecialchars($product->brand) ?></h3>
                                    </a>

                                    <div class="showcase-rating">
                                        <ion-icon name="star"></ion-icon>
                                        <ion-icon name="star"></ion-icon>
                                        <ion-icon name="star"></ion-icon>
                                        <ion-icon name="star-outline"></ion-icon>
                                        <ion-icon name="star-outline"></ion-icon>
                                    </div>

                                    <div class="price-box">
                                        <p class="price"><?= htmlspecialchars($product->price) - htmlspecialchars($product->discount) ?> тг</p>
                                        <del><?= htmlspecialchars($product->price) ?> тг</del>
                                    </div>

                                </div>

                            </div>
                        <?php endforeach ?>
                    </div>


                </div>

            </div>

        </div>

    </div>



</main>

<script src="/user/js/script.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>