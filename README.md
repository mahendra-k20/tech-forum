# Tech Forum

A lightweight tech discussion forum built using **PHP** and **MySQL** to practice CRUD operations, user authentication, and clean UI building for your backend portfolio.

Tech Forum allows users to post questions, answer others, and engage in threaded discussions while non-logged-in users can browse and learn, similar to Stack Overflow but simplified for learning.

---

## Features

- **User Registration & Login**  
  Secure authentication with password hashing.

- **Post Questions & Answers**  
  Users can post questions and answer under discussion threads.

- **Guest Browsing**  
  Non-logged-in users can view questions and answers but cannot post.

- **Category Filtering**  
  Browse questions by categories for organized navigation.

- **Responsive UI**  
  Built with Bootstrap 5 for a clean, mobile-friendly interface.

- **Session Management**  
  Secure handling of user sessions and logout.

- **Secure Code Practices**  
  Uses prepared statements and session validation for safety.

---

## Built With

- **PHP** (Core PHP, no frameworks)
- **MySQL** (database)
- **Bootstrap 5 & HTML5** (frontend & structure)
- **JavaScript** (form validation & interactivity)

---

## Installation

Follow these steps to set up **Tech Forum locally using WAMP or XAMPP**:

### 1 Clone the Repository

```bash
git clone https://github.com/mahendra-k20/tech-forum.git
```

---

### 2 Import the Database

- Open [phpMyAdmin](http://localhost/phpmyadmin).
- Create a new database named:
  ```
  idiscuss
  ```
- Click **Import** and select the `idiscuss.sql` file located in your cloned `tech-forum/database` folder.

---

### 3 Configure Database Connection

Open:

```
partials/_dbconnect.php
```

and confirm the following configuration:

```php
$servername = "localhost";
$username = "root";
$password = "";
$database = "idiscuss";
```

---

### 4 Run the Project

- Start **Apache** and **MySQL** using WAMP/XAMPP.
- In your browser, go to:
  ```
  http://localhost/tech-forum/
  ```
  You now have **Tech Forum running locally** for testing and learning.
