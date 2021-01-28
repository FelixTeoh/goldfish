<?php  
	$title = "Catalog";
	function get_content() {
	require_once 'controllers/connection.php';

  $products_query = "SELECT * FROM products";
  $product_stmt = $cn->prepare($products_query);
  $product_stmt->execute();
  $products_result = $product_stmt->get_result();
  $products = $products_result->fetch_all(MYSQLI_ASSOC);
?>

<!-- Carousel Slider -->
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <ol class="carousel-indicators">
    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
		<h1>GoldFish Breeds</h1>
    </div>
    <div class="carousel-item">
    	<h1>GoldFish Products</h1>
    </div>
    <div class="carousel-item">
    	<h1>Environment</h1>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </a>
</div>

<section>
<div class="led-body">
	<marquee>
   <div class="wavy"> 
          <span style="--i:1">🐠</span> 
          <span style="--i:2"> </span> 
          <span style="--i:3">W</span> 
          <span style="--i:4">E</span> 
          <span style="--i:5">L</span> 
          <span style="--i:6">C</span> 
          <span style="--i:7">O</span> 
          <span style="--i:8">M</span> 
          <span style="--i:9">E</span> 
          <span style="--i:10"> </span> 
          <span style="--i:11">T</span> 
          <span style="--i:12">O</span> 
          <span style="--i:13"> </span> 
          <span style="--i:14">G</span> 
          <span style="--i:15">O</span> 
          <span style="--i:16">L</span> 
          <span style="--i:17">D</span> 
          <span style="--i:18"> </span> 
          <span style="--i:19">F</span> 
          <span style="--i:20">I</span> 
          <span style="--i:21">S</span> 
          <span style="--i:22">H</span> 
          <span style="--i:23"> </span> 
          <span style="--i:24">A</span> 
          <span style="--i:25">P</span> 
          <span style="--i:26">P</span> 
          <span style="--i:27"> </span> 
          <span style="--i:28">🐠</span> 
      </div>  
  </marquee>
</div><br>
</section>


<div class="container">
  <?php if(isset($_SESSION["user_details"]) && $_SESSION["user_details"]["isAdmin"]): ?>
<h2 class="text-center p-h2">ADD PRODUCTS</h2>
  <form class="py-5 col-md-6 mx-auto needs-validation" method="POST" action="/controllers/products/add_product.php" enctype="multipart/form-data" novalidate>
    <div class="mb-3">
      <label>Name</label>
      <input type="text" name="product_name" class="form-control" required>
      <div class="form-group lr-1">
      <div class="valid-feedback">
          Looks good!
      </div>
      <div class="invalid-feedback">
          Please Enter First Name!
      </div>
      </div>
    </div>
    <div class="mb-3">
      <label>Price</label>
      <input type="number" name="price" class="form-control" required>
      <div class="form-group lr-1">
      <div class="valid-feedback">
          Looks good!
      </div>
      <div class="invalid-feedback">
          Please Enter First Name!
      </div>
      </div>
    </div>
    <div class="mb-3">
      <label>Image</label>
      <input type="file" name="image" class="form-control" required>
      <div class="form-group lr-1">
      <div class="valid-feedback">
          Looks good!
      </div>
      <div class="invalid-feedback">
          Please Enter First Name!
      </div>
      </div>
    </div>
    <div class='mb-3'>
      <label>Description</label>
      <textarea class="form-control" name="description" rows="5" required></textarea>
      <div class="form-group lr-1">
      <div class="valid-feedback">
          Looks good!
      </div>
      <div class="invalid-feedback">
          Please Enter First Name!
      </div>
      </div>
    </div>
    <button class="btn btn-success">Add Product</button>
  </form>
  <?php endif; ?>

<!-- GoldFish Environment -->
<?php if(isset($_SESSION["user_details"]) && !$_SESSION["user_details"]["isAdmin"]): ?>
<h2 class="text-center p-h2">🌍 ENVIRONMENT</h2>
<br><br>

<section class="testimony py-4">
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-md-7 p-0">
                <img src="assets/img/1200px-Amaterske_akvarium.jpg" class="img-fluid w-100" data-aos="flip-right">
            </div>
            <div class="col-md-5 d-flex align-items-center" data-aos="fade-left">
                <div class="quote-box rounded p-5">
                    <i>“</i>
                    <p class="p-5">
                         Considering some goldfish can grow to be over a foot long, the more space they have, the better. We recommend our 20-gallon aquarium, or at the very least our Tetra 10-gallon tank.
                    </p>
                    <small class="d-block">ADVICES</small>
                    <i>”</i>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Fish Breed -->
  <h2 class="text-center p-h2">🐠 BREEDS</h2>
  <br><br>

  <div class="row row-cols-1 row-cols-md-3 g-4">
    <div class="col" style="margin-bottom: 50px;">
      <div class="card h-100 shadow zoom">
        <img src="assets/img/473e8992bf0f589523ebbf42aad20e12-500x500.jpg" class="card-img-top imgcard" alt="...">
        <div class="card-body">
          <a href="https://en.wikipedia.org/wiki/Telescope_(goldfish)#Black_Telescope"><h5 class="card-title text-center">Black Moor</h5></a>
          <p class="card-text">Unlike other fancy goldfish types, this breed is extremely enduring and can make good pets for new fishkeepers.</p>
        </div>
      </div>
    </div>
    <div class="col" style="margin-bottom: 50px;">
      <div class="card h-100 shadow zoom">
        <img src="assets/img/247700_504318626288523_1172390841_n.jpg" class="card-img-top imgcard" alt="...">
        <div class="card-body">
          <a href="https://en.wikipedia.org/wiki/Bubble_Eye"><h5 class="card-title text-center">BubbleEye</h5></a>
          <p class="card-text">One of the most fragile goldfish types and probably the slowest swimmers..</p>
        </div>
      </div>
    </div>
    <div class="col" style="margin-bottom: 50px;">
      <div class="card h-100 shadow zoom">
        <img src="assets/img/edf68c32dc05a556e48c7a1839dc7d42.jpg" class="card-img-top imgcard" alt="...">
        <div class="card-body">
          <a href="https://en.wikipedia.org/wiki/Celestial_Eye"><h5 class="card-title text-center">Celestial</h5></a>
          <p class="card-text">Nicknamed “stargazers” because their eyes are locked upward.</p>
        </div>
      </div>
    </div>
  </div> 

  <div class="row row-cols-1 row-cols-md-3 g-4">
    <div class="col" style="margin-bottom: 50px;">
      <div class="card h-100 shadow zoom">
        <img src="assets/img/black-comet-goldfish-carassius-auratus-x-1.jpg" class="card-img-top imgcard" alt="...">
        <div class="card-body">
          <a href="https://en.wikipedia.org/wiki/Comet_(goldfish)"><h5 class="card-title text-center">Comet</h5></a>
          <p class="card-text">Bred in the United States, the Comet goldfish is more playful and active than most other goldfish breeds.</p>
        </div>
      </div>
    </div>
    <div class="col" style="margin-bottom: 50px;">
      <div class="card h-100 shadow zoom">
        <img src="assets/img/Fancy-Red-Fantail-Goldfish.jpg" class="card-img-top imgcard" alt="...">
        <div class="card-body">
          <a href="https://en.wikipedia.org/wiki/Fantail_(goldfish)"><h5 class="card-title text-center">Fantail</h5></a>
          <p class="card-text">One of the hardiest fancy varieties, Fantail goldfish are recognizable for their split caudal fin.</p>
        </div>
      </div>
    </div>
    <div class="col" style="margin-bottom: 50px;">
      <div class="card h-100 shadow zoom">
        <img src="assets/img/ranchu_chinese_goldfish_1200x821.jpg" class="card-img-top imgcard" alt="...">
        <div class="card-body">
          <a href="https://en.wikipedia.org/wiki/Lionhead_(goldfish)"><h5 class="card-title text-center">LionHead</h5></a>
          <p class="card-text">Lacking a fin on their back (dorsal fin), Lionheads swim very slowly.</p>
        </div>
      </div>
    </div>
  </div>  

  <div class="row row-cols-1 row-cols-md-3 g-4">
    <div class="col" style="margin-bottom: 50px;">
      <div class="card h-100 shadow zoom">
        <img src="assets/img/e921c84e955647ebb5a253cbc533058a.jpg" class="card-img-top imgcard" alt="...">
        <div class="card-body">
          <a href="https://en.wikipedia.org/wiki/Oranda"><h5 class="card-title text-center">Oranda</h5></a>
          <p class="card-text">Like Lionheads, Orandas also have unique head growth called “wen.”</p>
        </div>
      </div>
    </div>
    <div class="col" style="margin-bottom: 50px;">
      <div class="card h-100 shadow zoom">
        <img src="assets/img/7c0a24d053475c00171fa9db2a9c6e04.jpg" class="card-img-top imgcard" alt="...">
        <div class="card-body">
          <a href="https://en.wikipedia.org/wiki/Ryukin"><h5 class="card-title text-center">Ryukin</h5></a>
          <p class="card-text">These fish are hardy and a good choice for beginners. Ryukins are known for the large hump behind their heads.</p>
        </div>
      </div>
    </div>
    <div class="col" style="margin-bottom: 50px;">
      <div class="card h-100 shadow zoom">
        <img src="assets/img/52483ee7e2da1018770cdd590909ee8e.jpg" class="card-img-top imgcard" alt="...">
        <div class="card-body">
          <a href="https://en.wikipedia.org/wiki/Shubunkin"><h5 class="card-title text-center">Shubunkin</h5></a>
          <p class="card-text">Known for their calico pattern, Shubunkins are very resilient and make a good first pet for new fish owners.</p>
        </div>
      </div>
    </div>
  </div>    

  <div class="row row-cols-1 row-cols-md-2 g-4">
    <div class="col" style="margin-bottom: 50px;">
      <div class="card h-100 shadow zoom">
        <img src="assets/img/52483ee7e2da1018770cdd590909ee8e.jpg" class="card-img-top imgcard" alt="...">
        <div class="card-body">
          <a href="https://en.wikipedia.org/wiki/Telescope_(goldfish)"><h5 class="card-title text-center">Telescope</h5></a>
          <p class="card-text">Aptly named for their protruding eyes. Be careful with sharp decorations.</p>
        </div>
      </div>
    </div>
    <div class="col" style="margin-bottom: 50px;">
      <div class="card h-100 shadow zoom">
        <img src="assets/img/Veiltail_Goldfish.jpg" class="card-img-top imgcard" alt="...">
        <div class="card-body">
          <a href="https://en.wikipedia.org/wiki/Veiltail"><h5 class="card-title text-center">Veiltail</h5></a>
          <p class="card-text">Gorgeous, delicate and can be rather rare.</p>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>



<!-- Shop Slot -->  
  <h2 class="text-center p-h2">🛒 SHOP</h2>
  <br>

  <div class="row">
    <?php foreach($products as $product): ?>
      <div class="col-md-6">
        <div class="card shadow">
          <img src="<?php echo $product['image'] ?>" class="card-img-top card-img">
          <div class="card-body bg-dark text-white">
            <a href="/views/product_details.php?id=<?php echo $product['product_id']?>"><h5 class="card-title"><?php echo $product["name"] ?></h5></a>
            <p class="card-text"><?php echo $product['description'] ?></p>
            <strong>RM <?php echo $product['price'] ?></strong>
          </div>
          <?php if(isset($_SESSION["user_details"]) && !$_SESSION["user_details"]["isAdmin"]): ?>
          <div class="card-footer">
            <div class="input-group">
              <input type="number" name="quantity" class="form-control" min="1">
              <button class="btn btn-outline-success add-to-cart" data-id="<?php echo $product['product_id'] ?>">Add to Cart</button>
            </div>
          </div>
          <?php endif; ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div><br><br>

<script type="text/javascript">
  let addToCartButtons = document.querySelectorAll('.add-to-cart');
  addToCartButtons.forEach((indiv_button, i) => {
    indiv_button.addEventListener('click', () => {
      let id = indiv_button.getAttribute("data-id")
      let quantity = indiv_button.previousElementSibling.value

      let formBody = new FormData;
      formBody.append('id', id);
      formBody.append('quantity', quantity);


      fetch("controllers/cart/add_to_cart.php", {
        method: "POST",
        body: formBody
      })
      .then(res => res.text())
      .then(data => {
        let cartCount = document.getElementById('cart_count')
        if(cartCount.innerHTML != "") {
          cartCount.innerHTML = parseInt(cartCount.innerHTML) + parseInt(quantity);
        } else {
          cartCount.innerHTML = parseInt(quantity);
        }
      })
    })
  })

</script>

<?php  
	}
	require_once 'views/partials/layout.php';
?>