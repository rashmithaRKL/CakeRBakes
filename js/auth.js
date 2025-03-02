// Authentication and Session Management
class Auth {
    constructor() {
        this.csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;
        this.initializeEventListeners();
        this.checkSession();
    }

    // Initialize event listeners
    initializeEventListeners() {
        // Login form
        const loginForm = document.getElementById('loginForm');
        if (loginForm) {
            loginForm.addEventListener('submit', (e) => {
                e.preventDefault();
                this.login(new FormData(loginForm));
            });
        }

        // Register form
        const registerForm = document.getElementById('registerForm');
        if (registerForm) {
            registerForm.addEventListener('submit', (e) => {
                e.preventDefault();
                this.register(new FormData(registerForm));
            });

            // Real-time username availability check
            const usernameInput = registerForm.querySelector('[name="username"]');
            if (usernameInput) {
                usernameInput.addEventListener('blur', () => {
                    this.checkUsername(usernameInput.value);
                });
            }

            // Real-time email availability check
            const emailInput = registerForm.querySelector('[name="email"]');
            if (emailInput) {
                emailInput.addEventListener('blur', () => {
                    this.checkEmail(emailInput.value);
                });
            }
        }

        // Profile form
        const profileForm = document.getElementById('profileForm');
        if (profileForm) {
            profileForm.addEventListener('submit', (e) => {
                e.preventDefault();
                this.updateProfile(new FormData(profileForm));
            });
        }

        // Logout links
        document.querySelectorAll('.logout-link').forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                this.logout();
            });
        });
    }

    // Check session status
    async checkSession() {
        try {
            const response = await this.sendRequest('auth_handler.php', {
                action: 'check_session'
            });

            if (response.success) {
                if (response.loggedIn) {
                    this.updateUI(response.user);
                }
            }
        } catch (error) {
            console.error('Session check failed:', error);
        }
    }

    // Login
    async login(formData) {
        try {
            const response = await this.sendRequest('auth_handler.php', {
                action: 'login',
                username: formData.get('username'),
                password: formData.get('password'),
                remember: formData.get('remember'),
                csrf_token: this.csrfToken
            });

            if (response.success) {
                this.showNotification('success', response.message);
                this.updateUI(response.user);
                setTimeout(() => {
                    window.location.href = response.redirect;
                }, 1500);
            } else {
                this.showNotification('error', response.message);
            }
        } catch (error) {
            this.showNotification('error', 'Login failed. Please try again.');
        }
    }

    // Register
    async register(formData) {
        try {
            const response = await this.sendRequest('auth_handler.php', {
                action: 'register',
                username: formData.get('username'),
                email: formData.get('email'),
                password: formData.get('password'),
                confirm_password: formData.get('confirm_password'),
                full_name: formData.get('full_name'),
                phone: formData.get('phone'),
                address: formData.get('address'),
                csrf_token: this.csrfToken
            });

            if (response.success) {
                this.showNotification('success', response.message);
                setTimeout(() => {
                    window.location.href = response.redirect;
                }, 1500);
            } else {
                if (response.errors) {
                    response.errors.forEach(error => {
                        this.showNotification('error', error);
                    });
                } else {
                    this.showNotification('error', response.message);
                }
            }
        } catch (error) {
            this.showNotification('error', 'Registration failed. Please try again.');
        }
    }

    // Logout
    async logout() {
        try {
            const response = await this.sendRequest('auth_handler.php', {
                action: 'logout',
                csrf_token: this.csrfToken
            });

            if (response.success) {
                this.showNotification('success', response.message);
                setTimeout(() => {
                    window.location.href = response.redirect;
                }, 1500);
            }
        } catch (error) {
            this.showNotification('error', 'Logout failed. Please try again.');
        }
    }

    // Update profile
    async updateProfile(formData) {
        try {
            const response = await this.sendRequest('auth_handler.php', {
                action: 'update_profile',
                full_name: formData.get('full_name'),
                phone: formData.get('phone'),
                address: formData.get('address'),
                csrf_token: this.csrfToken
            });

            if (response.success) {
                this.showNotification('success', response.message);
            } else {
                this.showNotification('error', response.message);
            }
        } catch (error) {
            this.showNotification('error', 'Profile update failed. Please try again.');
        }
    }

    // Check username availability
    async checkUsername(username) {
        if (!username) return;

        try {
            const response = await this.sendRequest('auth_handler.php', {
                action: 'check_username',
                username: username,
                csrf_token: this.csrfToken
            });

            const usernameInput = document.querySelector('[name="username"]');
            const feedbackElement = usernameInput?.nextElementSibling;

            if (response.exists) {
                usernameInput?.classList.add('is-invalid');
                usernameInput?.classList.remove('is-valid');
                if (feedbackElement) {
                    feedbackElement.textContent = 'Username already taken';
                    feedbackElement.className = 'invalid-feedback';
                }
            } else {
                usernameInput?.classList.add('is-valid');
                usernameInput?.classList.remove('is-invalid');
                if (feedbackElement) {
                    feedbackElement.textContent = 'Username available';
                    feedbackElement.className = 'valid-feedback';
                }
            }
        } catch (error) {
            console.error('Username check failed:', error);
        }
    }

    // Check email availability
    async checkEmail(email) {
        if (!email) return;

        try {
            const response = await this.sendRequest('auth_handler.php', {
                action: 'check_email',
                email: email,
                csrf_token: this.csrfToken
            });

            const emailInput = document.querySelector('[name="email"]');
            const feedbackElement = emailInput?.nextElementSibling;

            if (response.exists) {
                emailInput?.classList.add('is-invalid');
                emailInput?.classList.remove('is-valid');
                if (feedbackElement) {
                    feedbackElement.textContent = 'Email already registered';
                    feedbackElement.className = 'invalid-feedback';
                }
            } else {
                emailInput?.classList.add('is-valid');
                emailInput?.classList.remove('is-invalid');
                if (feedbackElement) {
                    feedbackElement.textContent = 'Email available';
                    feedbackElement.className = 'valid-feedback';
                }
            }
        } catch (error) {
            console.error('Email check failed:', error);
        }
    }

    // Update UI after login/logout
    updateUI(user) {
        const userMenuContainer = document.querySelector('.user-menu-container');
        const cartCount = document.querySelector('.cart-count');

        if (user && userMenuContainer) {
            userMenuContainer.innerHTML = `
                <li class="nav-item">
                    <a class="nav-link" href="cart.php">
                        <i class="fa fa-shopping-cart"></i>
                        <span class="cart-count badge bg-danger">${user.cartCount}</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="fa fa-user"></i> ${user.username}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                        <li><a class="dropdown-item logout-link" href="#">Logout</a></li>
                    </ul>
                </li>
            `;
        }

        if (cartCount && user) {
            cartCount.textContent = user.cartCount;
        }
    }

    // Send AJAX request
    async sendRequest(url, data) {
        try {
            const response = await fetch(`ajax/${url}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams(data)
            });

            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }

            return await response.json();
        } catch (error) {
            console.error('Request failed:', error);
            throw error;
        }
    }

    // Show notification
    showNotification(type, message) {
        const notification = document.createElement('div');
        notification.className = `alert alert-${type} notification`;
        notification.innerHTML = message;
        
        document.body.appendChild(notification);

        // Position the notification
        notification.style.position = 'fixed';
        notification.style.top = '20px';
        notification.style.right = '20px';
        notification.style.zIndex = '9999';
        notification.style.minWidth = '200px';
        notification.style.padding = '15px';
        notification.style.borderRadius = '5px';
        notification.style.animation = 'fadeIn 0.5s';
        notification.style.backgroundColor = type === 'success' ? '#FEA4D4' : '#dc3545';
        notification.style.color = '#fff';
        notification.style.boxShadow = '0 4px 6px rgba(0, 0, 0, 0.1)';

        // Remove notification after 3 seconds
        setTimeout(() => {
            notification.style.animation = 'fadeOut 0.5s';
            setTimeout(() => {
                notification.remove();
            }, 500);
        }, 3000);
    }
}

// Initialize Auth when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    window.auth = new Auth();
});

// Add CSS animations
const style = document.createElement('style');
style.textContent = `
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeOut {
        from { opacity: 1; transform: translateY(0); }
        to { opacity: 0; transform: translateY(-20px); }
    }

    .notification {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
`;
document.head.appendChild(style);
