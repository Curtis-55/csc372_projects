// Curtis Palmer 2/22/2026 – server node that runs web server and hendles requests, used chatGPT to help with syntax

const http = require('http');
const fs = require('fs');
const path = require('path');

// port to 3000
const PORT = process.env.PORT || 3000;

//  content type
function getContentType(filePath) {
    const ext = path.extname(filePath).toLowerCase();
    switch (ext) {
        case '.html': return 'text/html';
        case '.css': return 'text/css';
        case '.js': return 'application/javascript';
        case '.png': return 'image/png';
        case '.jpg':
        case '.jpeg': return 'image/jpeg';
        case '.gif': return 'image/gif';
        default: return 'application/octet-stream';
    }
}

//  static file
function serveStaticFile(filePath, res) {
    fs.readFile(filePath, (err, data) => {
        if (err) {
            if (err.code === 'ENOENT') {
                // custom 404 page
                const errorPath = path.join(__dirname, 'public', 'error.html');
                fs.readFile(errorPath, (error404, data404) => {
                    res.writeHead(404, { 'Content-Type': 'text/html' });
                    res.end(data404);
                });
            } else {
                res.writeHead(500, { 'Content-Type': 'text/plain' });
                res.end('500 - Internal Server Error');
            }
        } else {
            res.writeHead(200, { 'Content-Type': getContentType(filePath) });
            res.end(data);
        }
    });
}

// Case-insensitive for linux since I was having issues with my page loading on render
function findFileCaseInsensitive(filePath) {
    const dir = path.dirname(filePath);
    const base = path.basename(filePath);

    if (!fs.existsSync(dir)) return filePath;

    const files = fs.readdirSync(dir);
    const match = files.find(f => f.toLowerCase() === base.toLowerCase());
    return match ? path.join(dir, match) : filePath;
}

// creates the  server
const server = http.createServer((req, res) => {
    let requestedPath = req.url.split('?')[0];

    if (requestedPath.endsWith('/')) requestedPath = requestedPath.slice(0, -1);
    if (requestedPath === '') requestedPath = '/';

    //  folder for static files
    let filePath = path.join(__dirname, 'public');

    if (requestedPath === '/') {
        filePath = path.join(filePath, 'ThinkTree.html');
    } else {
        filePath = path.join(filePath, requestedPath);

        // If no extension assume that its html
        if (!path.extname(filePath)) filePath += '.html';
    }

    // Make the lookup case-insensitive
    filePath = findFileCaseInsensitive(filePath);

    serveStaticFile(filePath, res);
});

// Start the server
server.listen(PORT, () => {
    console.log(`Server running on port ${PORT}`);
});