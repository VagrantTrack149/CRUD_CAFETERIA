<?php include 'Model/conexion.php'; ?>
<?php include 'Template/header1.php'; ?>
<div class="container">
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <!-- MESSAGES --> 
            <?php
                if (isset($_SESSION['Message'])) {
                    $message = $_SESSION['Message'];
                    $messageType = $_SESSION['Message_type'];
                    #unset($_SESSION['Message']);
                    #unset($_SESSION['Message_type']);
                }
            ?>
            <?php if (isset($message) && isset($messageType)) : ?>
                <div class="alert alert-<?php echo $messageType; ?> alert-dismissible fade show" role="alert">
                    <strong><?php echo $message; ?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <div class="card card-body">
        <h2>Iniciar sesión</h2>
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="username">Usuario:</label>
                <input type="text" class="form-control" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <div class="m-2">
                <div class="w-100">
            <button type="submit" class="btn btn-primary">Iniciar sesión</button>
            </div>
            </div>
        </form>
    </div>
    <button type="submit" class="btn btn-secondary" onclick="window.location.href='index6.php'">Registrate</button>

    </div>
        </div>
    </div>
</div>    
<?php include 'template/footer.php'; ?>