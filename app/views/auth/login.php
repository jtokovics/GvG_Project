<form action="/login" method="POST">
    <label for="login">Username or Email:</label>
    <input type="text" name="login" required>

    <label for="password">Password:</label>
    <input type="password" name="password" required>

    <button type="submit">Login</button>

    <?php if(!empty($error)): ?>
        <p style="color:red"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
</form>