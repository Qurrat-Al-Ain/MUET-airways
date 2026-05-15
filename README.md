# MUET Airways ✈️

A full-stack Airline Reservation System developed using PHP, MySQL, HTML, CSS, and JavaScript.

This project allows users to search flights, register accounts, manage reservations, and view booking information through a modern and responsive interface.

---

## Features

- User Registration & Login
- Flight Search System
- Flight Reservation System
- My Tickets / Digital Wallet
- Staff Dashboard
- Add Flight Functionality
- Seat Availability Management
- MySQL Database Integration
- Responsive User Interface

---

## Tech Stack

### Frontend
- HTML
- CSS
- JavaScript

### Backend
- PHP

### Database
- MySQL

### Server
- XAMPP / Apache

---

## Project Structure

```text
MUET-airways/
│
├── index.php
├── login.php
├── register.php
├── view_flights.php
├── my_bookings.php
├── dashboard.php
├── add_flight.php
├── process_booking.php
├── db.php
├── airline_db.sql
├── README.md
│
├── css/
│   └── style.css
│
├── images/
│   └── logo.png
│
└── screenshots/
```

---

## Screenshots

### Homepage
(Add homepage screenshot here)

### Login Page
(Add login screenshot here)

### Registration Page
(Add registration screenshot here)

### Flight Search
(Add flight search screenshot here)

### My Tickets
(Add booking screenshot here)

---

## Installation Guide

### 1. Install XAMPP

Download and install XAMPP:

https://www.apachefriends.org/

---

### 2. Clone Repository

```bash
git clone https://github.com/your-username/MUET-airways.git
```

---

### 3. Move Project Folder

Move the project folder into:

```text
C:\xampp\htdocs\
```

---

### 4. Start Apache & MySQL

Open XAMPP Control Panel and start:

- Apache
- MySQL

---

### 5. Create Database

Open phpMyAdmin and create a database named:

```sql
airline_db
```

---

### 6. Import SQL File

Import:

```text
airline_db.sql
```

into phpMyAdmin.

---

### 7. Configure Database Connection

Update `db.php` if needed:

```php
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "airline_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
```

---

### 8. Run the Project

Open browser and visit:

```text
http://localhost/MUET-airways
```

---

## Booking Process Logic

The reservation system:

1. Receives selected flight ID
2. Inserts reservation into database
3. Updates available seats automatically
4. Confirms reservation to user

Example:

```php
$sql = "INSERT INTO RESERVATION 
(PASSENGER_ID, FLIGHT_ID, RESERVATION_DATE, RESERVATION_STATUS)
VALUES ($passenger_id, $flight_id, '$date', 'Confirmed')";
```

---

## Staff Dashboard Features

- View all reservations
- Monitor passengers
- Add flights
- Manage booking information

---

## Future Improvements

- Online Payment Integration
- Email Notifications
- PDF Ticket Generation
- Admin Analytics Dashboard
- Session-Based Authentication
- Mobile Responsive Improvements
- Flight Cancellation System

---

## Learning Outcomes

This project helped in understanding:

- Full-stack web development
- PHP backend processing
- MySQL database operations
- CRUD operations
- User authentication
- SQL JOIN queries
- Responsive UI design

---

## Author

**Qurrat Al Ain**  
MUET CS Project

---

## License

This project is developed for educational purposes only.