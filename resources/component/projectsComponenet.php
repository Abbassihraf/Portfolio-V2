<?php 


function display_projects(){
    global $pdo;
    try{
    $sql ="SELECT p.*, m.file_name FROM projects p join media m on  p.cover = m.id ORDER BY p.id DESC";
    $stmt = $pdo->query($sql)->fetchAll();
    foreach ($stmt as $projects){
        echo <<<projects

        <div class="projects-page__card">
        <div class="projects-page__card--top">
            <img src="uploads/{$projects->file_name}" alt="{$projects->title}"></div>
        <div class="projects-page__card--bottom">
            <a href="{$projects->link}">
                <h1>{$projects->title}</h1>
            </a>
            <h2>GitHub:</h2>
            <a class="projects-page__github" href="{$projects->github}" target="_blank" >https://github.com/Abbassihraf/P-curiosity-LAB</a>
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







?>