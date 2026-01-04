# Authentication Design

## Overview

Atlas uses JWT (JSON Web Token) authentication for its API, providing stateless, secure, and scalable user authentication. The system leverages the `tymon/jwt-auth` package integrated with Laravel 12.

---

## Components

- **User Model:** [`App\Models\User`](app/Models/User.php) implements `JWTSubject`.
- **Auth Controller:** [`App\Http\Controllers\AuthController`](app/Http/Controllers/AuthController.php) handles login, logout, and token refresh.
- **JWT Middleware:** [`App\Http\Middleware\JwtMiddleware`](app/Http/Middleware/JwtMiddleware.php) protects API routes.
- **Routes:** Defined in [`routes/api.php`](routes/api.php).
- **Configuration:** JWT settings in [`config/jwt.php`](config/jwt.php), guards in [`config/auth.php`](config/auth.php).

---

## Flow

### Registration

1. User submits registration data.
2. User is created and can log in to receive a JWT.

### Login

1. User submits email and password to `/api/login`.
2. Credentials are validated.
3. On success, a JWT is issued and returned.

### Authenticated Requests

- JWT is sent in the `Authorization: Bearer <token>` header.
- [`JwtMiddleware`](app/Http/Middleware/JwtMiddleware.php) parses and validates the token.
- If valid, the request proceeds; otherwise, a 401 Unauthorized is returned.

### Token Refresh

- `/api/refresh` endpoint issues a new token if the current one is valid but nearing expiry.

### Logout

- `/api/logout` invalidates the current token.

---

## Security

- Passwords are hashed using Laravel's hashing.
- JWT secret is stored in `.env` as `JWT_SECRET`.
- Token TTL and refresh TTL are configurable.
- Blacklisting is enabled for logout/invalidation.
- Rate limiting is applied to auth endpoints.

---

## Configuration

- **Guard:** `api` guard uses `jwt` driver ([`config/auth.php`](config/auth.php)).
- **JWT Settings:** TTL, refresh TTL, algorithm, and blacklist in [`config/jwt.php`](config/jwt.php).
- **Middleware:** Protected routes use `JwtMiddleware`.

---

## Example Endpoints

- `POST /api/register` — Register a new user.
- `POST /api/login` — Obtain JWT.
- `GET /api/me` — Get current user (JWT required).
- `POST /api/refresh` — Refresh JWT.
- `GET /api/logout` — Invalidate JWT.

---

## Future Enhancements

- Email verification.
- Password reset flows.
- Role-based access control.
- OAuth/Social login integration.
