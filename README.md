# wordpress_test_plugin
Thimba media test 

1.Short questions

a. In PHP, how would you GET query string parameter?

- The parameters from a URL string can be be retrieved in PHP using pase_url() and
parse_str() functions. Note: Page URL and the parameters are separated
by the ? character. parse_url() Function: The parse_url() function is used to return the components of a URL by parsing it.

b. In PHP, how can you declare a constant variable?

define("MINSIZE", 50);
echo MINSIZE;
echo constant("MINSIZE"); // same thing as the previous line

A constant name starts with a letter or underscore, followed by any number of letters, numbers, or underscores.
If you have defined a constant, it can never be changed or undefined. To define a constant
you have to use define() function and to retrieve the value of a constant, you have to simply specifying its name.

c. In JavaScript, a string using double quotes is exactly the same as a string using single quote
=> True

d. What steps would you take to optimize a website to improve the load speed?

- Minimize on-page components.
- Compress large pages.
- Use browser caching.
- Optimize visual content.
- Eliminate unnecessary plugins.
- Review your hosting plan.



e. In words, pseudo code or using language of your choice, explain how you would write a function that
writes away user name and email to a database


Using PHP
First thing is to create a connetion file while will come with servername, username, password, and database name
eg:
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database_name";

// Create connection
$conn = new mysqli($servername,
$username, $password, $dbname);

The the following step is to create a function which will include the connection file:
eg:
function insert(){
include('conn.php');
// Check connection
if ($conn->connect_error) {
die("Connection failed: "
. $conn->connect_error);
}

$sqlquery = "INSERT INTO table VALUES('John', 'john@example.com')"

if ($conn->query($sql) === TRUE) {
echo "record inserted successfully";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}
}



f. Why would you use === instead of ==

=== This will compare if two values are identical and == will compare two values if are equal


g. Explain the difference between 1st and 3rd party cookies.

The main differences between first and third-party cookies include: Setting the cookie: A first-party cookie is set by the publisher's web server or any JavaScript loaded on the website. A third-party cookie can be set by a third-party server or via code loaded on the publisher's website.


2. What will be the output of the code below and why?
$x = 5;
echo $x;
echo "<br />";
echo $x+++$x++;
echo "<br />";
echo $x;
echo "<br />";
echo $x---$x--;
echo "<br />";
echo $x;

outpput results

5
11
7
1
5
