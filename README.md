# Travel Memory Tracker

> **Live URL:** {insert URL here}

---

## Demo

<p align="center">
  <img src="images/gif.gif" width="700">
</p>

---

## Overview

Travel Memory Tracker is a Laravel web application that allows users to organise and revisit travel experiences in one place.

Instead of scattered photos, notes, and apps, everything is structured into trips.

Users can:
- Create trips
- Upload and organise images
- Track travel details and highlights
- View and manage everything in one place

This project was developed as part of **Server-Side Development (CA3)**, focusing on **deployment, feedback implementation, and real-world development practices**.

---

## Live Deployment

The application is deployed on **Microsoft Azure**:

👉 https://your-app.azurewebsites.net

### Demo Accounts

| Name | Email | Password |
|------|-------|----------|
| Sarah Smith | sarah.smith@example.com | Password123! |
| Mark Byrne | mark.byrne@example.com | Password123! |

---

## Features

### Authentication
- Register, login, logout
- User-specific data
- Secure authorisation

### Trips
- Full CRUD functionality
- Title, location, dates, description
- Cover images and best photo

### Dashboard
- Overview of trips
- Quick actions
- Trip statistics

### Profile
- Upload and display profile picture

### UI / UX
- Travel-themed design
- Responsive layout with mobile navigation
- Fullscreen carousel for trip images

---

## Feedback & Improvements

The project was refined based on feedback from the previous assignment, focusing on improving usability, design, and functionality.

### Implemented

- Front page redesigned to match travel theme
- Added logo and favicon
- Carousel updated with fullscreen toggle
- Profile photo upload and display added
- Removed automatic scrolling behaviour
- Updated UI from business style to travel-inspired design
- Improved form spacing and label padding
- Added footer with profile / LinkedIn links

(still need to do)
- Improved fullscreen carousel UI/UX
- Added demo GIF to GitHub README
- Further improved README structure
- Removed unnecessary memory feature
- Added trip highlights (comma-separated tags)
- Added best photo upload per trip
- Added trip rating system (1–5 stars)
- Added trip status (Planned / Ongoing / Finished)
- Displayed trip summary data on cards
- Sorted trips by start date (newest first)

---

## Tech Stack

| Category | Technologies |
|----------|-------------|
| Backend | Laravel 11, PHP |
| Frontend | Blade, CSS, JavaScript |
| Database | MySQL / SQLite |
| Deployment | Microsoft Azure |
| Version Control | Git, GitHub |

---

## Database Structure

- Users
- Trips

Relationships:
- User → has many Trips

---

## Project Structure
app/
├── Http/Controllers/
├── Models/

database/migrations/

resources/views/
├── layouts/
├── trips/
└── profile/

public/css/

routes/web.php


---

## Local Setup

### Requirements
- PHP ≥ 8.1
- Composer
- MySQL or SQLite

### Installation

git clone https://github.com/Kireoda/ServerSideCA2_TravelMemoryTracker.git
cd ServerSideCA2_TravelMemoryTracker

composer install
cp .env.example .env
php artisan key:generate
Database
php artisan migrate
php artisan storage:link
php artisan db:seed   # optional
Run
php artisan serve

Open:
http://127.0.0.1:8000
Azure Deployment

## Steps
Created Azure App Service (PHP)
Configured database connection
Set environment variables
Deployed via GitHub
Configured storage for uploads
Example Environment
APP_DEBUG=false
APP_URL=https://your-app.azurewebsites.net

DB_HOST=your-db.mysql.database.azure.com
DB_DATABASE=travel_memory_tracker
DB_USERNAME=your-username
DB_PASSWORD=your-password

## AI Tools

AI was used for:

Debugging
Code structure suggestions
UI improvements
Deployment troubleshooting

All code was reviewed and understood before use.

License

Educational project for university coursework (CA3).


---
