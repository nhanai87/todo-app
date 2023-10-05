# Laravel To-Do List Application


This is a full-featured to-do list application built using Laravel, Docker, and Jetstream. Users can register, log in, and manage their tasks. Tasks can be created, edited, marked as done, and deleted.

## Table of Contents

- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [Testing](#testing)
- [Contributing](#contributing)
- [License](#license)

## Features

- User registration and authentication.
- Create, edit, and delete tasks.
- Mark tasks as "to-do," "doing," or "done."
- Filter tasks by status and creation date.
- Dockerized development environment.
- Laravel Jetstream for authentication and scaffolding.

## Installation

To run this application locally, follow these steps:

1. Clone this repository to your local machine:

   ```bash
   git clone git@github.com:nhanai87/todo-app.git

2. Ensure 2 file docker-compose.yml and Dockerfile config correctly
3. Build and run the Docker containers:
   
   ```bash
   docker-compose up -d --build
4. Connect to the Laravel app container and configure the .env file
5. Install Jetstream and run migrations:
   
   ```bash
   composer require laravel/jetstream
   php artisan jetstream:install livewire
   php artisan migrate
   
6. Run todo app:
   
   ```bash
   php artisan serve
   
## Usage

1. Register a new user account or log in if you already have an account.
2. Once logged in, you can perform the following actions:
   - Create a new task by clicking the "Create Task" button and filling in the details.
   - View your tasks on the homepage, including options to edit, delete, or mark them as done.
   - Filter tasks by status (to-do, doing, done) or creation date using the filter options.
   - Edit a task by clicking the "Edit" button on the task card.
   - Delete a task by clicking the "Delete" button on the task card.
3. Log out when you're done using the application.

## Testing
To run the test cases, execute the following command within the Laravel app container:
   ```bash
   php artisan test
   ```
## Todo
 - Style your app using CSS or a front-end framework like Bootstrap
 - ....
## Contributing
Contributions are welcome! If you find any issues or have suggestions for improvements, please open an issue or create a pull request. Follow the project's coding style and guidelines.

## License
...

