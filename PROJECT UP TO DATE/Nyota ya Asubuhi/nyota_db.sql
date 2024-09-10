CREATE DATABASE nyota;

USE nyota;

-- Users Table
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('common', 'donor', 'sponsor') DEFAULT 'common'
);

-- Children Table
CREATE TABLE children (
    child_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    age INT NOT NULL,
    bio TEXT
);

-- Admins Table
CREATE TABLE admins (
    admin_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    role_description VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- Donors Table
CREATE TABLE donors (
    donor_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    donation_amount DECIMAL(10, 2),
    donation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- Sponsors Table
CREATE TABLE sponsors (
    sponsor_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    child_id INT NOT NULL,
    sponsorship_start_date DATE,
    sponsorship_end_date DATE,
    FOREIGN KEY (user_id) REFERENCES users(user_id),
    FOREIGN KEY (child_id) REFERENCES children(child_id)
);

-- Inquiries Table
CREATE TABLE inquiries (
    inquiry_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    subject VARCHAR(255),
    message TEXT NOT NULL,
    inquiry_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- News and Updates Table
CREATE TABLE news_and_updates (
    update_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    update_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Gifts Table
CREATE TABLE gifts (
    gift_id INT AUTO_INCREMENT PRIMARY KEY,
    sponsor_id INT NOT NULL,
    child_id INT NOT NULL,
    gift_description TEXT,
    gift_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (sponsor_id) REFERENCES sponsors(sponsor_id),
    FOREIGN KEY (child_id) REFERENCES children(child_id)
);

-- Communication Table
CREATE TABLE communication (
    communication_id INT AUTO_INCREMENT PRIMARY KEY,
    sponsor_id INT NOT NULL,
    child_id INT NOT NULL,
    message TEXT NOT NULL,
    communication_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (sponsor_id) REFERENCES sponsors(sponsor_id),
    FOREIGN KEY (child_id) REFERENCES children(child_id)
);

-- Sample Data Insertion
INSERT INTO users (name, email, password, role) VALUES
('Alice Johnson', 'alice@example.com', 'password123', 'donor'),
('Bob Smith', 'bob@example.com', 'password123', 'sponsor');

INSERT INTO children (name, age, bio) VALUES
('Child One', 10, 'Bio of Child One'),
('Child Two', 8, 'Bio of Child Two');

INSERT INTO donors (user_id, donation_amount) VALUES
(1, 100.00),
(1, 50.00);

INSERT INTO sponsors (user_id, child_id, sponsorship_start_date, sponsorship_end_date) VALUES
(2, 1, '2023-01-01', '2023-12-31');

INSERT INTO inquiries (user_id, subject, message) VALUES
(1, 'Adoption Process', 'Can you provide more information on the adoption process?');

INSERT INTO news_and_updates (title, content) VALUES
('Annual Fundraiser', 'Join us for our annual fundraiser event on December 1st.'),
('Volunteer Day', 'Come and help out at the children\'s home on August 15th.');

-- Ensure sponsor_id and child_id exist before inserting into gifts and communication
INSERT INTO gifts (sponsor_id, child_id, gift_description) VALUES
((SELECT sponsor_id FROM sponsors WHERE user_id = 2 AND child_id = 1), 1, 'Toy car'),
((SELECT sponsor_id FROM sponsors WHERE user_id = 2 AND child_id = 1), 1, 'Doll');

INSERT INTO communication (sponsor_id, child_id, message) VALUES
((SELECT sponsor_id FROM sponsors WHERE user_id = 2 AND child_id = 1), 1, 'Hello Child One, how are you?'),
((SELECT sponsor_id FROM sponsors WHERE user_id = 2 AND child_id = 1), 1, 'Dear Child One, I hope you are doing well.');
