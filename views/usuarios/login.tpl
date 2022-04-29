<section class="login-content">
    <div class="logo">
        <h1>Vali</h1>
    </div>
    <div class="login-box">
        <form class="login-form" action="" method="post">
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Login</h3>
            <div class="form-group">
                <label class="control-label">Email</label>
                <input name="email" class="form-control" type="email" placeholder="Ingresa tu email" autofocus>
            </div>
            <div class="form-group">
                <label class="control-label">Password</label>
                <input class="form-control" type="password" name="clave" placeholder="Ingresa tu password">
            </div>
            <div class="form-group">
                <div class="utility">

                    <p class="semibold-text mb-2"><a href="#" data-toggle="flip">¿Olvidaste tu password?</a></p>
                </div>
            </div>
            <div class="form-group btn-container">
                <input type="hidden" name="enviar" value="{$enviar}">
                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>Login</button>
            </div>
        </form>
        <form class="forget-form" action="" method="post">
            <h3 class="login-head"><i class="fa fa-key" aria-hidden="true"></i> Recuperar Password</h3>
            <div class="form-group">
                <label class="control-label">Email</label>
                <input class="form-control" type="email" name="email" placeholder="Ingresa tu email">
            </div>
            <div class="form-group btn-container">
                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>Solicitar</button>
            </div>
            <div class="form-group mt-3">
                <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Ir a Login</a></p>
            </div>
        </form>
    </div>
</section>