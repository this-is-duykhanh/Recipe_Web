const navItems = document.querySelector('.nav__items');
const openNavBtn = document.querySelector('#open__nav-btn');
const closeNavBtn = document.querySelector('#close__nav-btn');

// opens nave dropdown
const openNav = () => {
    navItems.style.display = 'flex';
    openNavBtn.style.display = 'none';
    closeNavBtn.style.display = 'inline-block';
}

// close nav dropdown
const closeNav = () => {
    navItems.style.display = 'none';
    openNavBtn.style.display = 'inline-block';
    closeNavBtn.style.display = 'none';
}

openNavBtn.addEventListener('click', openNav);
closeNavBtn.addEventListener('click', closeNav);


const sidebar = document.querySelector('aside');
const showSidebarBtn = document.querySelector('#show__sidebar-btn');
const hideSidebarBtn = document.querySelector('#hide__sidebar-btn');

// Shows sidebar on small devices
const showSidebar = () => {
    sidebar.style.left = '0';
    showSidebarBtn.style.display = 'none';
    hideSidebarBtn.style.display = 'inline-block';
}

// Hide sidebar on small devices
const hideSidebar = () => {
    sidebar.style.left = '-100%';
    showSidebarBtn.style.display = 'inline-block';
    hideSidebarBtn.style.display = 'none';
}


showSidebarBtn.addEventListener('click', showSidebar);
hideSidebarBtn.addEventListener('click', hideSidebar);


function submitCommentForm() {
    var formData = new FormData(document.getElementById("comment-form"));

    // AJAX request to submit the form data
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            // On success, append the new comment to the comments section
            var newComment = this.responseText;
            document.getElementById("getComment").innerHTML = newComment;

            document.getElementById("comment").value = ""; // Clear the comment input field
        }
    };


    xhr.open("POST", "../setComment.php", true);
    xhr.send(formData);
}


function deleteComment(element) {
    var formData = new FormData(element);

    // AJAX request to submit the form data
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            // On success, append the new comment to the comments section
            var newComment = this.responseText;
            document.getElementById("getComment").innerHTML = newComment;

        }
    };

    xhr.open("POST", "../deleteComment.php", true);
    xhr.send(formData);
}



function likeComment(element) {

    // var likeValue = document.getElementById("icon__status")
    
    var formData = new FormData(element);


    // AJAX request to submit the form data
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            // On success, append the new comment to the comments section
            var newComment = this.responseText;
            document.getElementById("getComment").innerHTML = newComment;
        }
    };

    xhr.open("POST", "../likeComment.php", true);
    xhr.send(formData);
}


function likePost(element) {
    var formData = new FormData(element);

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            var newComment = this.responseText;
            document.getElementById("getLike").innerHTML = newComment;
        }
    };

    xhr.open("POST", "../likePost.php", true);
    xhr.send(formData);
}
