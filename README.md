# CakesRBakes - Online Cake Shop

CakesRBakes is a full-featured e-commerce website for a cake shop, built with PHP, MySQL, and modern web technologies. The system allows customers to browse cakes, place orders, and manage their accounts.

## Features

### User Management
- User registration and authentication
- Profile management
- Session handling
- Real-time form validation
- CSRF protection

### Shopping Features
- Product catalog with categories
- Shopping cart functionality
- Real-time cart updates using AJAX
- Order processing
- Order history

### Admin Features
- Product management
- Order management
- User management
- Sales reports

### Technical Features
- MVC architecture
- PDO database abstraction
- AJAX-powered interactions
- Responsive design
- Secure session management
- Form validation
- Notification system

## Installation

1. Clone the repository:
```bash
git clone https://github.com/rashmithaRKL/CakeRBakes.git
```

2. Import the database:
```bash
mysql -u your_username -p your_database < database/cakerbakes_db.sql
```

3. Configure database connection:
- Open `config/database.php`
- Update the database credentials:
```php
private $host = "localhost";
private $db_name = "cakerbakes_db";
private $username = "your_username";
private $password = "your_password";
```

4. Configure site settings:
- Open `includes/Config.php`
- Update the site configuration:
```php
const SITE_NAME = 'CakesRBakes';
const SITE_URL = 'http://your-domain.com/CakeRBakes';
const ADMIN_EMAIL = 'admin@your-domain.com';
```

## Directory Structure

```
CakeRBakes/
├── ajax/                   # AJAX handlers
│   ├── auth_handler.php
│   └── cart_handler.php
├── config/                 # Configuration files
│   └── database.php
├── css/                    # Stylesheets
├── database/              # Database schema
│   └── cakerbakes_db.sql
├── images/                # Image assets
├── includes/              # Core functionality
│   ├── Auth.php
│   ├── Config.php
│   ├── Session.php
│   └── init.php
├── js/                    # JavaScript files
│   ├── auth.js
│   ├── cart.js
│   └── custom.js
├── models/                # Database models
│   ├── Cart.php
│   ├── Order.php
│   ├── Product.php
│   └── User.php
└── uploads/              # User uploads
```

## Technologies Used

- PHP 7.4+
- MySQL 5.7+
- HTML5
- CSS3
- JavaScript (ES6+)
- Bootstrap 5
- jQuery
- AJAX
- PDO

## Security Features

- Password hashing using bcrypt
- CSRF protection
- SQL injection prevention using PDO
- XSS protection
- Session security
- Input validation and sanitization

## Frontend Features

- Responsive design
- Mobile-friendly navigation
- Real-time form validation
- AJAX-powered interactions
- Smooth animations
- Toast notifications
- Loading indicators

## API Endpoints

### Authentication
- POST `/ajax/auth_handler.php`
  - Actions: login, register, logout, update_profile
  - CSRF token required

### Cart Operations
- POST `/ajax/cart_handler.php`
  - Actions: add, update, remove, clear, get_cart
  - CSRF token required

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)

## Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## License

This project is licensed under the MIT License - see the LICENSE file for details.

## Authors

- **Rashmitha** - *Initial work* - [rashmithaRKL](https://github.com/rashmithaRKL)

## Acknowledgments

- Bootstrap team for the amazing framework
- Font Awesome for the icons
- jQuery team
- All contributors who helped with the project
