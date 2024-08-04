requirements 

    -> PHP 8 or later
    -> mysql and apache server (use XAMPP, LAMP, MAMP or WAMP)
    -> inter font installed (goto assets/fonts) and install all those fonts by clicking and installing

installation

    -> download the code from this repo
    -> rename the folder containing the code to "abc retaill shop"
    -> place the folder in the root of the server (htdocs folder for XAMPP)
    -> create a folder called "uploads" to store uploaded pictures
    -> open the phpmyadmin page, http://localhost/phpmyadmin,
    -> create a new database called "e-commerce-db"
    -> import the database by clicking on import, the db is stored in the folder called models in the root of the app
    ->once the import is successful, tables called users, orders and products will be created
    -> you can now open the app, http://localhost/abc%20retaill%20shop
    -> we have two types of users "client" and "admin"

ADMIN USER:

    this is user adds products to be seen by users and marks products as delivered if delivered

    this user is hard code in the system

    his credentials are;

    {
        "email": "admin",
        "password" : "admin"
    }

CLIENT:

    This users sees the available products

    he/she places orders for products.

    and also gets feedback from the admin if an order has been approved
    