# Antwi Tech Store

A PHP web application built as part of the SDC310L course project. The application simulates a simplified online tech store where users can browse products, add items to a shopping cart, update quantities, and remove items.

---

## Project Description

Antwi Tech Store is a full-stack PHP web application that allows users to:

- Browse a product catalog populated from a MySQL database
- Select item quantities and add products to a shopping cart
- Update cart item quantities or remove individual items
- Clear the entire cart with one click
- Navigate between the catalog and cart pages seamlessly

The application was developed over 5 weeks, progressing from a basic HTML/PHP structure to a database-connected application with MVC architecture.

---

## Project Tasks

- **Week 2: Database and Application Framework**
  - Created MySQL database (`sdc310_antwi`) with `products` and `users` tables
  - Built initial `index.php` (catalog) and `cart.php` (shopping cart) pages
  - Set up basic CSS styling and error handling

- **Week 3: Database Access with PHP**
  - Created `db_connect.php` for PDO database connection
  - Implemented PHP code to read and display products from the database
  - Built full CRUD operations for the shopping cart using PHP sessions
  - Added input validation and sanitization

- **Week 4: MVC Architecture**
  - Reorganized project into Model, View, and Controller structure
  - Moved all database logic into Model files
  - Created Controller files to handle catalog and cart page logic

- **Week 5: Finalization and Testing**
  - Performed manual testing of all application features
  - Fixed bugs identified during testing
  - Prepared final documentation and GitHub submission

---

## Project Skills Learned

- PHP programming and server-side scripting
- MySQL database design and querying
- PDO for secure database connections
- PHP session management for cart functionality
- MVC (Model-View-Controller) architecture
- HTML/CSS for web interface design
- Git and GitHub for version control
- Project planning and weekly milestone tracking

---

## Language and Technologies Used

- **PHP 7.4** — server-side logic and database interaction
- **MySQL (MariaDB 10.4)** — relational database for products and users
- **HTML/CSS** — front-end structure and styling
- **XAMPP** — local development environment
- **PDO** — secure database connection layer

## Development Process Used

- **Waterfall with weekly milestones** — each week focused on a specific layer of the application, building incrementally from the database up through the front end and architecture.

---

## Project Summary

This project gave me hands-on experience building a real-world PHP web application from scratch. Starting with just a database and static HTML pages, I progressively added database connectivity, shopping cart logic, session handling, and MVC structure over five weeks. The biggest challenge was resolving MySQL privilege errors during the MVC refactoring phase, which taught me the importance of setting up database users and permissions correctly early in a project. Overall, the project demonstrated how a structured development plan and incremental weekly milestones can make a complex application manageable to build and deliver.

---

## Link to Project

[Antwi Tech Store – GitHub Repository](https://github.com/YOUR_USERNAME/YOUR_REPO_NAME)

*Student: Kendrick Antwi | Course: SDC310L | Completed: May 2026*
