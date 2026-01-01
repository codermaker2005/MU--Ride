# 🚗 MU Ride – University Ride Sharing System

MU Ride is a Laravel-based ride-sharing platform designed for university students.  
Students can **offer rides**, **request rides**, and **admins can approve or manage rides**.

This project was built as an academic / practical system following real-world backend practices.

---

## ✨ Features

### 👨‍🎓 Students
- Register with first name, last name, and contact info
- Offer rides (driver)
- Request rides (rider)
- View approved rides only
- Ride requests restricted to:
  - 🕗 08:00 – 15:00
  - 📅 Monday – Friday
- View driver contact information

### 🛂 Admin
- Admin dashboard
- View all users
- Approve or reject rides
- See student ID and phone number

---

## 🧱 Tech Stack

- **Backend:** Laravel 12
- **Frontend:** Blade Templates
- **Database:** MySQL
- **Auth:** Laravel Authentication
- **ORM:** Eloquent

---

## 📂 Database Structure

- `users`
- `rides`
- `ride_requests`
- `locations` (future use)

---

## ⚙️ Installation & Setup

### 1️⃣ Clone the repository
```bash
git clone https://github.com/YOUR_USERNAME/MU--Ride.git
cd MU--Ride
