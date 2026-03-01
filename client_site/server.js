// Curtis Palmer - Express + Handlebars Server

const express = require('express');
const exphbs = require('express-handlebars');
const path = require('path');

//Express app
const app = express();

// port
const PORT = process.env.PORT || 3000;

//  Handlebars
app.engine('handlebars', exphbs.engine({ defaultLayout: 'main' }));
app.set('view engine', 'handlebars');
app.set('views', path.join(__dirname, 'views'));

//  static files 
app.use(express.static(path.join(__dirname, 'public')));



// Home page
app.get('/', (req, res) => {
    res.render('home', {
        pageTitle: 'ThinkTree Home',
        welcomeMessage: "Welcome to ThinkTree - Your Process Design Tree Planner"
    });
});

// Create Project page
app.get('/createProject', (req, res) => {
    res.render('create', {
        pageTitle: 'Create Project',
        instructions: 'Fill out the form below to create a new project.'
    });
});

// My Projects page
app.get('/myProjects', (req, res) => {
    res.render('projects', {
        pageTitle: 'My Projects',
        userName: 'Curtis Palmer' 
    });
});

// About page
app.get('/about', (req, res) => {
    res.render('about', {
        pageTitle: 'About ThinkTree',
        description: "ThinkTree is a platform to help visualize and plan projects efficiently."
    });
});


// 404 errors
app.use((req, res) => {
    res.status(404).render('404', {
        pageTitle: 'Page Not Found',
        path: req.originalUrl
    });
});



//500 error
app.use((err, req, res, next) => {
    console.error(err.stack); 
    res.status(500).render('500', {
        pageTitle: 'Server Error',
        errorMessage: err.message
    });
});

//start server
app.listen(PORT, () => {
    console.log(`Server running at http://localhost:${PORT}`);
});