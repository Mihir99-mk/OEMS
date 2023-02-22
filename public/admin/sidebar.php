<ul class="side-nav">
    <li class="side-nav-item">
        <a href="dashboard.php" class="side-nav-link">
            <i class="uil-home-alt"></i>
            <span> Dashboards </span>
        </a>
    </li>


    <li class="side-nav-item">
        <a data-bs-toggle="collapse" href="#sidebarCourse" aria-expanded="false" aria-controls="sidebarCourse" class="side-nav-link">
            <i class="uil-clipboard-alt"></i>
            <span> Course </span>
            <span class="menu-arrow"></span>
        </a>
        <div class="collapse" id="sidebarCourse">
            <ul class="side-nav-second-level">
                <li>
                    <a href="add-course.php">Add Course</a>
                </li>
                <li>
                    <a href="view-course.php">View Course</a>
                </li>

            </ul>
        </div>
    </li>

    <li class="side-nav-item">
        <a data-bs-toggle="collapse" href="#sidebarusername" aria-expanded="false" aria-controls="sidebarusername" class="side-nav-link">
            <i class="uil-clipboard-alt"></i>
            <span> Faculty </span>
            <span class="menu-arrow"></span>
        </a>
        <div class="collapse" id="sidebarusername">
            <ul class="side-nav-second-level">
                <li>
                    <a href="add-faculty.php">Add Faculty</a>
                </li>
                <li>
                    <a href="view-faculty.php">View Faculty</a>
                </li>

            </ul>
        </div>
    </li>
    <li class="side-nav-item">
        <a data-bs-toggle="collapse" href="#sidebarStudent" aria-expanded="false" aria-controls="sidebarStudent" class="side-nav-link">
            <i class="uil-clipboard-alt"></i>
            <span> Students </span>
            <span class="menu-arrow"></span>
        </a>
        <div class="collapse" id="sidebarStudent">
            <ul class="side-nav-second-level">
                <li>
                    <a href="add-student.php">Add Student</a>
                </li>
                <li>
                    <a href="view-student.php">View Student</a>
                </li>

            </ul>
        </div>
    </li>

    <li class="side-nav-item">
        <a data-bs-toggle="collapse" href="#sidebarSubject" aria-expanded="false" aria-controls="sidebarSubject" class="side-nav-link">
            <i class="uil-clipboard-alt"></i>
            <span> Subject </span>
            <span class="menu-arrow"></span>
        </a>
        <div class="collapse" id="sidebarSubject">
            <ul class="side-nav-second-level">
                <li>
                    <a href="add-subject.php">Add Subject</a>
                </li>
                <li>
                    <a href="view-subject.php">View Subject</a>
                </li>

            </ul>
        </div>
    </li>

    <li class="side-nav-item">
        <a data-bs-toggle="collapse" href="#sidebarManage" aria-expanded="false" aria-controls="sidebarManage" class="side-nav-link">
            <i class="uil-clipboard-alt"></i>
            <span> Manage Course </span>
            <span class="menu-arrow"></span>
        </a>
        <div class="collapse" id="sidebarManage">
            <ul class="side-nav-second-level">
                <li>
                    <a href="manage-subject.php">Assign Subject to Course</a>
                </li>
                <li>
                    <a href="manage-faculty.php">Assign Subject to Faculty</a>
                </li>
                <li>
                    <a href="view-manage-subject.php">View Manage Subject to Faculty</a>
                </li>
            </ul>
        </div>

    </li>

    <li class="side-nav-item">
        <a data-bs-toggle="collapse" href="#sidebarReport" aria-expanded="false" aria-controls="sidebarReport" class="side-nav-link">
            <i class="uil-clipboard-alt"></i>
            <span> Generate Report </span>
            <span class="menu-arrow"></span>
        </a>
        <div class="collapse" id="sidebarReport">
            <ul class="side-nav-second-level">
                <li>
                    <a href="report.php">Analytics</a>
                </li>

            </ul>
        </div>

    </li>

    <!-- <li class="side-nav-item">
        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        <script type="text/javascript">
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({
                    pageLanguage: 'en'
                }, 'google_translate_element');
            }
        </script>
    </li> -->

    <li class="side-nav-item">
        <div id="google_translate_element"></div>

        <script type="text/javascript">
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({
                    pageLanguage: 'en'
                }, 'google_translate_element');
            }
        </script>

        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    </li>

</ul>