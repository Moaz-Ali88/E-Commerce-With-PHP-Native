<h1>1-Description</h1>

•Our e-commerce platform is a robust and scalable web application developed using PHP, designed to deliver a secure, efficient, and user-friendly online shopping experience. It provides an intuitive storefront for customers and a comprehensive administrative dashboard that enables store owners and managers to oversee and control every aspect of their business operations.

•The system includes a secure authentication mechanism and role-based access control (RBAC), ensuring that each user can access only the features and data appropriate to their role—be it administrator, vendor, or customer.

•At the core of the platform is a well-structured relational database built with MySQL, which supports reliable storage and management of key entities such as:

•Users

•Products

•Categories

•Shopping Carts

•These entities are connected through carefully designed database relationships (one-to-many, many-to-many, etc.), allowing for efficient querying, scalability, and complex business logic—such as user-specific shopping carts, product and categorization.

•To enhance the responsiveness of the platform, we employ AJAX technology, enabling dynamic content updates without full page reloads. This results in a more fluid and interactive experience for both customers and administrators.

<h1>2-Key Features</h1>

•Modern, responsive e-commerce storefront.

•Developed using PHP with MySQL as the database engine.

•Comprehensive administrative dashboard for full business management.

•Secure user authentication system.

•Role-based access control for granular permission management.

•Relational database with well-defined entity relationships.

•AJAX-powered interface for seamless user interactions in contact page.

•Scalable architecture ready for future growth and integrations.

•And more features...

<h1>3-How To Run</h1>

Follow these steps to set up and run the project locally using XAMPP:

<h3>1. Install XAMPP</h3>
•Download and install XAMPP for your operating system from the official website.

•After installation, launch the XAMPP Control Panel.

<h3>2. Start Apache and MySQL</h3>
•In the XAMPP Control Panel, click Start next to both Apache and MySQL.

<h3>3. Move Project Files to htdocs Directory</h3>
•Copy the entire project folder to the htdocs directory inside the XAMPP installation directory.

<h3>4. Import the Database</h3>
•Open your browser and go to http://localhost/phpmyadmin.

•Click on "New" in the left sidebar to create a new database.

•Enter a database name (make sure it matches the name used in your project's config file) and choose collation (usually utf8_general_ci), then click Create.

•After creating the database, click on the database name in the left sidebar.

•Click on the "Import" tab at the top.

•Click Choose File and select the .sql file located in your project directory (the_project.sql).

•Scroll down and click Go to import the database.

<h3>5. Configure the Database Connection</h3>
•Open the project configuration file where the database connection is defined (commonly config.php, .env, or similar).

•Update the database connection settings to match your local environment. Example for PHP projects like:

$host = 'localhost';

$dbname = 'your_database_name';

$username = 'root';

$password = '';

<h3>6. Run the Project</h3>
•Open your browser and navigate to your project’s URL:


http://localhost/E-Commerce-With-PHP-Native-main

<h1>4-How To Reach The Dashboard</h1>





