# MyOwnMemoryLane

**MyOwnMemoryLane** is a web-based tool designed to assist individuals with memory-impairing conditions—such as Alzheimer’s or other forms of dementia—by helping them recall loved ones and significant life moments. Caregivers can create a customized website with images and captions tailored to the person’s memories.

## 🧠 Features

- Custom photo and caption memory pages
- User registration and login
- Simple and intuitive interface for caregivers and patients

## 🛠 Tech Stack

- PHP  
- MySQL  
- HTML  
- JavaScript  

## 🚀 Installation

1. **Download or Clone the Repository:**
   ```bash
   git clone https://github.com/yourusername/myownmemorylane.git
   cd myownmemorylane

2. Import the Database:
  Located in Db/database.sql

3.Ensure your database credentials are correctly set in:

includes/classes/db_config.php
private $host = 'your_host';
private $dbuser = 'your_db_user';
private $dbpassword = 'your_db_password';
private $database = 'your_database_name';
private $prefix = '';

🧩 Usage
Home Page:
Navigate to /index.php

Register New User:
/index.php?page=register

Login:
/login.php
