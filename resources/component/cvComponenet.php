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


// Delete a cv
function delete_cv()
{
    global $pdo;
    if (isset($_GET['delete_cv'])) {
        //Exeption Handling
        try {
            //The SQL statement.
            $sqlimg = "SELECT m.id, m.file_name FROM cv c join media m on c.file = m.id WHERE c.id = ?";
                //Prepare our SELECT SQL statement.
                $stmtimg = $pdo->prepare($sqlimg);
                //Execute the statement GET the project's image data.
                $stmtimg->execute([$_GET['delete_cv']]);
                //fetch the team  cover data.
                $img = $stmtimg->fetch();
                //Check if it's the default image, we don't want to delete the default image.
                if ($img->id !== '1') {
                    //this is not the default image, Now we are going to delete the actual image from the uploads folder.
                    !unlink('../uploads/' . $img->file_name) ? set_message('error', 'cannot delete image due to an error') : set_message('success', 'image has been deleted successfully');
                    //this is not the default image, The query to delete both the image and the team
                    $sql = "DELETE c, m FROM cv c join media m on c.file = m.id WHERE c.id = ?";
                } else {
                    //this is the default image, The query to delete just the team
                    $sql = "DELETE FROM cv WHERE id = ?";
                }
                            //Prepare our DELETE SQL statement.
                $stmt = $pdo->prepare($sql);
                //Execute the statement DELETE The team.
                $stmt->execute([$_GET['delete_cv']]);
                //display toastr notification, event deleted successfully
                set_message('success', 'curriculum deleted successfully');
}catch (PDOException $e) {
    echo 'query failed' . $e->getMessage();
}
}
}

?>