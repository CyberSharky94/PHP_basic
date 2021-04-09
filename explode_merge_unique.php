<?php
    /**
     * Date: 09/04/2021 - 3:57PM
     * Author: MUHAMMAD SHAKIRIN BIN SAMIN
     * Title: Playing with PHP functions - explode(), array_merge(), array_unique()
     */

    // RESULT FROM DATABASE:
    $result[] = '1,2,3,4';
    $result[] = '2,3,4';
    $result[] = '2,4,5';

    echo '<pre>';
    echo '-- RAW DATA --' . '<br>';
    print_r($result);
    echo '</pre>';

    // EXPLODE ALL RESULTS INTO ACCORDED ARRAY
    foreach ($result as $key => $value) {
        $exp_result[] = explode(',', $value);
    }

    echo '<pre>';
    echo '-- AFTER EXPLODE --' . '<br>';
    print_r($exp_result);
    echo '</pre>';

    // MERGE ALL DATA INTO SINGLE ARRAY VARIABLE
    $merged = [];
    foreach ($exp_result as $key => $value) {
        $merged = array_merge($value, $merged);
    }

    echo '<pre>';
    echo '-- AFTER MERGE --' . '<br>';
    print_r($merged);
    echo '</pre>';

    // LET ONLY ONE OCCURANCE OF SIMILAR DATA IN THE ARRAY
    $unique = array_unique($merged);
    
    echo '<pre>';
    echo '-- UNIQUE --' . '<br>';
    print_r($unique);
    echo '</pre>';
?>