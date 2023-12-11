<?php require 'partials/header.php'; ?>

<div class="container">
    <div class="row">
      <div class="d-flex justify-content-end mt-5"><a class="btn btn-primary" href="/login">Назад</a></div>
        <div class="col-md-6 offset-md-3">
          <h2 class="text-center">Login</h2>
          <form action="/auth" method="post" class="mt-4">
              <div class="mb-3">
                  <label for="login" class="form-label">Login</label>
                  <input type="text" name="login" id="login" placeholder="Login" class="form-control mb-3">
              </div>
              <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" name="password" id="password" placeholder="Пароль" class="form-control mb-3">
              </div>
              <button type="submit" class="btn btn-success">Войти</button>
          </form>
        </div>
    </div>
</div>

<?php require 'partials/footer.php'; ?>


