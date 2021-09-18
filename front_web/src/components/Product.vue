<template>
  <div class="productBox">
    <img
        v-bind:src="'http:'+ product.images[0].url"
        v-bind:alt="product.name"
    >
    <section class="description">
      <p>{{ nameLimit(product.name) }}</p>
      <p class="oldPrice"> {{ formatMoney(product.oldPrice) }}</p>
      <p>Por <span class="price"> {{ formatMoney(product.price) }}</span></p>
      <p>{{ product.installments.count }}x {{ formatMoney(product.installments.price) }} </p>
    </section>
  </div>
</template>

<script>
export default {
  name: 'Product',
  props:{
    product:{
      type: Object,
      requested: true,
    }
  },
  methods: {
    nameLimit (name) {
      let result = name.slice(0, name.indexOf('-'))
      if (result.length > 70) {
        result = result.slice(0, 70) + '...'
      }
      return result
    },
    formatMoney (value) {
      return value.toLocaleString(
          'pt-br',
          {style: 'currency', currency: 'BRL'},
      )
    },
  },
  mounted () {
    console.log(this.product)
  }
}
</script>

<style scoped>
  .productBox {
    margin: 0 10px;
    font-family: 'Dosis', 'Source Sans Pro', 'Helvetica Neue', Arial, sans-serif;
    width: 300px;
    align-content: center;
    font-size: 0.83em;
    color: #262626;
  }

  .productBox > img {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 210px;
  }
  .productBox .description{
    margin-top: 25px;
  }
  .productBox .description .price {
    color: #704577;
    font-size: 1.5em;
  }

  .productBox .description .oldPrice {
    font-size: 0.9em;
    color: #747576;
    text-decoration: line-through;
  }
</style>