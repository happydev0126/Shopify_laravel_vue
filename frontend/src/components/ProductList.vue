<template>
  <div>
    <h2>Shopify Products</h2>
    <input
      v-model="search"
      placeholder="Buscar producto..."
      class="search-input"
    />
    <div v-if="loading">Loading...</div>
    <div v-else-if="error" style="color: red;">{{ error }}</div>
    <div v-else>
      <div v-if="filteredProducts.length === 0">No hay productos.</div>
      <div class="product-list">
        <div
          v-for="product in filteredProducts"
          :key="product.id"
          class="product-card"
        >
          <img
            v-if="product.image && product.image.src"
            :src="product.image.src"
            alt="Product image"
            class="product-img"
          />
          <img
            v-else-if="product.images && product.images.length"
            :src="product.images[0].src"
            alt="Product image"
            class="product-img"
          />
          <strong>{{ product.title || product.name }}</strong>
          <div>ID: {{ product.id }}</div>
          <div v-if="product.vendor">Vendor: {{ product.vendor }}</div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, computed, onMounted } from 'vue'

const products = ref([])
const loading = ref(true)
const error = ref('')
const search = ref('')

onMounted(async () => {
  try {
    const res = await fetch('http://localhost:8000/api/products')
    if (!res.ok) throw new Error('API error')
    const data = await res.json()
    products.value = data.products || data
  } catch (e) {
    error.value = e.message
  } finally {
    loading.value = false
  }
})

const filteredProducts = computed(() =>
  products.value.filter(p =>
    (p.title || p.name || '').toLowerCase().includes(search.value.toLowerCase())
  )
)
</script>

<style scoped>
.search-input {
  margin-bottom: 1rem;
  padding: 0.5rem;
  width: 100%;
  max-width: 300px;
  font-size: 1rem;
}
.product-list {
  display: flex;
  flex-wrap: wrap;
  gap: 1rem;
}
.product-card {
  background: #222;
  color: #fff;
  border-radius: 8px;
  padding: 1rem;
  min-width: 180px;
  box-shadow: 0 2px 8px #0002;
  display: flex;
  flex-direction: column;
  align-items: center;
}
.product-img {
  width: 100%;
  max-width: 120px;
  border-radius: 6px;
  margin-bottom: 0.5rem;
  background: #fff;
}
</style>