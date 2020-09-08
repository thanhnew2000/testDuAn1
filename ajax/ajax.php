<?php require "index.php" ?>  
<form action="" method="get" accept-charset="utf-8">
    
    

<label for="">Danh mục cha</label>
            <?php
            $sql = "SELECT * FROM category ";
            $result = executeQuery($sql, true);
            ?>
            <?php
            echo "<select name='lop' onchange=\"showCustomer(this.value)\">";
            foreach ($result as $value) {
                echo "<option value = '" . $value['id_category'] . "'>";
                echo $value['name_category'];
                echo "</option>";
            }
            echo "</select>";
            ?>
            <label for="">Danh mục con</label>
            <div id="txtHint" style="width: 100%"></div>
            <script>
                function showCustomer(str) {
                    var xhttp;
                    if (str == "") {
                        document.getElementById("txtHint").innerHTML = "";
                        return;
                    }
                    xhttp = new XMLHttpRequest();
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("txtHint").innerHTML = this.responseText;
                        }
                    };
                    xhttp.open("GET", "getcustomer.php?q=" + str, true);
                    xhttp.send();
                }
            </script>
            <button type="submit">Gui</button>

        </form>