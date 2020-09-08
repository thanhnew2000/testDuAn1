<?php require_once '../commont/connect.php';session_start();

        $sqlarrcaude ="SELECT * FROM question LIMIT 0 ";
                        $queryarrcaude=$conn->prepare($sqlarrcaude);
                        $queryarrcaude->execute();
                        $arrayde= $queryarrcaude->fetchAll(PDO::FETCH_ASSOC);


                        foreach ($arrayde as $value) {
                            echo $value['id_question'];
                        }

 ?>
