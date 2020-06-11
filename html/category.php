<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">

    <title>GoMaR</title>
    <link rel="stylesheet" href="../css/category.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
</head>

<body>
    <div class="navbar">
        <div class="container">
            <img alt="GoMar Logo" src="../resources/logo.svg" class="logo" onclick="window.location.href = 'landing.php';">
            <div class="right-section">
                <div class="btn" onclick="window.location.href = 'statistics.php';">
                    <img alt="GoMar Statistics" src="../resources/statistics-icon.svg" class="icon">
                    <div class="btn-label">| Statistics</div>
                </div>
                <div class="btn" onclick="window.location.href = 'home.html';">
                    <img alt="GoMar Logout" src="../resources/logout-icon.svg" class="icon">
                    <div class="btn-label">| Log out</div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="central-container scrollable">
            <div class="slider">
  
                <a href="#slide-1">1</a>
                <a href="#slide-2">2</a>
                <a href="#slide-3">3</a>
                <a href="#slide-4">4</a>
                <a href="#slide-5">5</a>
              
                <div class="slides">
                  <div id="slide-1">
                    <a href="setCategory.php?categoryName=academic" onclick="post">
                        <input type="image" class="image" src="../resources/academic1.jpg" name="academic">
                    </a>
                    <div class="category-title">Academic</div>
                
                  </div>
                  <div id="slide-2">
                    <a href="setCategory.php?categoryName=family" onclick="post">
                        <input type="image" class="image" src="../resources/family2.jpg">
                    </a>
                    <div class="category-title">Family</div>
                   
                  </div>
                  <div id="slide-3">
                    <a  href="setCategory.php?categoryName=group" onclick="post">
                        <input type="image" class="image" src="../resources/group.jpg">
                    </a>
                    <div class="category-title">Group</div>
                   
                  </div>
                  <div id="slide-4">
                    <a href="setCategory.php?categoryName=society" onclick="post">
                        <input type="image" class="image" src="../resources/society.jpg">
                    </a>
                    <div class="category-title">Society</div>
                   
                  </div>
                  <div id="slide-5">
                    <a href="setCategory.php?categoryName=work" onclick="post">
                        <input type="image" class="image" src="../resources/work.jpg">
                    </a>
                    <div class="category-title">Work</div>
                   
                  </div>
                </div>
              </div>
        </div>
    </div>

</body>

</html>