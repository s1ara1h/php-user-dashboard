👥 User Management System
A complete web-based user management system built with PHP and MySQL featuring an intuitive interface and real-time status updates.
🌟 Features

✅ Add New Users - Simple form for name and age input
✅ Display Data - Clean table showing all users
✅ Status Management - Toggle user status with one click
✅ Real-time Updates - Status changes reflect immediately
✅ Responsive Design - Works on all devices
✅ Secure - Protected against SQL injection

🎬 Live Demo
Show Image
Complete workflow: Adding a new user and toggling status in real-time
🛠️ Tech Stack

Backend: PHP 7.4+
Database: MySQL
Frontend: HTML5, CSS3, JavaScript

📋 Requirements

Web server (Apache/Nginx)
PHP 7.4+
MySQL 5.7+

🚀 Installation
1. Clone the project
bashgit clone https://github.com/[username]/user-management-system.git
cd user-management-system
2. Setup Database
sqlCREATE DATABASE info;
USE info;

CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    age INT NOT NULL,
    status TINYINT DEFAULT 0
);
3. Configure Connection
Update database credentials in index.php:
php$servername = "localhost";
$username = "root";
$password = "";
$dbname = "info";
4. Run the Project

Place files in web server directory
Open browser: http://localhost/user-management-system

📁 Project Structure
user-management-system/
│
├── index.php          # Main application file
├── con.php            # Database connection
└── README.md          # Project documentation
🔧 Usage
Add New User

Enter user name
Enter age
Click "Add" button

Toggle User Status

Click "Activate" to enable user
Click "Deactivate" to disable user
