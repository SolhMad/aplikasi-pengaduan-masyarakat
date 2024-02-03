<div class="container">
    <div class="row d-flex align-items-center" style="height:100vh;">
        <div class=" col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card border-0 shadow rounded-3 my-auto">
                <div class="card-body p-4 p-sm-5">
                    <h3 class="card-title text-center mb-3 fw-light fs-3">Log In</h3>
                    <form action="config/aksi_login.php" method="POST"><!-- data login ini dikirim ke config/aksi_login.php -->
                        <div class="mb-3">
                            <label class="form-label" for="username"> Username </label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Masukan Username" required autofocus autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="password"> Password </label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Masukan Password" required autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="level"> Login Sebagai </label>
                            <select class="form-control" name="level" id="level">
                                <option value="masyarakat">Masyarakat</option>
                                <option value="petugas">Petugas</option>
                            </select>
                        </div>
                        <div class="d-grid">
                            <button type="submit" name="kirim" class="btn btn-success">LOGIN</button>
                        </div>
                        <a href="index.php?page=registrasi" style="text-decoration: none;">Belum Punya Account ?</a>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>