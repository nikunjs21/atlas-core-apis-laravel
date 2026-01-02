High Level Architecture

- Laravel Core API
-- user management
-- business entities
--- projects
--- workspaces
--- customers
-- CRUD with strict validation
-- API Versioning
-- MySQL performance optimization
-- Role based access
-- Tech:
--- Laravel 11
--- PHP 8.x
--- MySQL
--- Redis (cache)
--- Queues


- Auth & Security
-- Solid Auth Service
-- JWT or Sanctum auth
-- Access & Refresh Tokens
-- Secure Password hashing
-- Rate Limiting
-- Audit logs
-- Security Topics:
--- SQL Injection prevention
--- XSS
--- CSRF
--- Token storage best practices
--- Secure headers


- Real time chat service (Node.Js + Socket.io)
-- Websocket chat
-- private & group rooms
-- auth via JWT
-- message persistance
-- Redis pub/sub 


- AI service
-- RAG - ready architechture
-- Async calls
-- secure AI API usage
-- const control

- Notification Service
-- Email / Push
-- Queue based
-- retry and DLQ logic


- Project architecture
```text-
app/
 ├── Domain/
 │    ├── User/
 │    ├── Auth/
 │    ├── Chat/
 ├── Application/
 │    ├── Services/
 │    ├── DTOs/
 ├── Infrastructure/
 │    ├── Repositories/
 │    ├── Cache/
 │    ├── External/
 ├── Http/
 │    ├── Controllers/
 │    ├── Requests/
 │    ├── Resources/
 ├── Policies/
 ├── Jobs/
 ├── Events/
 ├── Listeners/
 ```

- MySQL 
-- for storing data

- radis 
-- for caching

- Request flow
user -> API Gateway -> Laravel Auth -> Task Service | Chat Service -> DB -> Response

- Why split chat into Node.js ?
-- Real time performance
-- WebSocket friendliness
-- Horizontal scaling
-- Separation of concerns

