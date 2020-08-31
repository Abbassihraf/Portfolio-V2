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


//Curicculum Management. display curicculum to be edited or deleted in admin area

function display_cv_admin()
{
    global $pdo;
    try{
        $sql = "SELECT c.*, m.file_name FROM cv c join media m on c.file = m.id ORDER BY c.published_at DESC "; 
        $stmt = $pdo->query($sql)->fetchAll();
        foreach ($stmt as $cv){
        echo <<<cv
        <tr>
        <td class="text-center text-muted">{$cv->id}</td>
        <td class=""> {$cv->published_at} </td>
        <td class=""><a href="uploads/{$cv->file_name}" download class="br-a">CV link</a></td>

        <td class="text-center">
            <a href="index.php?edit_cv={$cv->id}">
            <button type="button" id="PopoverCustomT-1"class=" btn-wide btn btn-success btn-icon-only">
                <i class="pe-7s-note" style="font-size: 1rem;"></i> Edit
            </button>
            </a>
            <button type="button" id="PopoverCustomT-1" class=" btn-icon btn-icon-only btn btn-outline-danger" value="index.php?manage_cv&delete_cv={$cv->id}" data-toggle="modal" data-target="#exampleModal">
                <i class="pe-7s-trash" style="font-size: 1rem;"></i>
            </button>
        </td>
    </tr>
cv;
    }
} catch (PDOException $e) {
    echo 'query failed' . $e->getMessage();
}
}


?>