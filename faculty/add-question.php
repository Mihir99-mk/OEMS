<?php
session_start();
if (!$_SESSION['IS_LOGIN']) {
    header('location: login.php');
}
?>
<!DOCTYPE html>


<html lang="en" dir="ltr">

<head>
    <title>CKEditor 5 ClassicEditor build</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="https://c.cksource.com/a/1/logos/ckeditor5.png">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>


<body data-editor="ClassicEditor" data-collaboration="false" data-revision-history="false">
    <header>
        <div class="centered">
            <h1><a href="https://ckeditor.com/ckeditor-5/" target="_blank" rel="noopener noreferrer"><img src="https://c.cksource.com/a/1/logos/ckeditor5.svg" alt="CKEditor 5 logo">CKEditor 5</a></h1>
            <nav>
                <ul>
                    <li><a href="https://ckeditor.com/docs/ckeditor5/" target="_blank" rel="noopener noreferrer">Documentation</a></li>
                    <li><a href="https://ckeditor.com/" target="_blank" rel="noopener noreferrer">Website</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <div class="message">
            <div class="centered">
                <h2>CKEditor 5 online builder demo - ClassicEditor build</h2>
            </div>
        </div>
        <div class="centered">
            <form action="#" method="post">
                <textarea name="edit" id="editor" cols="30" rows="10"></textarea>
                <input type="text" id="editor1">
            </form>
        </div>
    </main>
    <footer>
        <p><a href="https://ckeditor.com/ckeditor-5/" target="_blank" rel="noopener">CKEditor 5</a>
            – Rich text editor of tomorrow, available today
        </p>
        <p>Copyright © 2003-2022,
            <a href="https://cksource.com/" target="_blank" rel="noopener">CKSource</a>
            – Frederico Knabben. All rights reserved.
        </p>
    </footer>
    <script src="../ckeditor/build/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor','#editor1'), {
                toolbar: {
                    items: [
                        'heading', '|',
                        'fontfamily', 'fontsize', '|',
                        'alignment', '|',
                        'fontColor', 'fontBackgroundColor', '|',
                        'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
                        'link', '|',
                        'outdent', 'indent', '|',
                        'bulletedList', 'numberedList', 'todoList', '|',
                        'code', 'codeBlock', '|',
                        'insertTable', '|',
                        'uploadImage', 'blockQuote', '|',
                        'undo', 'redo'
                    ],
                    shouldNotGroupWhenFull: true
                }

            })
            .catch(error => {
                console.log(error);
            });
        
            ClassicEditor
            .create(document.querySelector('#editor1'), {
                toolbar: {
                    items: [
                        'heading', '|',
                        'fontfamily', 'fontsize', '|',
                        'alignment', '|',
                        'fontColor', 'fontBackgroundColor', '|',
                        'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
                        'link', '|',
                        'outdent', 'indent', '|',
                        'bulletedList', 'numberedList', 'todoList', '|',
                        'code', 'codeBlock', '|',
                        'insertTable', '|',
                        'uploadImage', 'blockQuote', '|',
                        'undo', 'redo'
                    ],
                    shouldNotGroupWhenFull: true
                }

            })
            .catch(error => {
                console.log(error);
            });
            
    </script>
</body>

</html>