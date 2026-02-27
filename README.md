# Travel Memory Tracker

## Project Overview

Travel Memory Tracker is a web application that allows users to save and organise memories from their trips and holidays. Users can create trips and add memories with locations, notes, dates, and photos. The system keeps travel memories in one organised place and makes them easy to revisit.

Each user has their own account where they can manage their trips and view past experiences. The application is designed to be simple and easy to use while still feeling like a real product.

The system will also include a memory story feature inspired by apps like Google Photos and Spotify Wrapped. After a trip is finished, the system will generate a small memory page that combines photos and notes into a simple trip summary, allowing users to look back on their holidays in a more engaging way.

## Main Features

### User Accounts
Users can register and log in to their own accounts. Each user can only see and manage their own trips and memories.

### Trips (Main CRUD Feature)
Users can create, view, edit, and delete trips. Each trip will include basic details such as title, location, dates, and description. Trips act as the main way memories are organised.

### Memories
Users can add memories within each trip. A memory can include a location, date, short description, and images. This allows trips to be broken into smaller moments.

### Memory Story Page
When a trip is marked as finished, the system generates a memory story page. This page combines photos and notes into a simple trip summary similar to a small digital memory book.

Examples may include:
- Trip title and dates
- Locations visited
- Photos from the trip
- Memory notes
- Number of memories added
- Small quotes to match the trip theme

### Trip History
Users can browse and view all of their past trips in one place.

### Possible Extra Features
A yearly summary feature that shows a simple overview such as:
- Number of trips taken
- Locations visited
- Total memories added

Cover Photo for Trips
- Each trip has a main image.
- Shows on the dashboard trip list.
- Makes the app look much more polished.
- Simple to implement and looks great in a portfolio.

Trip Status (Planned / Ongoing / Finished)
- Planned → future trip
- Ongoing → currently travelling
- Finished → enables Memory Story

Favourite Memories
- Users can mark memories as favourites.
- Favourites appear first on the Memory Story page.

Trip Statistics
Example shown on Trip Details:
- Number of memories
- Locations visited
- Trip duration

Simple Map Link
Instead of building a map:
- Store location name
- Button: "View on Google Maps"
- Just opens Google Maps search.

Tags or Categories for Memories
Example:
- Food
- Sightseeing
- Nature
- Activities
Helps organise memories.
This would act like a small "memory recap" similar to Spotify Wrapped.

## Technical Details

The application will be built using the Laravel framework following the Model–View–Controller (MVC) architecture.

The system will include:

- Laravel MVC structure
- Relational database for storing trips and memories
- Laravel migrations for database setup
- User authentication
- Authorisation so users only access their own data
- Form validation on both client and server side
- At least one fully implemented CRUD feature (Trips)
- Multiple pages and views

## Pages (Planned)

- Home Page
- Login Page
- Register Page
- User Dashboard (Trip List)
- Trip Details Page
- Add Trip Page
- Edit Trip Page
- Add Memory Page
- Memory Story Page

## Purpose

The goal of this project is to create a realistic travel memory application where users can store and revisit trips in a structured and meaningful way. The project focuses on usability, organisation of information, and creating a simple but engaging experience.
