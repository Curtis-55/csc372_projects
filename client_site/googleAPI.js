document.addEventListener("DOMContentLoaded", () => {

    const CLIENT_ID = '526663546746-f4ue8l78pts25lt4t26bnrm8jrc03bre.apps.googleusercontent.com';
    const API_KEY = 'AIzaSyCXPewDxAFd0np3CX6-IJIa9R7B0ccvXf0';
    const SCOPES = 'https://www.googleapis.com/auth/drive.readonly';
    const DISCOVERY_DOCS = ["https://www.googleapis.com/discovery/v1/apis/drive/v3/rest"];

    function handleClientLoad() {
        gapi.load('client:auth2', {
            callback: initClient,
            onerror: () => console.error("gapi failed to load"),
            timeout: 5000,
            ontimeout: () => console.error("gapi load timed out")
        });
    }

    function initClient() {
        gapi.client.init({
            apiKey: API_KEY,
            clientId: CLIENT_ID,
            discoveryDocs: DISCOVERY_DOCS,
            scope: SCOPES
        }).then(() => {
            const auth = gapi.auth2.getAuthInstance();
            auth.isSignedIn.listen(updateSigninStatus);
            updateSigninStatus(auth.isSignedIn.get());
        });
    }

    function updateSigninStatus(isSignedIn) {
        if (isSignedIn) {
            listFiles();
            document.getElementById('signin-button').style.display = 'none';
        } else {
            document.getElementById('signin-button').style.display = 'block';
        }
    }

    window.handleAuthClick = () => gapi.auth2.getAuthInstance().signIn();
    window.handleSignoutClick = () => gapi.auth2.getAuthInstance().signOut();

    function listFiles() {
        gapi.client.drive.files.list({
            pageSize: 10,
            fields: "files(id, name, mimeType, webViewLink)"
        }).then(response => {
            const projectsDiv = document.getElementById('projects-list');
            projectsDiv.innerHTML = '';

            response.result.files?.forEach(file => {
                const link = document.createElement('a');
                link.href = file.webViewLink;
                link.textContent = file.name;
                link.target = '_blank';
                projectsDiv.appendChild(link);
            });
        });
    }

    if (window.gapi) {
        handleClientLoad();
    } else {
        console.error("Google API script not loaded");
    }
});