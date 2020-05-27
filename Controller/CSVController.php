<?php
        $list = array (
            array('Shuker', 'Barbour', '628584', 'Rotterdam'),
            array('Shuker', 'Barbour', '628584', 'Rotterdam'),
            array('Shuker', 'Barbour', '628584', 'Rotterdam'),
            array('Shuker', 'Barbour', '628584', 'Rotterdam'),
            array('Shuker', 'Barbour', '628584', 'Rotterdam'),
            array('Shuker', 'Barbour', '628584', 'Rotterdam'),
            array('Shuker', 'Barbour', '628584', 'Rotterdam')

        );
        
        $f = fopen('Data.csv', 'w');
        
        foreach ($list as $fields) {
            fputcsv($f, $fields);
        }
        
        fclose($f);
        header('location: ../assets/Home.php');
        exit();
?>