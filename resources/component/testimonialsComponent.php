<?php 


function display_testimonials(){
    global $pdo;
    try{
    $sql ="SELECT t.*, m.file_location FROM testimonials t join media m on t.profile = m.id ORDER BY t.id ASC";
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $testimonials){
        echo <<<testimonials
        <div class="testimonials__card" data-aos="flip-right" data-aos-duration="1200">
        <div class="testimonials__card--top">
            <img class="testimonials__avatar" src="uploads/{$testimonials->file_location}" alt="">
            <h1>{$testimonials->name} <span>{$testimonials->last_name}</span></h1>
            <h2>{$testimonials->role}</h2>
            <img class="quote" src="assets/images/quote.png" alt="quote icon">
        </div>
        <div class="testimonials__card--bottom">
            <p>{$testimonials->content}</p>
        </div>
    </div>
testimonials;
    }
    } catch (PDOException $e) {
    set_message('error','query failed');
    echo 'query failed' . $e->getMessage();
    }
}



// submit a testimonials to database admin area
function submit_testimonials(){
    global $pdo;
    if(isset($_POST['submit'])){
        try{
        $name = trim($_POST['name']);
        $last = trim($_POST['last_name']);
        $content = trim($_POST['content']);
        $role = trim($_POST['role']);
        $file = $_FILES['profile']['name'];
        $cover_id = 1;

        //**------  function for handling image upload-------*/
        upload_image('profile', $cover_id);
        $sql = "INSERT INTO `testimonials` (`id`, `name`, `last_name`, `content`, `role`, `profile`) VALUES (NULL, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $result = $stmt->execute([$name,$last, $content, $role, $cover_id]);
        if($result){
            set_message('success','recommandation created successfully');
            
          } else {
            set_message('error','try again later');
            
          }
        } catch (PDOException $e) {
            set_message('error','query failed');
            
            echo 'query failed' . $e->getMessage();
        }
    }
}

// Testimnials Management. display testimonials to be edited or deleted in admin area

function display_testimonials_admin()
{
    global $pdo;
    try{
        $sql = "SELECT t.*, m.file_name FROM testimonials t join media m on t.profile = m.id "; 
        $stmt = $pdo->query($sql)->fetchAll();
        foreach ($stmt as $testimonials){
        echo <<<testimonials
        <tr>
        <td class="text-center text-muted">{$testimonials->id}</td>
        <td class=""><img src="../uploads/thumbnails/{$testimonials->file_name}" class="br-a" alt="testimonials thumbnail"></td>
        <td class=""> {$testimonials->name} </td>
        <td class=""> {$testimonials->last_name} </td>
        <td class=""> {$testimonials->role} </td>
        <td class=""> {$testimonials->content} </td>

        <td class="text-center">
            <a href="index.php?edit_testimonials={$testimonials->id}">
            <button type="button" id="PopoverCustomT-1"class=" btn-wide btn btn-success btn-icon-only">
                <i class="pe-7s-note" style="font-size: 1rem;"></i> Edit
            </button>
            </a>
            <button type="button" id="PopoverCustomT-1" class=" btn-icon btn-icon-only btn btn-outline-danger" value="index.php?manage_testimonials&delete_testimonials={$testimonials->id}" data-toggle="modal" data-target="#exampleModal">
                <i class="pe-7s-trash" style="font-size: 1rem;"></i>
            </button>
        </td>
    </tr>
testimonials;
    }
} catch (PDOException $e) {
    echo 'query failed' . $e->getMessage();
}
}







?>