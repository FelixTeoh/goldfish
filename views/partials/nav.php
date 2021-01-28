<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand">【﻿ＧＯＬＤＦＩＳＨ】</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link glow" href="/">
🏠 Home</a>

        <?php if(isset($_SESSION["user_details"]) && $_SESSION["user_details"]["isAdmin"]): ?>
          <a class="nav-link glow" href="/views/transactions.php">🧾 User's Transactions</a>
          <a class="nav-link glow" href="/controllers/auth/logout.php">Logout</a>

        <?php elseif(isset($_SESSION["user_details"]) && !$_SESSION["user_details"]["isAdmin"]): ?>
          <a class="nav-link glow" href="/views/cart.php">
            🛒 Cart
            <span class="badge bg-primary" id="cart_count">
              <?php if(isset($_SESSION['cart']) && count($_SESSION['cart'])): ?>
              <?php echo array_sum($_SESSION['cart']) ?>
              <?php else: ?>
                0
              <?php endif; ?>
            </span>
          </a>
          <a class="nav-link glow" href="/views/my_transaction.php">🧾 My Transaction</a>
          <a class="nav-link glow" href="/controllers/auth/logout.php">Logout</a>

        <?php else: ?>
          <a class="nav-link glow" href="/views/forms/register.php">Register</a>
          <a class="nav-link glow" href="/views/forms/login.php">Login</a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</nav>