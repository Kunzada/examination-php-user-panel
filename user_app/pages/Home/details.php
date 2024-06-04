<div class="container">
  <section id="productdetails" class="section-p1">
    <div class="single-pro-image">
      <img src="/user/images/products/<?= htmlspecialchars($product->image_url) ?>" width="100%" id="MainImg" alt="">
      <div class="small-image-group">
        <div class="small-img-col">
          <img src="/user/images/products/<?= htmlspecialchars($product->image_url) ?>" width="100%" class="small-img" alt="">
        </div>
        <div class="small-img-col">
          <img src="/user/images/products/<?= htmlspecialchars($product->image_url) ?>" width="100%" class="small-img" alt="">
        </div>
        <div class="small-img-col">
          <img src="/user/images/products/<?= htmlspecialchars($product->image_url) ?>" width="100%" class="small-img" alt="">
        </div>
        <div class="small-img-col">
          <img src="/user/images/products/<?= htmlspecialchars($product->image_url) ?>" width="100%" class="small-img" alt="">
        </div>
      </div>
    </div>
    <div class="single-pro-details">
      <h6><?= htmlspecialchars($product->brand) ?></h6>
      <h4><?= htmlspecialchars($product->name) ?></h4>
      <h2><?= htmlspecialchars($product->price) - htmlspecialchars($product->discount) ?>.00 тг</h2> <del style="color: var(--sonic-silver)"><?= htmlspecialchars($product->price) ?> тг</del>
      <form action="" method="post">
      <input type="number" name="quantity" min="1"  style="margin: 40px 40px 40px 0;">
      <input type="text" name="product_id" value="<?= $product->id ?>" hidden>
      <button class="normal" type="submit">Add to Cart</button>
      </form>
      <h4>Product Details</h4>
      <span style="color: var(--sonic-silver)"><?= htmlspecialchars($product->description) ?>
      </span>
    </div>
  </section>
  <div class="product-main">

    <h2 class="title">Все товары</h2>

    <div class="product-grid">
              <?php foreach ($data['products'] as $product) : ?>

                <div class="showcase">

                  <div class="showcase-banner">
                
                  <img src="/user/images/products/<?= htmlspecialchars($product->image_url) ?>" alt="Mens Winter Leathers Jackets" width="300" class="product-img default">
                  <img src="/user/images/products/<?= htmlspecialchars($product->image_url) ?>" alt="Mens Winter Leathers Jackets" width="300" class="product-img hover">
                  
                  
                  <div class="showcase-actions">
                 
                    <form  method="post">
                    <input type="text" name="product_id" value="<?= htmlspecialchars($product->id)?>" hidden>

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


    <div class="comment">
      <h2 class="title">Комментарии</h2>
      <div class="container d-flex justify-content-center align-items-center height-vh">
        <div class="row d-flex justify-content-center">
          <div class="col-md-300;">
            <?php $hascomment = false;
            foreach ($data['comments'] as $comment) : ?>
              <?php if ($product->id == $comment->product_id) : ?>
                <?php if (!empty($comment->id)) : ?>
                  <?php $hascomment = true; ?>
                  <div class="d-flex flex-column  mb-5" id="comment-container">
                    <div class="bg-white">
                      <div class="flex-row d-flex">
                        <?php foreach ($data['users'] as $user) : ?>
                          <?php if ($user->id == $comment->user_id) : ?>
                            <img src="data:image/png;base64,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" width="40" class="rounded-circle">
                            <div class="d-flex flex-column justify-content-start ml-2">
                              <span class="d-block font-weight-bold name"><?= $user->username ?> <?= $user->surname ?></span>
                            </div>
                          <?php endif; ?>
                        <?php endforeach; ?>
                      </div>

                      <div class="d-flex flex-row align-items-center">
                        <?php for ($i = 0; $i < 5; $i++) : ?>
                          <?php if ($i < $comment->votes) : ?>
                            <ion-icon name="star" style="color: var(--sandy-brown)"></ion-icon>
                          <?php else : ?>
                            <ion-icon name="star-outline"></ion-icon>
                          <?php endif; ?>
                        <?php endfor ?>
                      </div>
                      <div class="mt-3">
                        <p class="comment-text"><?= $comment->description ?></p>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>
              <?php endif; ?>
            <?php endforeach; ?>
            <?php if (!$hascomment) : ?>
              <p>Нет комментариев</p>
            <?php endif; ?>

          </div>
        </div>
      </div>
    </div>


    <h2 class="title">Оставить отзыв</h2>
    <form method="post">
      <input type="hidden" name="product_id" value="<?= $product->id ?>" />      
      <input type="hidden" name="user_id" value="<?= $_SESSION["user"]->id ?>" />

      <div class="votes" style="margin: 10px">
        <input type="radio" id="star5" name="votes" value="5" />
        <label for="star5" title="text">5 stars</label>
        <input type="radio" id="star4" name="votes" value="4" />
        <label for="star4" title="text">4 stars</label>
        <input type="radio" id="star3" name="votes" value="3" />
        <label for="star3" title="text">3 stars</label>
        <input type="radio" id="star2" name="votes" value="2" />
        <label for="star2" title="text">2 stars</label>
        <input type="radio" id="star1" name="votes" value="1" />
        <label for="star1" title="text">1 stars</label>
      </div>
      <div class="form-group">


        <textarea name="description" placeholder="Напишите комментарий.." style="height:200px;width: 100% "></textarea>
      </div>


<button type="submit" style="margin-bottom: 25px">Отправить</button>
     
    </form>
  </div>
</div>

<!-- javascript script file code -->
<script>
  var mainImg = document.getElementById("MainImg");
  var smallImg = document.getElementsByClassName("small-img");
  smallImg[0].onclick = function() {
    mainImg.src = smallImg[0].src;
  }
  smallImg[1].onclick = function() {
    mainImg.src = smallImg[1].src;
  }
  smallImg[2].onclick = function() {
    mainImg.src = smallImg[2].src;
  }
  smallImg[3].onclick = function() {
    mainImg.src = smallImg[3].src;
  }
</script>

<!-- javascript script file link -->
<script src="script.js"></script>