
// ---------- Actions on document load: ----------

// Execute when document is ready:
$(function () {
    putHTML("#includes-container", "includes/logIn.html");

    // check every 100ms, if the elements have been loaded 
    let checkExist = setInterval(function () {
        if ($('#submit-create-user').length) {
            // The elements have been loaded!

            // prevent the default on submit
            $("#log-in-form").submit(function (event) {
                event.preventDefault();
            });

            // log-in button: on click
            $('#submit-log-in').click(logIn);

            // create-user button: on click
            $('#submit-create-user').click(createUser);


            // stop checking if the elements have been loaded
            clearInterval(checkExist);
        }
    }, 100);

});


// ---------- Functions: ----------

// Toggle password visibility
function togglePswVisibl(selector) {
    let psw = $(selector);
    if (psw.attr('type') === "password") {
        psw.attr('type', "text");
    } else {
        psw.attr('type', "password");
    }
}


// Update inner HTML of an element with the id: id 
// with the contents of the file with the url: url
function putHTML(selector, url) {
    $.ajax({
        url: url,
        success: function (result) {
            $(selector).html(result);
        }
    });
}
//   ----  The old way of doing it: ----
// const xhttp = new XMLHttpRequest();
// xhttp.onload = function () {
//     $(selector).html(this.responseText);
// }
// xhttp.open("GET", url);
// xhttp.send();


// User account getter
function getUser(username) {
    let user = -1; // no users were found

    $.ajax({
        type: "GET",
        url: "users.xml",
        dataType: "xml",

        success: function (xml) {
            let users = xml.getElementsByTagName("user");

            for (let i = 0; i < users.length; i++) {
                if ($("username", users[i])[0].childNodes[0].nodeValue == username) {
                    user = users[i];
                    break;
                }
            }
        }
    });

    return user;
}


// User account setter
function setUser(username, password, email = '', name = '', status = 'Bronze') {
    $.ajax({
        type: "POST",
        url: "users.xml",
        dataType: "xml",

        success: function (xml) {
            let users = xml.getElementsByTagName("users");

            let userNode = document.createElement("user");

            let usernameNode = document.createElement("username");
            usernameNode.innerText = username;
            let passwordNode = document.createElement("password");
            passwordNode.innerText = password;
            let emailNode = document.createElement("email");
            emailNode.innerText = email;
            let nameNode = document.createElement("name");
            nameNode.innerText = name;
            let statusNode = document.createElement("status");
            statusNode.innerText = status;

            userNode.appendChild(usernameNode);
            userNode.appendChild(passwordNode);
            userNode.appendChild(emailNode);
            userNode.appendChild(nameNode);
            userNode.appendChild(statusNode);

            users[0].appendChild(userNode);
        }
    });
}



// Logging in
function logIn() {
    const formData = new FormData($("#log-in-form")[0]);
    const username = formData.get('username');
    const password = formData.get('password');

    let user = getUser(username);
    if (user === -1) {
        $("#log-in-error").text("Such a username is not registered.");
    } else if ($("password", user)[0].childNodes[0].nodeValue != password) {
        $("#log-in-error").text("The password is incorrect.");
    } else {
        // The user entered everything correctly!
        console.log("Hooray!!");

        // do something with current user:

        // load his page
    }
}


// Creating a user
function createUser() {
    const formData = new FormData($("#log-in-form")[0]);
    const username = formData.get('username');
    const password = formData.get('password');

    let user = getUser(username);
    if (user != -1) {
        $("#log-in-error").text("Such a user is already registered! <br> Choose another username.");
    } else {
        setUser(username, password);
    }
}




// ================================================
// ------------ MY PROGRESS: I AM HERE ------------
// ================================================


// Delete user account
// function delUser() {
//     remove
// }


// Block user
// function blockUser() {
//         account blocked = 'true';

// }


// Log out
function logout() {

}


// Set user status
function setUserStatus(s) {
    user.status = s;
}






// function myFunction(xml) {
//     const xml = xml.responseXML;
//     const x = xml.getElementsByTagName("CD");
//     let table = `<tr>
//         <th> Artist</th>
//         <th>Title</th>
// </tr > `;
//     for (let i = 0; i < x.length; i++) {
//         table += "<tr><td>" +
//             x[i].getElementsByTagName("ARTIST")[0].childNodes[0].nodeValue + "</td><td>" +
//             x[i].getElementsByTagName("TITLE")[0].childNodes[0].nodeValue + "</td></tr>";
//     }
//     document.getElementById("demo").innerHTML = table;
// }










// let accType = ...'users.xml'.our user.account type;


