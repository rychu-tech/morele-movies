# morele-movies
This project contains solution for  PHP Developer Mid/Mid+ recruitment task for Morele company.

### Setup
1. Copy `.env.example` content to new `.env` file
2. You don't need to change anything there
3. Navigate to backend folder and run `./start.sh` in your terminal. On windows you can run Git Bash
4. Wait a couple of seconds

### Details
1. The app will be running on localhost port 8080
2. There are 3 main enpdpoints:
   -  `/movies/random` - returns 3 random movie titles
   -  `/movies/even-starting-with-w` - returns all titles that start with letter 'W' and have even number of letters in the title (does include spaces)
   -  `/movies/multi-word` - returns all titles that consist of multiple words
3. I added also config for Nginx, MySQL database and phpmyadmin
4. phpmyadmin is running on localhost port 8081 (login: morele_admin, password: morele_password)
5. There is only one table in the database (id and name columns)
6. The app has repository and service layers. I could do CQRS but I thought it would be faster that way and more simple
7. Endpoint names should be nouns but these describe better the functionalities
