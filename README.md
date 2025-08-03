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
<img width="1365" height="589" alt="Screenshot 2025-07-16 145908" src="https://github.com/user-attachments/assets/052423da-acdc-4fac-8dc8-d624e33e7ea7" />

### Dashboard
<img width="1365" height="601" alt="Screenshot 2025-07-16 145946" src="https://github.com/user-attachments/assets/c03fc4f8-92cf-4ea9-a119-a6e895bf7ed0" />
<img width="1363" height="479" alt="Screenshot 2025-07-16 150102" src="https://github.com/user-attachments/assets/5ac2bf0e-4b5e-4b9e-9f5a-3a926c2f785c" />

### Book Details 
<img width="1365" height="584" alt="Screenshot 2025-07-16 150147" src="https://github.com/user-attachments/assets/f8bef69f-95bb-4b5d-815b-716ab35cad54" />

### Book Issue Records
<img width="1365" height="593" alt="Screenshot 2025-07-16 150309" src="https://github.com/user-attachments/assets/d0c5f9d9-9075-46e6-a4d7-11af55ec55c7" />

### Members
<img width="1365" height="589" alt="Screenshot 2025-07-16 150431" src="https://github.com/user-attachments/assets/062ed26e-3a9e-4a36-bfb0-151f79910efa" />

### Fine Details
<img width="1365" height="584" alt="Screenshot 2025-07-16 150514" src="https://github.com/user-attachments/assets/d1f1dc2e-4e0f-4737-b234-a1429683dc47" />

### Supplier Details
<img width="1365" height="590" alt="Screenshot 2025-07-16 175744" src="https://github.com/user-attachments/assets/d52525df-b8bd-45f8-9e96-4fef9ed3a73d" />

