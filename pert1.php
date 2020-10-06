<html>
    <body>
        <form action="pert1.php" method="get">
            <input type="number"  name="bil1"
            <?php
               if(isset($_GET['bil1']))
                echo 'value="'.$_GET['bil1'].'"';   
            ?>>
            <select name="opt" id="">
                <option value="+">+</option>
                <option value="-">-</option>
                <option value="x">X</option>
                <option value="/">/</option>
            </select>
            <input type="number" name="bil2"
            <?php
               if(isset($_GET['bil2']))
                echo 'value="'.$_GET['bil2'].'"';   
            ?>>
            <input type="submit" value="=" name="sub"></input>
            <?php
                if(isset($_GET['sub']) && strlen($_GET['bil1'])  && strlen($_GET['bil2'])){
                    switch($_GET['opt']) {
                        case '+' : 
                            $total = $_GET['bil1'] + $_GET['bil2'];
                        break;
                        case '-' : 
                            $total = $_GET['bil1'] - $_GET['bil2'];
                        break;
                        case 'x' : 
                            $total = $_GET['bil1'] * $_GET['bil2'];
                        break;
                        case '/' : 
                            $total = $_GET['bil1'] / $_GET['bil2'];
                        break;
                    }             
                    echo $total;
                    $log = $_GET['history'].$_GET['bil1']." ".$_GET['opt']." ".$_GET['bil2']." = ".$total."<br/>"; // ini buat manggil isi history
                }
            ?>
            <input type="hidden" name="history"
            <?php
                if(isset($_GET['sub']) && strlen($_GET['bil1'])  && strlen($_GET['bil2']))
                    echo 'value="'.$log.'"'; //mengisi nilai pada value
                else
                    echo 'value=""';
            ?>
            >
            <h2>Log Perhitungan Sebelumnya : </h2>
            <?php
                if(isset($_GET['sub']) && strlen($_GET['bil1'])  && strlen($_GET['bil2']))
                    echo $log;
            ?>
            <br/><input type="submit" value="reset log" name="reset"
            <?php
                $log = "";
            ?>
            />
        </form>
    </body>
</html>