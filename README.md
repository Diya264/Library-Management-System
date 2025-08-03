# Library Management System

A simple Library Management System built with PHP (PDO) and MySQL, featuring pages to manage books, members, suppliers, issues, and fines.

## Tech Stack

- Frontend: HTML, CSS
- Backend: PHP (PDO)
- Database: MySQL

## Folder Structure

- Library/
- ├── add_bookDetails.php       # Add new book details
- ├── add_bookIssue.php         # Add new book issue
- ├── add_fine_details.php      # Add new fine details
- ├── add_Members.php           # Add new member
- ├── add_supplier.php          # Add new supplier
- │
- ├── bookDetails.php           # View/manage books
- ├── bookIssue.php             # View/manage book issues
- ├── fine_details.php          # View/manage fine details
- ├── Members.php               # View/manage members
- ├── supplierDetails.php       # View/manage suppliers
- │
- ├── dashboard.php             # Main dashboard
- ├── connect.php               # Database connection
- ├── home.php                  # Landing page
- ├── logout.php                # Logout
- │
- ├── futlib.jpg
- ├── img.jpeg
- │
- └── README.md                 # Project documentation

##  Installation & Setup
> **Prerequisites:** Install XAMPP, WAMP, or LAMP with PHP and MySQL.

### Clone the Repository
```bash
git clone https://github.com/<your-username>/<your-repo-name>.git
cd <your-repo-name>
```

### Database Setup

- Create a database (e.g., library_db).
- Import your SQL file or create tables manually (members, supplier_details, fine_details, etc.).
- Update connect.php with your database credentials:
```bash
$host = "localhost";
$dbname = "library_db";
$username = "root";
$password = "";
```

### Run the Project

- Move the project folder to htdocs (XAMPP) or www (WAMP).
- Start Apache and MySQL.
- Visit in your browser
```bash
http://localhost/Library/home.php
```
## Features

- Add/View/Manage Books
- Add/View/Manage Members
- Add/View/Manage Suppliers
- Issue/Return books
- Manage Fines for overdue books
- Simple Dashboard navigation
- Clean UI with styled components and images

## Screenshots

### Login Page
<img width="1365" height="589" alt="image" src="https://github.com/user-attachments/assets/21917329-30ab-4fa3-a8b8-17621ab9bf6c" />

### Dashboard
<img width="1365" height="601" alt="image" src="https://github.com/user-attachments/assets/50136114-2f81-4487-ad15-091d0705552c" />
<img width="1363" height="479" alt="image" src="https://github.com/user-attachments/assets/bb4781e0-1c3a-4f2c-b095-c05ecbbf1699" />

### Book Details 
<img width="1365" height="584" alt="image" src="https://github.com/user-attachments/assets/f06e1b97-4da6-4848-a457-2e7f2fcc13c6" />

### Book Issue Records
<img width="1365" height="593" alt="image" src="https://github.com/user-attachments/assets/cd7665ee-7bee-49aa-8c1c-30244893c8e7" />

### Members
<img width="1365" height="589" alt="image" src="https://github.com/user-attachments/assets/5627cad2-4f4c-468c-91f3-41d0841d57bf" />

### Fine Details
<img width="1365" height="590" alt="image" src="https://github.com/user-attachments/assets/77be25da-153c-49f6-8256-478c7c1739ed" />

### Supplier Details
<img width="1365" height="584" alt="image" src="https://github.com/user-attachments/assets/7be442da-f62b-4148-aba4-3d90c4521208" />
