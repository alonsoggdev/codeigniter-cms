<!doctype html>
<html>
<head><meta charset="utf-8"><title>Admin Dashboard</title></head>
<body>
    <h1>Panel Admin</h1>
    <p>Bienvenido <?= esc(session('adminUser')['name'] ?? session('adminUser')['username']) ?></p>
    <a href="<?= base_url('admin/logout') ?>">Cerrar sesión</a>
</body>
</html>
