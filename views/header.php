<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Aplikasi PHP Modular</title>
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/style.css">
</head>
<body>
<div class="container">
  <header>
    <h1>Aplikasi PHP Modular</h1>
    <p>Praktikum 9 - Pemrograman Web</p>
  </header>
  <nav>
    <a class="<?= isActive('dashboard') ?>" href="<?= url('dashboard') ?>">Dashboard</a>
    <a class="<?= isActive('user/') ?>" href="<?= url('user/list') ?>">Data Pengguna</a>
  </nav>
  <main>
    <?php tampilFlash(); ?>
