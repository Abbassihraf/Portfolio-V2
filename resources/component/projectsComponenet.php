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





?>