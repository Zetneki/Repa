# Repa Webshop

Repa is a web application developed by a group of two as a university project during the second semester. It is an online store where users can purchase carrots and carrot-themed merchandise. The project includes various features such as a forum, shopping cart, discount codes, and more. This was our first experience working with the HTML, PHP, CSS, JavaScript, and MySQL stack, and no frameworks were allowed during development.

## Features

- **Online Store**: Browse and purchase carrots and carrot-related merchandise.
- **Forum**: Engage with other users through discussions.
- **Shopping Cart**: Add items to your cart and manage your purchases.
- **Coupon Codes**: Apply discount codes for savings.
- **User Authentication**: Register and log in to access additional features.
- **Order Management**: Review and track your orders.
- **Admin dashboard**: Add, edit or delete products

## Technologies Used

- **HTML**: Structure of the web pages.
- **CSS**: Styling and layout of the application.
- **JavaScript**: Dynamic interactions and client-side functionality.
- **PHP**: Server-side logic and backend development.
- **MySQL**: Database for storing user data, products, orders, and forum posts.

## Installation and Setup

1. Clone the repository:

   ```bash
   https://github.com/Zetneki/Repa.git
   ```

2. Set up a local web server (e.g., XAMPP, WAMP, or LAMP) and place the project files in the `htdocs` directory.

3. Import the database:

   - Open phpMyAdmin or your preferred MySQL client.
   - Create a new database (`repadb`).
   - Import the SQL file provided in the repository.

4. Configure the database connection:

   - Edit the database configuration file (`Repa/_rootphp/dbh.inc.php`) with your database credentials.

5. Start your local server and access the application via `http://localhost/Repa`.

## Usage

1. Register as a new user or log in with your credentials.
2. Browse the store and add items to your cart.
3. Apply discount codes if available.
4. Proceed to checkout and place your order.
5. Engage in discussions on the forum.

## Project Details

- **Semester**: Second semester
- **University**: SZTE
- **Team Members**: Tóth Bence and Zoltai Zétény Csongor
- **Restrictions**: No frameworks allowed; only HTML, CSS, JavaScript, PHP, and MySQL.

## Future Improvements

- Enhance UI/UX design for a more modern look.
- Add payment methods.
- Implement advanced search and filtering options.
- Improve security measures.

## License

This project is for educational purposes and is not licensed for commercial use.
