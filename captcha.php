<html>
    <head>
        <title>Math Captcha</title>
        <style>
          h2{
            text-align: center; 
            padding: 20px;
          }  
          table {
            align:center;
           
          }
</style>

    </head>
    <body>

    <h2 >USER ACCOUNT REGISTRATION</h2>
    <form method="post">
        <table align="center">
            <tr>
                <td>Username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="pass"></td>
            </tr>
            <tr>
                <td>Confirm Password</td>
                <td><input type="password" name="conpass"></td>
            </tr>
            <tr>
                <td colspan= "2" style="text-align:center; padding-top: 20px;">Are you a human? Answer this</td>               
            </tr>
            <tr>
          
  
        

<?php
    
    $operator = ['+', '-', 'x'];
    $operation = $operator [rand(0,2)];

    if($operation == '+') {
        $num = rand(1, 100);
        $num1 = rand(1, 100);
        $total = $num + $num1;
        ?>
            <input type="hidden" name="total" value="<?php echo $total ?>">
        <?php
    }
    if($operation == '-') {
        $num = rand(1, 100);
        $num1 = rand(1, $num-1);
        $total = $num - $num1;
        ?>
            <input type="hidden" name="total" value="<?php echo $total ?>">
        <?php
    }
    if($operation == 'x') {
        $num = rand(1, 20);
        $num1 = rand(1, 10);
        $total = $num * $num1;
        ?>
            <input type="hidden" name="total" value="<?php echo $total ?>">
        <?php
    }
?>
    <table align="center" >
        <tr> 
            <td>
                <?php echo $num. $operation. $num1 ?>
                <input type="hidden" name="num" value="<?php echo $num ?>">
                <input type="hidden" name="num1" value="<?php echo $num1 ?>">
                <input type="number" name="answer">
            </td>
        </tr>

        <tr align="center">
            <td>
                <input type="submit" name="submit" value="Register">
                <input type="reset" name="clear" value="Clear">
            </td>
        </tr>
</table>

    <?php
        if(isset($_POST['submit'])) {
            $username = $_POST['username'];
            $pass = $_POST['pass'];
            $conpass = $_POST['conpass'];           
            $total = $_POST['total'];
            $answer = $_POST['answer'];

        
        if($pass != $conpass) {
            ?>
        <table align="center" style="background-color: crimson;">
            <tr>
                <td>Password did not match. Please try again!</td>
            </tr>
        </table>
    <?php       
        }
        if ($answer != $total) {
            ?>
             <table align="center" style="background-color: crimson;">
            <tr>
                <td>Retry registration. Failed CAPTCHA!</td>
            </tr>
            </table>  
    <?php
        }
        else if ($pass == $conpass && $answer == $total) {
            ?>
        <table align="center">
            <tr align="center"  style="background-color: aquamarine;">
                <td>Account for <b><?php echo $username ?></b> has been registered!</td>
            </tr>
            <tr>
                <td>
                    <strong>MD5:</strong> <?php echo hash('md5', $pass) ?>
                </td>
            </tr>
            <tr>
                <td>
                    <strong>SNEFRU:</strong> <?php echo hash('snefru', $pass) ?>
                </td>
            </tr>    
            <tr>
                <td>
                    <strong>GOST-CRYPTO:</strong> <?php echo hash('gost-crypto', $pass) ?>
                </td>
            </tr>    
            <tr>
                <td>
                    <strong>SHA256:</strong> <?php echo hash('sha256', $pass) ?>
                </td>
            </tr>    
            <tr>
                <td>
                    <strong>CRC32:</strong> <?php echo hash('crc32', $pass) ?>
                </td>
            </tr>        
        </table>
     <?php 
            

        }

    }
    ?> 

    

</table>
</form>
</body>
</html>