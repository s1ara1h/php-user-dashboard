# 👥 User Management System

A complete web-based user management system built with PHP and MySQL featuring an intuitive interface and real-time status updates.

## ✨ Features

- ✅ **Add New Users** - Simple form for name and age input
- ✅ **Display Data** - Clean table showing all users
- ✅ **Status Management** - Toggle user status with one click
- ✅ **Real-time Updates** - Status changes reflect immediately
- ✅ **Responsive Design** - Works on all devices
- ✅ **Secure** - Protected against SQL injection

## 🎬 Live Demo

![User Management System Demo](demo.gif)

*Complete workflow: Adding a new user and toggling status in real-time*

## 🛠️ Tech Stack

- **Backend:** PHP 7.4+
- **Database:** MySQL
- **Frontend:** HTML5, CSS3, JavaScript

## 📋 Requirements

- Web server (Apache/Nginx)
- PHP 7.4+
- MySQL 5.7+

## 🚀 Installation

### 1. Clone the project
```bash
git clone https://github.com/[username]/php-user-dashboard.git
cd php-user-dashboard
```

### 2. Setup Database
```sql
CREATE DATABASE info;
USE info;

CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    age INT NOT NULL,
    status TINYINT DEFAULT 0
);
```

### 3. Configure Connection
Update database credentials in `index.php`:
```php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "info";
```

### 4. Run the Project
- Place files in web server directory
- Open browser: `http://localhost/php-user-dashboard`

## 📁 Project Structure

```
php-user-dashboard/
│
├── index.php          # Main application file
├── con.php            # Database connection
└── README.md          # Project documentation
```

## 🔧 Usage

### Add New User
1. Enter user name
2. Enter age
3. Click "Add" button

### Toggle User Status
- Click "Activate" to enable user
- Click "Deactivate" to disable user

## 🔒 Security

- PDO Prepared Statements prevent SQL injection
- Input validation and sanitization
- HTML special characters encoding

## 🤝 Contributing

1. Fork the project
2. Create feature branch (`git checkout -b feature/new-feature`)
3. Commit changes (`git commit -m 'Add new feature'`)
4. Push to branch (`git push origin feature/new-feature`)
5. Open Pull Request

## 📝 License

This project is licensed under the MIT License.

## 🚀 Future Enhancements

- [ ] User authentication system
- [ ] Export data to Excel/CSV
- [ ] Search and filter functionality
- [ ] Role-based permissions
- [ ] REST API integration

---

⭐ **Give a star if you like this project!** ⭐

- **Backend:** PHP 7.4+
- **Database:** MySQL
- **Frontend:** HTML5, CSS3, JavaScript

## Requirements

- Web server (Apache/Nginx)
- PHP 7.4+
- MySQL 5.7+

## Installation

### 1. Clone the project
```bash
git clone https://github.com/[username]/php-user-dashboard.git
cd php-user-dashboard
```

### 2. Setup Database
```sql
CREATE DATABASE info;
USE info;

CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    age INT NOT NULL,
    status TINYINT DEFAULT 0
);
```

### 3. Configure Connection
Update database credentials in `index.php`:
```php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "info";
```

### 4. Run the Project
- Place files in web server directory
- Open browser: `http://localhost/php-user-dashboard`

## Project Structure

```
php-user-dashboard/
│
├── index.php          # Main application file
├── con.php            # Database connection
└── README.md          # Project documentation
```

## Usage

### Add New User
1. Enter user name
2. Enter age
3. Click "Add" button

### Toggle User Status
- Click "Activate" to enable user
- Click "Deactivate" to disable user



---

**Give a star if you like this project!**
