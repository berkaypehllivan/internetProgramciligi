<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link" data-widget="pushmenu" href="#" role="button">
      <i class="fas fa-bars"></i>
    </a>
  </li>

  <?php
  // Mevcut URI'yı al
  $current_uri = uri_string();

  // Menü öğeleri ve etiketlerini belirleyin
  $menu_items = [
    'Product_Category' => 'Ürünler',
    'branches' => 'Şubeler',
    'brands' => 'Markalar',
    'users' => 'Kullanıcılar',
    'Login' => 'Çıkış Yap',
  ];

  foreach ($menu_items as $uri => $label) {
    // Eğer mevcut URI bu bağlantıyla eşleşiyorsa 'active' sınıfını ekle
    $active_class = ($current_uri == $uri) ? ' active' : '';

    echo '<li class="nav-item d-none d-sm-inline-block' . $active_class . '">';
    echo '<a href="' . base_url($uri) . '" class="nav-link">' . $label . '</a>';
    echo '</li>';
  }
  ?>
</ul>
</nav>