<template>
  <div>
    <h2>Shopify Products</h2>
    <div v-if="loading">Loading...</div>
    <div v-else-if="error" style="color: red;">{{ error }}</div>
    <ul v-else>
      <li v-for="product in products" :key="product.id">
        {{ product.title || product.name || product.id }}
      </li>
    </ul>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'

const products = ref([])
const loading = ref(true)
const error = ref('')

onMounted(async () => {
  try {
    const res = await fetch('http://localhost:8000/api/products')
    if (!res.ok) throw new Error('API error')
    const data = await res.json()
    // Shopify devuelve { products: [...] }
    products.value = data.products || data
  } catch (e) {
    error.value = e.message
  } finally {
    loading.value = false
  }
})
</script>