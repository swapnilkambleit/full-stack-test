I am writing test web + api 

1) How long did you spend on the coding test? What would you add to your solution if you had more time? If you didn't spend much time on the coding test then use this as an opportunity to explain what you would add.

-> I spent approximately 8 hours on the coding test, which included understanding the requirements, setting up the environment, implementing the core features, and performing basic testing to ensure the solution was functional and met the stated objectives.

2) How would you track down a performance issue in production? Have you ever had to do this?

        First, I verify the reported issue: is it slow for everyone or only specific users, locations, or devices. Look at server CPU, memory, database query times, and error logs.

        1) checking Backend logic.
        2) checking Database queries and optimised if needed.
        3) checking External APIs - network delays and timeouts.
        4) checking Front-end assets for large payloads and  blocking scripts.

3) Please describe yourself using JSON.
I am good at handling json data.


full-stack-test/html/index.html

CRUD
composer dump-autoload
Change The  $APP_URL =  inside public/index.php
full-stack-test/swapnilkambleit/categories
full-stack-test/swapnilkambleit/posts

------------------------------DATABASE-------------------------

CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `status` enum('Enable','Disable') NOT NULL,
  `category_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
CREATE TABLE `categories` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `description` TEXT NOT NULL,
  `image` TEXT NOT NULL,
  `status` ENUM('Enable', 'Disable') NOT NULL,
  `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;




------------------------------API-CATEGORIES-------------------------

CRUD API LIST CATEGORIES- 
http://localhost/test-wpPoet/full-stack-test/swapnilkambleit/api/categories
[
    {
        "id": 1,
        "title": "test category",
        "description": "test category",
        "image": "C:\\xampp\\htdocs\\test-wpPoet\\full-stack-test\\swapnilkambleit\\public\/..\/uploads\/ef19f61eae0ccf03ca5f0cddb52088c4e4f06adb.jpg",
        "status": "Enable",
        "created": "2025-08-09 23:57:36",
        "modified": "2025-08-09 23:57:36"
    }
]

API - SHOW
http://localhost/test-wpPoet/full-stack-test/swapnilkambleit/api/categories/show/7

API - STORE
Input -> 
['title' => 'Test title', 'description' =>  'Test description', 'image' => '', 'status' => 'Enable']

http://localhost/test-wpPoet/full-stack-test/swapnilkambleit/api/categories/store


API - UPDATE
Input -> 
['title' => 'Update title', 'description' =>  'Update description', 'image' => '', 'status' => 'Enable' ]

http://localhost/test-wpPoet/full-stack-test/swapnilkambleit/api/categories/update


API - DELETE
http://localhost/test-wpPoet/full-stack-test/swapnilkambleit/api/posts/destroy/1



------------------------------API-POSTS-------------------------

CRUD API LIST POST- 
http://localhost/test-wpPoet/full-stack-test/swapnilkambleit/api/posts

[
    {
        "id": 1,
        "title": "rwerwerew45353",
        "description": "werwerwerwrwe45354",
        "image": "C:\\xampp\\htdocs\\wpPoet\\full-stack-test\\swapnilkambleit\\public\/..\/uploads\/May 27, 2025, 05_37_14 PM.png",
        "status": "Enable",
        "category_id": 6,
        "created": "2025-08-08 15:53:27",
        "modified": "2025-08-08 15:53:27"
    }
]
 
API - SHOW
http://localhost/test-wpPoet/full-stack-test/swapnilkambleit/api/posts/show/1


API - STORE
Input -> 
['title' => 'Test title', 'description' =>  'Test description', 'image' => '', 'status' => 'Enable', 'category_id' => '1']http://localhost/test-wpPoet/full-stack-test/swapnilkambleit/api/posts/store


API - UPDATE
Input -> 
['title' => 'Update title', 'description' =>  'Update description', 'image' => '', 'status' => 'Enable', 'category_id' => '1']

http://localhost/test-wpPoet/full-stack-test/swapnilkambleit/api/posts/update


API - DELETE
http://localhost/test-wpPoet/full-stack-test/swapnilkambleit/api/posts/destroy/1