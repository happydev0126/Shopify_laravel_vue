This is a Laravel/Vue application that integrates with the Shopify API to display products.

What have I done? Steps:
Initial Setup:
I configured a Laravel and Vue.js structure using Docker Compose for container orchestration. I also created a Shopify account and imported a sample CSV with 3 products into a test store.

Backend - Laravel:
The first commits focused on building the Laravel application:

I designed a ShopifyService class registered through a Service Provider to handle the connection with the Shopify API. This service is used by the ProductController, which manages incoming requests.

I followed SOLID principles, creating a ShopifyServiceInterface to promote clean architecture and dependency inversion.

Frontend - Vue.js:
Once the Laravel app was ready and connected to my Shopify store, I focused on the frontend:

I built a Vue component that consumes the backend API and displays the products. I used ref, computed, and v-model for a reactive search, along with the onMounted hook to fetch data when the component is initialized.

Advanced Laravel Features:
To demonstrate deeper Laravel knowledge, I implemented:

A POST route to store products in a MySQL database using Eloquent.

A FormRequest class for validation.

An Observer to log data on product creation.

A Listener intended to (in the future) synchronize the product with the Shopify API (currently a stub).

The purpose of this codebase is to showcase how I would approach building a production-ready app, following best practices and clean architecture principles.