# Travel Memory Tracker

## 📌 Project Overview

Travel Memory Tracker is a Laravel-based web application that allows users to create, organise, and revisit memories from their trips and holidays.

The application solves the common problem of travel memories being scattered across different platforms (photos, notes, apps) by providing a **single structured system** where users can:
- Create trips
- Add memories within those trips
- View and manage everything in one place

This project was developed as part of the **Server-Side Development (CA2)** module and follows a **Model–View–Controller (MVC)** architecture using Laravel.

---

## 🎯 Purpose

The goal of this project is to:
- Build a realistic full-stack Laravel application
- Apply MVC principles in a real-world scenario
- Demonstrate CRUD functionality with relational data
- Focus on usability and user-centred design

---

## 👤 Target Users

The application is designed based on two user personas:

### Primary User – Sarah (Frequent Traveller)
- Wants to organise detailed travel memories
- Takes photos and notes regularly
- Values clean, structured design

### Secondary User – Mark (Casual Traveller)
- Wants a simple and quick way to track trips
- Prefers minimal interaction and simplicity

These personas guided the UI and feature decisions.

---

## 🚀 Features

### 🔐 User Authentication
- Register, login, logout
- Each user has their own data
- Authorisation ensures users only access their own trips

### 🧳 Trips (Main CRUD Feature)
- Create, view, edit, and delete trips
- Fields include:
  - Title
  - Location
  - Start & End dates
  - Description

### 📍 Memories (Nested CRUD)
- Add memories inside a trip
- Each memory includes:
  - Title
  - Location
  - Date
  - Description
- Full CRUD support for memories

### 📊 Dashboard
- Displays all user trips
- Quick access to create, edit, and view trips

### ✅ Validation
- Server-side validation using Laravel
- Error messages shown in forms

### 🔒 Authorisation
- Users can only access their own trips and memories
- Implemented using `auth()->id()` checks and guards

---

## 🧱 Technical Implementation

### 🏗 Architecture
- Laravel MVC structure
  - Models: `Trip`, `Memory`, `User`
  - Controllers: `TripController`, `MemoryController`
  - Views: Blade templates

### 🗄 Database
- Relational database (SQLite/MySQL)
- Migrations used for schema:
  - users
  - trips
  - memories

### 🔗 Relationships
- A **Trip has many Memories**
- A **Memory belongs to a Trip**

### 🧾 CRUD Implementation
- Full CRUD for Trips (main feature)
- Additional CRUD for Memories (extended feature)

---

## 🖥 Pages Included

- Login / Register
- Dashboard (Trip list)
- Create Trip
- Edit Trip
- Trip Details
- Memory List
- Create Memory
- Edit Memory

---

## Setup Instructions

### 1. Clone the repository:
```bash
   git clone <https://github.com/Kireoda/ServerSideCA2_TravelMemoryTracker.git>
```
### 2. Navigate into the project:
```bash
   cd travel-memory-tracker
```
### 3. Install dependencies:
```bash
   composer install
```
### 4. Copy environment file:
```bash
   cp .env.example .env
```
### 5. Generate application key:
```bash
   php artisan key:generate
```
---

## How to Run the Project

### 1. Start the Laravel server:
```bash
   php artisan serve
```
Frontend assets are prebuilt and stored in `public/build`, so no Node/Vite step is required.
### 2. Open in browser:
   http://127.0.0.1:8000

---
## Database Setup

### 1. Configure your .env file (SQLite or MySQL)

### 2. Run migrations:
```bash
   php artisan migrate
```
If you're adding cover images for trips, run this once to make storage public:
```bash
   php artisan storage:link
```
### 3. (Optional) Seed database:
```bash
   php artisan db:seed
```

### 4. Demo accounts (seeded)
- Sarah Smith — `sarah.smith@example.com`
- Mark Byrne — `mark.byrne@example.com`
- Default password for both: `Password123!`
---
## ⚠️ Assumptions

- Each user manages only their own trips
- Trips must have valid dates
- Memories are always linked to a trip

---

## ❗ Limitations / Known Issues

- No image upload for memories (text-only)
- Memory Story feature planned but not implemented
- UI partially uses Tailwind (navigation) and custom CSS (main pages)

---

## 📌 Future Improvements

- Memory Story / Trip Summary page
- Image upload for memories
- Trip status (Planned / Ongoing / Finished)
- Favourite memories
- Trip statistics (memory count, duration)
- Google Maps integration for locations

---

## 🔄 Version Control

- Git used throughout development
- Regular commits with meaningful messages
- Demonstrates incremental feature development

---

## 🤖 Use of AI Tools

AI tools were used during development to:
- Debug errors
- Assist with structuring controllers and views
- Improve UI styling

All code was reviewed, understood, and adapted where necessary.

---

## 🧪 Testing

Manual testing was carried out to ensure:
- CRUD operations function correctly
- Validation rules are enforced
- Authorisation prevents unauthorised access

---

## 🎤 Oral Defence Preparation

During the project defence, the following areas can be explained:
- MVC structure and separation of concerns
- CRUD implementation for Trips and Memories
- Database relationships
- Validation and security decisions
- UX decisions based on user personas

---

## 📄 License

This project is developed for educational purposes as part of a university assignment.
