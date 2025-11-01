<!doctype html>
<html>
<head><meta charset="utf-8"><title>Admin - Login</title></head>
<body>
    <h2>Login Admin</h2>

    <?php if(session()->getFlashdata('error')): ?>
        <div style="color:red"><?= esc(session()->getFlashdata('error')) ?></div>
    <?php endif; ?>

    <form method="post" action="<?= base_url('admin/login') ?>">
        <?= csrf_field() ?>
        <label>Usuario o Email</label><br>
        <input type="text" name="username" value="<?= esc(old('username')) ?>" required><br>
        <label>Contraseña</label><br>
        <input type="password" name="password" required><br><br>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>
