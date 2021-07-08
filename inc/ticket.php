<!DOCTYPE html>
<html>
    <head>


    </head>
    <body>

<style type="text/css">
    
._ticket * {
    font-size: 12px;
    font-family: 'Times New Roman';
}

._ticket td,
._ticket th,
._ticket tr,
._ticket table {
    border-top: 1px solid black;
    border-collapse: collapse;
}

._ticket td.producto,
._ticket th.producto {
    width: 75px;
    max-width: 75px;
    line-height: 12px
}

._ticket td.cantidad,
._ticket th.cantidad {
    width: 40px;
    max-width: 40px;
    word-break: break-all;
}

._ticket td.precio,
._ticket th.precio {
    width: 40px;
    max-width: 40px;
    word-break: break-all;
    text-align: right !important;
}

._ticket .centrado {
    text-align: center;
    align-content: center;
}

._ticket {
    width: 155px;
    max-width: 155px;
    background-color: white;
}

._ticket img {
    max-width: inherit;
    width: inherit;
}

</style>

        <div class="_ticket">
            <img
                src="<?php echo $_POST['logo'] ?>"
                alt="Logotipo">
            <p class="centrado"><?php echo $_POST['title'] ?>
                <br>Atendido por: <?php echo $_POST['user'] ?>
                <br><?php echo $_POST['address'] ?>
                <br><?php echo $_POST['date'] ?></p>
            <table>


                <thead>
                    <tr>
                        <th class="cantidad">CANT</th>
                        <th class="producto">PRODUCTO</th>
                        <th class="precio">$$</th>
                    </tr>
                </thead>
                <tbody>

                    <?php 
                        foreach($_POST['order'] as $r){
                    ?>
                    <tr>
                        <td class="cantidad"><?php echo $r['qty'] ?></td>
                        <td class="producto"><?php echo $r['name'] ?></td>
                        <td class="precio">$<?php echo $r['price'] ?></td>
                    </tr>  
                    <?php 
                        }
                    ?>
                    <tr>
                        <td class="">TOTAL</td>
                        <td class="cantidad"> </td>

                        <td class="">$<?php echo $_POST['total']?></td>
                    </tr>
                </tbody>
            </table>

 


            <p class="centrado"><?php echo $_POST['message_line1'] ?>
                <br><?php echo $_POST['message_line2'] ?></p>
        </div>


    </body>
</html>