<?php

$characters = (object) array(
    'Deadpool' => (object) array(
        'name' => 'Deadpool',
        'src' => 'assets/svg/deadpool.svg'
    ),
    'Neo' => (object) array(
        'name' => 'Neo',
        'src' => 'assets/svg/neo.svg'
    ),
    'SteveJobs' => (object) array(
        'name' => 'Steve Jobs',
        'src' => 'assets/svg/steve jobs.svg'
    ),
    'Stalin' => (object) array(
        'name' => 'Stalin',
        'src' => 'assets/svg/stalin.svg'
    )
);


if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'getLeaderboard':
            $obj = array(
                (object) array(
                    'src' => 'assets/svg/white hat.svg',
                    'name' => 'White Hat',
                    'score' =>   21456,
                    'winRate' =>  0.89,
                    'totalGames' => 768,
                    'position' => 1,
                    'rank' => 89,
                    'exp' => 0.62,
                    'favoriteCharacters' => array(
                        $characters->{'Neo'},
                        $characters->{'SteveJobs'},
                        $characters->{'Stalin'}
                    )
                ),
                (object) array(
                    'src' => 'assets/svg/granny.svg',
                    'name' => "Granny",
                    'score' => 19855,
                    'winRate' => 0.84,
                    'totalGames' => 1096,
                    'position' => 2,
                    'rank' => 73,
                    'exp' => 0.71,
                    'favoriteCharacters' => array(
                        $characters->{'Neo'},
                        $characters->{'SteveJobs'},
                        $characters->{'Stalin'}
                    )
                ),
                (object) array(
                    'src' => 'assets/svg/mama zulekha.svg',
                    'name' => "Mama Zulekha",
                    'score' => 18675,
                    'winRate' => 0.83,
                    'totalGames' => 892,
                    'position' => 3,
                    'rank' => 68,
                    'exp' => 0.42,
                    'favoriteCharacters' => array(
                        $characters->{'Neo'},
                        $characters->{'SteveJobs'},
                        $characters->{'Stalin'}
                    )
                ),
                (object) array(
                    'src' => 'assets/svg/hedgehog67.svg',
                    'name' => "Hedge hog67",
                    'score' => 21456,
                    'winRate' => 0.93,
                    'totalGames' => 502,
                    'position' => 4,
                    'rank' => 67,
                    'exp' => 0.33,
                    'favoriteCharacters' => array(
                        $characters->{'Neo'},
                        $characters->{'SteveJobs'},
                        $characters->{'Stalin'}
                    )
                ),
                (object) array(
                    'src' => 'assets/svg/boom man.svg',
                    'name' => "Boom Man",
                    'score' => 164332,
                    'winRate' => 0.80,
                    'totalGames' => 1514,
                    'position' => 5,
                    'rank' => 72,
                    'exp' => 0.89,
                    'favoriteCharacters' => array(
                        $characters->{'Neo'},
                        $characters->{'SteveJobs'},
                        $characters->{'Stalin'}
                    )
                ),
                (object) array(
                    'src' => 'assets/svg/general flynn bean.svg',
                    'name' => "G. Flynn Bean",
                    'score' => 162313,
                    'winRate' => 0.78,
                    'totalGames' => 1211,
                    'position' => 6,
                    'rank' => 81,
                    'exp' => 0.44,
                    'favoriteCharacters' => array(
                        $characters->{'Neo'},
                        $characters->{'SteveJobs'},
                        $characters->{'Stalin'}
                    )
                ),
                (object) array(
                    'src' => 'assets/svg/not a rapper.svg',
                    'name' => "Not a Rapper",
                    'score' => 158422,
                    'winRate' => 0.83,
                    'totalGames' => 942,
                    'position' => 7,
                    'rank' => 77,
                    'exp' => 0.58,
                    'favoriteCharacters' => array(
                        $characters->{'Neo'},
                        $characters->{'SteveJobs'},
                        $characters->{'Stalin'}
                    )
                ),
                (object) array(
                    'src' => 'assets/svg/hippies.svg',
                    'name' => "Hippies",
                    'score' => 156231,
                    'winRate' => 0.81,
                    'totalGames' => 1257,
                    'position' => 8,
                    'rank' => 89,
                    'exp' => 0.93,
                    'favoriteCharacters' => array(
                        $characters->{'Neo'},
                        $characters->{'SteveJobs'},
                        $characters->{'Stalin'}
                    )
                ),
            );
            echo json_encode($obj);
            break;
        case 'getCharacters':
            $obj = array(
                (object) array('name' => 'Deadpool', 'image' => 'assets/svg/deadpool.svg'),
                (object) array('name' => 'Deadpool', 'image' => 'assets/svg/deadpool.svg'),
                (object) array('name' => 'Deadpool', 'image' => 'assets/svg/deadpool.svg'),
                (object) array('name' => 'Deadpool', 'image' => 'assets/svg/deadpool.svg'),
                (object) array('name' => 'Deadpool', 'image' => 'assets/svg/deadpool.svg'),
                (object) array('name' => 'Deadpool', 'image' => 'assets/svg/deadpool.svg'),
                (object) array('name' => 'Deadpool', 'image' => 'assets/svg/deadpool.svg'),
                (object) array('name' => 'Deadpool', 'image' => 'assets/svg/deadpool.svg'),
                (object) array('name' => 'Deadpool', 'image' => 'assets/svg/deadpool.svg'),
                (object) array('name' => 'Deadpool', 'image' => 'assets/svg/deadpool.svg'),
                (object) array('name' => 'Deadpool', 'image' => 'assets/svg/deadpool.svg'),
            );
            $_SESSION['id'] = $_POST['address'];
            echo json_encode($obj);
            //do some db stuff...
            //if you echo out something, it will be available in the data-argument of the
            //ajax-post-callback-function and can be displayed on the html-site
            break;
    }
}
if (isset($_GET['submit'])) {
    switch ($_GET['submit']) {
        case 'register':
            $un = $_GET["reg-username"];
            $mail = $_GET["reg-mail"];
            // //TODO: if username is occupied, alert + redo form.
            // if ($un == compareDB() || $mail == compareDB()){
            //     echo "<h1>Username or E-mail is occupied</h1>";
            //     echo "<h2>Please try another</h2>";
            // }
            echo '<html>
                <head>
                    <meta http-equiv="refresh" content="3; url=./WhatsGod" />
                </head>
                <body>
                    <div style="width:100%;height:100%;display:flex;justify-content:center;flex-direction:column;align-items:center">
                    <h1>Thank You ' . $un . '!</h1>
                    <h3>Welcome To WhatsGod </h3>
                    <h1>Redirecting in 3 seconds...</h1>
                    </div>
                    
                </body>
                </html>';
            break;
        case 'login':
            $un = $_GET["username"];
            $pw = $_GET["pass"];
            if ($un == "iznor" && $pw == "111")
            echo '<html>
                <head>
                    <meta http-equiv="refresh" content="3; url=./WhatsGod" />
                </head>
                <body>
                    <div style="width:100%;height:100%;display:flex;justify-content:center;flex-direction:column;align-items:center">
                    <h1>Welcome ' . $un . '!</h1>
                    <h1>Redirecting in 3 seconds...</h1>
                    </div>
                    
                </body>
                </html>';
            else
                echo "<h1>Wrong username or password</h2>";
            break;
    }
}
