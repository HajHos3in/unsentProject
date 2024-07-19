# The Unsent Project - Fantasy Edition

## Introduction

Welcome to The Unsent Project - Fantasy Edition, a whimsical and imaginative project inspired by the original "The Unsent Project." This project is a creative space where users can submit unsent messages to their loved ones, friends, or anyone they wish to communicate with in a safe, anonymous, and artistic way. The messages are collected and displayed to evoke emotions, stories, and connections that were never fully expressed.

## Purpose

The primary purpose of this project is to demonstrate my proficiency in modern web development using Laravel. It is a simple yet elegant project designed to showcase my skills in building dynamic web applications. Through this project, I aim to illustrate my ability to handle front-end and back-end development, database management, and user interaction in a cohesive and functional manner.

## Features

- **Submit Unsent Messages:** Users can submit their unsent messages through a simple and intuitive form.
- **Anonymous Submissions:** All submissions are anonymous, encouraging users to share their deepest thoughts without fear.
- **Message Display:** Submitted messages are displayed on the main page, creating a mosaic of emotions and stories.
- **Responsive Design:** The project is fully responsive, ensuring a seamless experience across all devices.

## Technologies Used

- **Laravel:** Built with the latest version of Laravel, ensuring a robust and scalable framework for development.
- **HTML/CSS:** Utilized for structuring and styling the web pages.
- **JavaScript:** Employed for dynamic interactions and enhancements.
- **MySQL:** Database management for storing and retrieving unsent messages.

## Installation

To run this project locally, follow these steps:

1. **Clone the repository:**
    ```bash
    git clone https://github.com/hajhos3in/unsentproject.git
    ```

2. **Navigate to the project directory:**
    ```bash
    cd unsentproject
    ```

3. **Install dependencies:**
    ```bash
    composer install
    ```

4. **Set up the environment:**
    - Copy the `.env.example` file to `.env`:
      ```bash
      cp .env.example .env
      ```
    - Configure your database settings in the `.env` file.

5. **Generate application key:**
    ```bash
    php artisan key:generate
    ```

6. **Run database migrations:**
    ```bash
    php artisan migrate
    php artisan db:seed
    ```

7. **Serve the application:**
    ```bash
    php artisan serve
    ```

8. **Visit the application:**
    - Open your browser and navigate to `http://localhost:8000`.

## Contact

Feel free to reach out if you have any questions or feedback. You can contact me via:

- **Email:** hosseinahmad54@gmail.com
