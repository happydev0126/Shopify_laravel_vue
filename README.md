# Shopify Laravel + Vue Assessment

## Overview
This project demonstrates a simple product sync between a Laravel backend and a Vue.js frontend, using Docker for local development. It showcases clean code, SOLID principles, API integration, and event-driven logic in Laravel, as well as basic reactivity and UI in Vue.

---

## 1. Laravel Backend (SOLID, ProductService, API)
- **Dockerized Laravel**: The backend runs in a container with MySQL.
- **ProductService with Interface**: Implements SOLID by using a `ProductSyncServiceInterface` and a concrete `ShopifyService` for fetching products from Shopify via Guzzle.
- **Dependency Injection**: The controller depends on the interface, not the concrete class.
- **API Endpoint**: `GET /api/products` fetches products from Shopify.
- **Validation**: Uses a FormRequest for product creation.

---

## 2. Vue.js Frontend (Reactivity, Fetch, UI)
- **Dockerized Vue 3 + Vite**: The frontend runs in a separate container.
- **Fetches products**: Calls `/api/products` via a Vite proxy.
- **Reactivity**: Uses `ref`, `computed`, and `v-model` for search and filtering.
- **UI**: Products are shown as cards with image, title, vendor, and a search box.
- **Error/loading states**: Handles API errors and loading state.

---

## 3. Local Product Creation & Observer/Event
- **Local Product Model**: You can create products locally via `POST /api/products`.
- **Observer**: When a product is created, a Laravel Observer logs the creation.
- **Event/Listener**: The observer fires a `ProductCreated` event, handled by a listener that simulates syncing with Shopify (logs a stub message).
- **Logs**: All actions are logged in `storage/logs/laravel.log`.

---

## How to Run
1. Clone the repo.
2. Run `docker-compose up --build` in the project root.
3. Access the frontend at [http://localhost:5173](http://localhost:5173) and the backend API at [http://localhost:8000/api/products](http://localhost:8000/api/products).
4. Use Postman to test `POST /api/products` with JSON body `{ "title": "Test Product", "vendor": "Test Vendor" }`.
5. Check logs in `backend/storage/logs/laravel.log` for observer/event output.

---

## Notes
- Shopify credentials must be set in the backend `.env` for real API sync.
- The sync with Shopify is simulated via logs (stub) in the event listener.
- The code is modular, testable, and follows best practices for both Laravel and Vue. 