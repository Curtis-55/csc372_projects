<?php

//Curtis Palmer 3/7/26, templates for creating a new project ---- Used chatGpt to help with ideas for different types of templates

class Template {

    public string $name;
    public string $description;
    public string $category;
    protected string $difficulty;

    //constructor
    public function __construct(string $name, string $description, string $category, string $difficulty) {
        $this->name = $name;
        $this->description = $description;
        $this->category = $category;
        $this->difficulty = $difficulty;
    }

    // method 1
    public function getSummary(): string {
        return $this->name . " - " . $this->description;
    }

    // method 2
    public function getDifficulty(): string {
        return $this->difficulty;
    }

}

//templates

$template1 = new Template(
    "Binary Search",
    "A template for visualizing binary search decision trees.",
    "Algorithms",
    "Moderate"
);

$template2 = new Template(
    "API Request Workflow",
    "Template showing the process of API request and response handling.",
    "System Design",
    "Advanced"
);

$template3 = new Template(
    "Merge Sort",
    "A template for visualizing the merge sort algorithm with recursive splitting.",
    "Algorithms",
    "Advanced"
);

$template4 = new Template(
    "Recursive Factorial Function",
    "A template to demonstrate recursive algorithm logic with factorial computation.",
    "Algorithms",
    "Simple"
);


$template5 = new Template(
    "Decision Tree Example",
    "A simple decision tree to teach conditional logic in programming.",
    "Algorithms",
    "Simple"
);


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title> Templates</title>


</head>

<body>

<h1>Templates</h1>

<!-- Link to stylesheet-->
<link rel="stylesheet" type="text/css" href="template.css">

<h2 id="nav-links">
         <a href="ThinkTree.html">Home |</a>
         <a href="createProject.html">Create Project |</a>
         <a href="myProjects.html">My Projects |</a>
         <a href="createProject.html">Create Project |</a> 
         <a href="templates.php">Templates |</a>
         <a href="about.html">About</a>
         
    </h2>

    <hr>

<div class="templates">


<!-- template cards -->


<div class="card">
<h2><?php echo $template1->name; ?></h2>
<p><?php echo $template1->getSummary(); ?></p>
<p>Category: <?php echo $template1->category; ?></p>
<p>Difficulty: <?php echo $template1->getDifficulty(); ?></p>
</div>

<div class="card">
<h2><?php echo $template2->name; ?></h2>
<p><?php echo $template2->getSummary(); ?></p>
<p>Category: <?php echo $template2->category; ?></p>
<p>Difficulty: <?php echo $template2->getDifficulty(); ?></p>
</div>

<div class="card">
<h2><?php echo $template3->name; ?></h2>
<p><?php echo $template3->getSummary(); ?></p>
<p>Category: <?php echo $template3->category; ?></p>
<p>Difficulty: <?php echo $template3->getDifficulty(); ?></p>
</div>

<div class="card">
<h2><?php echo $template4->name; ?></h2>
<p><?php echo $template4->getSummary(); ?></p>
<p>Category: <?php echo $template4->category; ?></p>
<p>Difficulty: <?php echo $template4->getDifficulty(); ?></p>
</div>

<div class="card">
<h2><?php echo $template5->name; ?></h2>
<p><?php echo $template5->getSummary(); ?></p>
<p>Category: <?php echo $template5->category; ?></p>
<p>Difficulty: <?php echo $template5->getDifficulty(); ?></p>
</div>



</div>

</body>
</html>