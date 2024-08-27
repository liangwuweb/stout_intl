# stout_intl
This project is a web-based content management system (CMS) designed to facilitate cross-cultural communication among international students at the University of Wisconsin-Stout. The system focuses on providing a platform for students to share their experiences, address challenges, and build a supportive community through user-generated content (UGC). The CMS allows students to create, manage, and engage with posts, fostering interaction and knowledge sharing. Key features include a user dashboard for content management, an admin dashboard for overseeing the platform, and robust user authentication for secure access. This project aims to enhance the academic and social experience of international students by providing a dedicated space for them to connect and support each other.

## Installation
1. Download this project to your local machine
2. Open your local virtual server. For Mac, use MAMP. For windows, use WAMP. I used MAMP, so I will use MAMP as an example.
3. Drag the project into the /htdocs folder. There is a stout_intl sql file in the root folder. Create a new database with phpmyadmin, and import the sql file to 
the database. 
4. Find the db_credentials.php in /private folder, replace the DB_USER, DB_PASS, DB_NAME with your own.
5. Finally, open MAMP and start the server. Then go to http://localhost:8888/stout_intl/public/ (Yours root URL might be different, such as localhost). The Site will now showup
