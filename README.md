<p align="center">
  <img src="https://cdn.worldvectorlogo.com/logos/laravel-2.svg" alt="Laravel Logo" height="100">
</p>
<div align="center">
  <img src="https://img.shields.io/badge/Laravel-10.0-ff2d20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel Badge">
</div>

# **Romantxt SMS Service**
#### **📋Table of Contents**
- 🔍 Project Overview
- ⚙️ Core Functionalities
- 📊 Database Structure
- 🖼️ User Interface Screenshots
- 🚀 Running the Project
- 🤝 Contribution Guidelines
- 👥 Team Members & Contact Info

## **🔍Project Overview**
The Romantxt SMS Service is a web-based application built with PHP Laravel to manage and send SMS campaigns effortlessly 💬. The system helps businesses communicate with their customers in real-time with intuitive forms 📑 and robust reporting 📈.

**Slogan:** Being a champion 😎

## **⚙️Core Functionalities**
- 🛒 **SMS Campaign Management:** Create, update, and manage SMS campaigns.
- 📝 **Recipient Management:** Handle customer selection and group management.
- 👥 **Template Management:** Store and manage reusable message templates.
- 📊 **Reports:** Generate detailed reports on campaign performance and delivery status.

## **📊 Database Structure**
Below is a visual representation of the core tables used within the system:
**Tables Schema:**
![Screenshot](https://github.com/7amo10/Romantxt-SMS-Service/blob/main/Documentation%20%26%20Presentation/Tables-Schema.png)

#### Tables Overview📄
Main Tables:
- Customers (`id`, `name`, `email`, `phone_number`, `address`, `created_at`, `updated_at`)
- Templates (`id`, `name`, `content`, `created_at`, `updated_at`)
- Campaigns (`id`, `template_id`, `recipient_type`, `recipients`, `status`, `created_at`, `updated_at`)

## **🖼️User Interface Preview**
- SMS Campaign Management Form
    - ![Screenshot](https://github.com/7amo10/Romantxt-SMS-Service/blob/main/Documentation%20%26%20Presentation/assets/Campaigns.png)

- Template Management Dashboard
    - ![Screenshot](https://github.com/7amo10/Romantxt-SMS-Service/blob/main/Documentation%20%26%20Presentation/assets/Templates.png)

## **🚀Running the Project**
**Prerequisites**
- 🐘PHP >= 8.0
- 🧩 Composer
- 🗄️MySQL or other supported databases

## **Steps to Run Locally🔧:**
1. Clone the repository: 
    ```bash
    git clone https://github.com/Nelson-431/Romantxt-SMS-Service.git
    ```
2. Navigate to the project folder:
    
    ```bash
    cd Romantxt-SMS-Service
    ```
3. Install dependencies:
    ```bash
    composer install
    ```
4. Create a `.env` file from the example:
    
    ```bash
    cp .env.example .env
    ```
5. Configure your `.env` file with the appropriate database settings.
6. Run the database migrations:
    ```bash
    php artisan migrate
    ```
7. Seed the database (optional):
    ```bash
    php artisan db:seed
    ```
8. Start the Laravel development server:🌐
    ```bash
    php artisan serve
    ```

## **🤝Contribution Guidelines**
We welcome contributions from the community. Please adhere to the following steps for contributions:
1. Fork the project and create a new branch.  🍴
2. Make your changes and commit them with clear messages. 🚧
3. Submit a pull request, explaining the purpose and details of your changes.✏️
4. Ensure your code is properly tested. 🔍

## **👥Team Members & Contact Info**
Project Maintainer: 
- [Nelson-143](https://github.com/Nelson-143) 

For any inquiries, feel free to reach out to the project maintainer. ✉️