<?php 
    include 'Model/conexion.php';
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $query= "SELECT * from Productos where idProducto = $id";
        $result= mysqli_query($conn,$query);
        if (mysqli_num_rows($result)==1) { 
            $row=mysqli_fetch_array($result);
            $producto= $row['nombreProducto'];
            $cantidad=$row['cantidad'];
            $precio=$row['precio'];
        }
        if (isset($_POST['edit'])){
            $id=$_GET['id'];
            $producto=$_POST['Producto'];
            $cantidad=$_POST['Cantidad'];
            $precio=$_POST['Precio'];
            #$query= "UPDATE Productos SET Producto='$producto', Cantidad=$cantidad, Precio=$precio WHERE idProducto= $id";
            $query= "CALL ModificarProducto ($id,'$producto',$precio,$cantidad)";
            $result= mysqli_query($conn,$query);
            $_SESSION['Message'] ='Producto editado con exito';
            $_SESSION['Message_type'] ='warning';
            header("location: index.php");
        }
    }
?>
<?php include 'Template/footer.php';
      include 'Template/header.php';  ?>
    <div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id'];?>" method="POST">
                <div class="from-group">
                        <input type="text" name="Producto" value="<?php   echo $producto;    ?>" class="from-control" placeholder="Descripción del producto">
                    </div>
                    <div class="from-group">
                        <input type="text" name="Cantidad" value="<?php   echo $cantidad;    ?>" class="from-control" placeholder="Cantidad del producto">
                    </div>
                    <div class="from-group">
                        <input type="text" name="Precio" value="<?php   echo $precio;   ?>" class="from-control" placeholder="Precio del producto">
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="edit" value="Actualizar producto">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
