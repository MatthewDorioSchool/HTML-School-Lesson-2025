CREATE TABLE Pizza_Order(
    id INT AUTO_INCREMENT PRIMARY KEY,   -- Unique identifier for each order
    CustomerName VARCHAR(255) NOT NULL,   -- Name of the customer
    DevlieryAddress VARCHAR(255) NOT NULL, -- Delivery address for the pizza
    PizzaSize VARCHAR(255) NOT NULL, -- Pizza size options (Small, Medium, Large)
    toppings VARCHAR(255),               -- Comma-separated list of toppings
    phone VARCHAR(15) NOT NULL           -- Phone number of the customer
);