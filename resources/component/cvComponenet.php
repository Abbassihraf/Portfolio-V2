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


// submit a cv to database admin area
function submit_cv(){
    global $pdo;
    if(isset($_POST['submit'])){
        try{
        $file = $_FILES['file']['name'];

        upload_file('file', $cover_id);
        $sql = "INSERT INTO `cv` (`id`, `published_at`, `file`) VALUES (NULL, CURRENT_TIMESTAMP, ?)";
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute([$cover_id]);
        if($result){
            set_message('success','cv created successfully');
            
          } else {
            set_message('error','try again later');
            
          }
        } catch (PDOException $e) {
            set_message('error','query failed');
            
            echo 'query failed' . $e->getMessage();
        }
    }
}



?>