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









?>