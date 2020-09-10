<?php 

//Functionality for displaying projects from DB order by time into projects page

function display_projects(){
    global $pdo;
    try{
    $sql ="SELECT p.*, m.file_name FROM projects p join media m on  p.cover = m.id ORDER BY p.id DESC";
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $projects){
        echo <<<projects

        <div class="projects-page__card" data-aos="flip-left" data-aos-duration="1200">
        <div class="projects-page__card--top">
            <img src="uploads/{$projects->file_name}" alt="{$projects->title}"></div>
        <div class="projects-page__card--bottom">
            <a href="{$projects->link}" target="_blank">
                <h1>{$projects->title}</h1>
            </a>
            <h2>GitHub:</h2>
            <a class="projects-page__github" href="{$projects->github}" target="_blank" >{$projects->github}</a>
            <a class="projects-page__website" href="{$projects->link}" target="_blank"">website link</a>
        </div>
    </div>
projects;
    }
    } catch (PDOException $e) {
    set_message('error','query failed');
    echo 'query failed' . $e->getMessage();
    }
}

//Functionality for displaying 4 last projects from DB order by time into home page

function display_last_projects(){
    global $pdo;
    try{
    $sql ="SELECT p.*, m.file_name FROM projects p join media m on  p.cover = m.id ORDER BY p.id DESC LIMIT 4";
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $projects){
        echo <<<projects

        <div class="projects__card" data-aos="flip-left" data-aos-duration="1200">
        <div class="projects__card--top">
            <img class="coverProjects" src="uploads/{$projects->file_name}" alt="{$projects->title}">
        </div>
        <div class="projects__card--bottom">
            <a href="{$projects->link}"><h1>{$projects->title}</h1></a>
            <h2>GitHub:</h2>
            <a class="projects__github" href="{$projects->github}" target="_blank" >{$projects->github}</a>
            <a class="projects__website" href="{$projects->link}" target="_blank" >website link</a>
        </div>
    </div>

projects;
    }
    } catch (PDOException $e) {
    set_message('error','query failed');
    echo 'query failed' . $e->getMessage();
    }
}


// Create a projects from admin area to database

function submit_project(){
    global $pdo;
    if(isset($_POST['submit'])){
        try{
        $github = trim($_POST['github']);
        $link = trim($_POST['link']);
        $title = trim($_POST['title']);
        $file = $_FILES['cover']['name'];
        $cover_id = 1;

        //**------  function for handling image upload-------*/
        upload_image('cover', $cover_id);
        $sql = "INSERT INTO `projects` (`id`, `title`, `github`, `link`, `cover`) VALUES (NULL, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute([$title, $github, $link, $cover_id]);
        if($result){
            set_message('success','project created successfully');
            
          } else {
            set_message('error','try again later');
            
          }
        } catch (PDOException $e) {
            set_message('error','query failed');
            
            echo 'query failed' . $e->getMessage();
        }
    }
}


//projects Management. display projects to be edited or deleted in admin area

function display_projects_admin()
{
    global $pdo;
    try{
        $sql = "SELECT p.*, m.file_name FROM projects p join media m on p.cover = m.id ORDER BY p.id DESC "; 
        $stmt = $pdo->query($sql)->fetchAll();
        foreach ($stmt as $projects){
        echo <<<projects
        <tr>
        <td class="text-center text-muted">{$projects->id}</td>
        <td class=""><img src="../uploads/thumbnails/{$projects->file_name}" class="br-a" alt="projects thumbnail"></td>
        <td class=""> {$projects->title} </td>
        <td class=""> {$projects->github} </td>
        <td class=""> {$projects->link} </td>

        <td class="text-center">
            <a href="index.php?edit_projects={$projects->id}">
            <button type="button" id="PopoverCustomT-1"class=" btn-wide btn btn-success btn-icon-only">
                <i class="pe-7s-note" style="font-size: 1rem;"></i> Edit
            </button>
            </a>
            <button type="button" id="PopoverCustomT-1" class=" btn-icon btn-icon-only btn btn-outline-danger" value="index.php?manage_projects&delete_projects={$projects->id}" data-toggle="modal" data-target="#exampleModal">
                <i class="pe-7s-trash" style="font-size: 1rem;"></i>
            </button>
        </td>
    </tr>
projects;
    }
} catch (PDOException $e) {
    echo 'query failed' . $e->getMessage();
}
}


// Delete a projects
function delete_projects()
{
    global $pdo;
    if (isset($_GET['delete_projects'])) {
        //Exeption Handling
        try {
            //The SQL statement.
            $sqlimg = "SELECT m.id, m.file_name FROM projects p join media m on p.cover = m.id WHERE p.id = ?";
                //Prepare our SELECT SQL statement.
                $stmtimg = $pdo->prepare($sqlimg);
                //Execute the statement GET the project's image data.
                $stmtimg->execute([$_GET['delete_projects']]);
                //fetch the team  cover data.
                $img = $stmtimg->fetch();
                //Check if it's the default image, we don't want to delete the default image.
                if ($img->id !== '1') {
                    //this is not the default image, Now we are going to delete thumbnail  from the uploads folder.
                    !unlink('../uploads/thumbnails/' . $img->file_name) ? set_message('error', 'cannot delete image due to an error') : set_message('success', 'image has been deleted successfully');
                    //this is not the default image, Now we are going to delete the actual image from the uploads folder.
                    !unlink('../uploads/' . $img->file_name) ? set_message('error', 'cannot delete image due to an error') : set_message('success', 'image has been deleted successfully');
                    //this is not the default image, The query to delete both the image and the team
                    $sql = "DELETE p, m FROM projects p join media m on p.cover = m.id WHERE p.id = ?";
                } else {
                    //this is the default image, The query to delete just the team
                    $sql = "DELETE FROM projects WHERE id = ?";
                }
                            //Prepare our DELETE SQL statement.
                $stmt = $pdo->prepare($sql);
                //Execute the statement DELETE The team.
                $stmt->execute([$_GET['delete_projects']]);
                //display toastr notification, event deleted successfully
                set_message('success', 'project deleted successfully');
}catch (PDOException $e) {
    echo 'query failed' . $e->getMessage();
}
}
}


// Update projects information

function update_projects()
{
    global $pdo;
    if (isset($_POST['submit'])) {
        try {
          if(empty($_FILES['cover']['name'])){
            $cover_id = $_POST['cover_id'];
          }else{
            //**------  function for handling image upload-------*/
            upload_image('cover', $cover_id);
          }
            

            $sql = "UPDATE `projects` SET `title` = ?,`github` = ?, `cover` = ?, `link` = ?  WHERE `projects`.`id` = ?";
            $update_team = $pdo->prepare($sql);
            $update_team->execute([$_POST['title'], $_POST['github'], $cover_id ,$_POST['link'], $_POST['projects_id']]);
            if ($update_team) {
                set_message('success', 'project updated successfully');
            } else {
                set_message('error', 'query failed try later');
            }
        } catch (PDOException $e) {
            echo 'query failed' . $e->getMessage();
        }
    }
}


?>