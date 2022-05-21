<!-- Login Modal -->  
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">                      
        <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4>Login or Registro</h4>
        <form id="login-register-form" class="aa-login-form" action="">
            <label for="">Email<span>*</span></label>
            <input type="text" name="email" placeholder="ejemplo@outlook.com">
            <label for="">Contraseña<span>*</span></label>
            <input type="password" name="password" placeholder="Password">
            <button id="login" class="aa-browse-btn" type="button">Login</button>
            <button id="register" class="aa-browse-btn" type="button">Registrar</button>
            <!--label for="rememberme" class="rememberme"><input type="checkbox" id="rememberme">Recordar</label-->
            <!--p class="aa-lost-password"><a href="#">¿Olvidaste tu contraseña?</a></p-->
            <div id="login-message" class="aa-register-now">
                <!-- No tienes cuenta?<a href="account.html">Registrate ahora!</a>-->
                ¡Si! Inicia sesión o regístrate en el mismo formulario
            </div>
        </form>
        </div>                        
    </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>