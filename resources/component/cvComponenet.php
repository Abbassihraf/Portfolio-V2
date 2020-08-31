<?php

//Functionality for displaying curriculum from DB order by time into projects page

function display_cv(){
    global $pdo;
    try{
    $sql ="SELECT c.*, m.file_name FROM cv c join media m on  c.file = m.id ORDER BY c.published_at DESC LIMIT 1";
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $cv){
        echo <<<cv

        <a href="uploads/{$cv->file_name}" download class="Download--cv">Download CV</a>
cv;
    }
    } catch (PDOException $e) {
    set_message('error','query failed');
    echo 'query failed' . $e->getMessage();
    }
}





?>