
//Curtis Palmer 2/22/2026, server node that runs web server and hendles requests, used chatGPT to help with syntax



// Load modules
const http = require('http');
const fs = require('fs');
const path = require('path')

// port number
const PORT = 3000;

// content type
function getContentType(filePath) {
    const ext = path.extname(filePath).toLowerCase();

    switch (ext) {
        case '.html':
            return 'text/html';
        case '.css':
            return 'text/css';
        case '.js':
            return 'application/javascript';
        case '.png':
            return 'image/png';
        case '.jpg':
        case '.jpeg':
            return 'image/jpeg';
        case '.gif':
            return 'image/gif';
        default:
            return 'application/octet-stream';
    }
}

//  static files
function serveStaticFile(filePath, res) {
    fs.readFile(filePath, (err, data) => {
        if (err) {
            if (err.code === 'ENOENT') {
                // custom 404
                fs.readFile(path.join(__dirname, 'public', 'error.html'), (error404, data404) => {
                    res.writeHead(404, { 'Content-Type': 'text/html' });
                    res.end(data404);
                });
            } else {
                // if error
                res.writeHead(500, { 'Content-Type': 'text/plain' });
                res.end('500 - Internal Server Error');
            }
        } else {
            // if Successful
            res.writeHead(200, { 'Content-Type': getContentType(filePath) });
            res.end(data);
        }
    });
}

// Create server
const server = http.createServer((req, res) => {

    let requestedPath = req.url.split('?')[0].toLowerCase();

    if (requestedPath.endsWith('/')) {
        requestedPath = requestedPath.slice(0, -1);
    }

    if (requestedPath === '') {
        requestedPath = '/';
    }

    //URL to file
    let filePath = path.join(__dirname, 'public');

    if (requestedPath === '/') {
        filePath = path.join(filePath, 'ThinkTree.html');
    } else {
        filePath = path.join(filePath, requestedPath);

        // If no file extension, assume .html
        if (!path.extname(filePath)) {
            filePath += '.html';
        }
    }

    serveStaticFile(filePath, res);
});

// Start server
server.listen(PORT, () => {
    console.log(`Server running at http://localhost:${PORT}`);
});