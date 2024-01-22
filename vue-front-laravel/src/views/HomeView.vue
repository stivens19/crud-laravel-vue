
<template>
  <div>
      <h2 class="text-center">Lista de Productos</h2>

      <table class="table">
          <thead>
          <tr>
              <th>ID</th>
              <th>Name</th>
              <!-- <th>Actions</th> -->
          </tr>
          </thead>
          <tbody>
          <tr v-for="product in products" :key="product.id">
              <td>{{ product.id }}</td>
              <td>{{ product.nombre }}</td>
          </tr>
          </tbody>
      </table>
  </div>
</template>

<script>
  import axios from 'axios'
  export default {
      data() {
          return {
              products: []
          }
      },
      created() {
        this.fetchProductsList();
      },
      methods:{
        fetchProductsList() {
          axios.get('http://localhost:8000/api/productos/')
            .then(response => {
                this.products = response.data.data;
                return response
            })
            .catch(error => {
              return error
            });
        },
      }
  }
</script>
