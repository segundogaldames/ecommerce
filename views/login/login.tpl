<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    {include file="link_css.tpl"}
    <!--===============================================================================================-->
</head>

<body class="animsition">

    <!-- Header -->
    {include file="header_shop.tpl"}

    <!-- breadcrumb -->
    <div class="container mt-5">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="{$_layoutParams.root}" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4 mb-2">
                Login
            </span>
        </div>
    </div>


    <!-- Shoping Cart -->


    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">

                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#login" role="tab"
                                aria-controls="home" aria-selected="true">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#registro" role="tab"
                                aria-controls="profile" aria-selected="false">Registro Cuenta</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        {include file="../partials/_mensajes.tpl"}
                        <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="home-tab">

                            <form action="{{$_layoutParams.root}}login/new " method="post" class="mt-2">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                                        aria-describedby="emailHelp" placeholder="Ingresa tu email">
                                    <small id="emailHelp" class="form-text text-muted">Ingresa tu correo
                                        electrónico</small>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="clave" class="form-control" id="exampleInputPassword1"
                                        placeholder="Password">
                                </div>
                                <input type="hidden" name="enviar" value="{$enviar}">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                        </div>
                        <div class="tab-pane fade" id="registro" role="tabpanel" aria-labelledby="contact-tab">
                            <form action="{{$_layoutParams.root}}usuarios/newCliente " method="post" class="mt-2">
                                <div class="form-group">
                                    <label for="rut" class="control-label">RUT<span class="text-danger">*</span></label>
                                    <input type="text" name="rut" value="{$usuario.rut|default:""}" class="form-control"
                                        id="" aria-describedby="" placeholder="RUT del usuario">
                                </div>
                                <div class="form-group">
                                    <label for="name" class="control-label">Nombre<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="name" value="{$usuario.name|default:""}"
                                        class="form-control" id="" aria-describedby="" placeholder="Nombre del usuario">
                                </div>
                                <div class="form-group">
                                    <label for="lastname" class="control-label">Apellido(s)<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="lastname" value="{$usuario.lastname|default:""}"
                                        class="form-control" id="" aria-describedby=""
                                        placeholder="Apellido(s) del usuario">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="control-label">Email<span
                                            class="text-danger">*</span></label>
                                    <input type="email" name="email" value="{$usuario.email|default:""}"
                                        class="form-control" id="" aria-describedby="" placeholder="Email del usuario">
                                </div>
                                <div class="form-group">
                                    <label for="phone" class="control-label">Teléfono<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="phone" value="{$usuario.phone|default:""}"
                                        class="form-control" id="" aria-describedby=""
                                        placeholder="Teléfono del usuario">
                                </div>

                                <div class="form-group">
                                    <label for="clave" class="control-label">Password<span
                                            class="text-danger">*</span></label>
                                    <input type="password" name="clave" class="form-control" id="" aria-describedby=""
                                        placeholder="Password del usuario" onpaste="return false">
                                </div>
                                <div class="form-group">
                                    <label for="reclave" class="control-label">Confirmar Password<span
                                            class="text-danger">*</span></label>
                                    <input type="password" name="reclave" class="form-control" id="" aria-describedby=""
                                        placeholder="Confirmar password del usuario" onpaste="return false">
                                </div>


                                <input type="hidden" name="enviar" value="{$enviar}">
                                <button type="submit" class="btn btn-outline-success">Registrar</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>


    {include file="footer_shop.tpl"}

    {include file="link_js.tpl"}

</body>

</html>