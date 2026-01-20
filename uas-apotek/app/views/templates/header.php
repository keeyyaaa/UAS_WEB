<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman <?= $data['judul']; ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --pastel-green: #A8E6CF;  /* Hijau Mint */
            --dark-green: #3B7A57;    /* Hijau Hutan */
            --pastel-pink: #FFD3B6;   /* Aksen Peach */
            --bg-cream: #FFFDF5;      /* Background Cream */
        }

        body { 
            background-color: var(--bg-cream); 
            font-family: 'Quicksand', sans-serif;
            color: #555;
        }

        .navbar-custom {
            background-color: var(--pastel-green);
            box-shadow: 0 4px 15px rgba(168, 230, 207, 0.4);
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
            padding: 15px 0;
        }

        .navbar-brand {
            color: var(--dark-green) !important;
            font-weight: 800;
            font-size: 1.5rem;
        }

        .nav-link {
            color: var(--dark-green) !important;
            font-weight: 600;
            margin: 0 10px;
        }
        
        .nav-link:hover {
            background-color: white;
            border-radius: 20px;
            color: var(--pastel-green) !important;
        }

        .btn-custom-add {
            background-color: var(--pastel-green);
            color: var(--dark-green);
            font-weight: bold;
            border-radius: 50px;
            border: 2px solid var(--dark-green);
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-custom mb-5 sticky-top">
  <div class="container">
    <a class="navbar-brand" href="<?= BASEURL; ?>">🌱 APOTEK CERIA</a>
    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        
        <?php if( !isset($_SESSION['login']) ) : ?>
            
            <li class="nav-item">
                <a class="nav-link" href="<?= BASEURL; ?>/login">Login</a>
            </li>
        
        <?php else : ?>
            
            <li class="nav-item">
                <a class="nav-link" href="<?= BASEURL; ?>">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= BASEURL; ?>/obat">Stok Obat</a>
            </li>
            <li class="nav-item ms-3">
                <a class="btn btn-danger btn-sm rounded-pill px-3 mt-1 fw-bold" href="<?= BASEURL; ?>/login/logout">
                    Logout (<?= $_SESSION['nama']; ?>)
                </a>
            </li>
        
        <?php endif; ?>

      </ul>
    </div>
  </div>
</nav>