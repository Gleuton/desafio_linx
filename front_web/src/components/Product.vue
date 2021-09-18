<template>
  <div class="productBox">
    <div v-if="ranking === 'mostPopular'" class="popular">
        <span class="quadrado">
          {{ position }}º
        </span>
        <span class="triangulo"></span>
    </div>
    <div v-else>

    </div>
    <div class="image-box">
      <img
          v-bind:src="'http:'+ product.images[0].url"
          v-bind:alt="product.name"
      >
    </div>

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
  props: {
    product: {
      type: Object,
      requested: true,
    },
    ranking: {
      type: String,
      requested: true,
    },
    position: {
      type: Number,
    },

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
}
</script>

<style scoped>
.productBox {
  margin-top: 10px;
  font-family: 'Dosis', 'Source Sans Pro', 'Helvetica Neue', Arial, sans-serif;
  height: 300px;
  align-content: center;
  font-size: 0.83em;
  color: #262626;
}
.productBox .image-box{
  padding: 25px;
}
.productBox .image-box img {
  display: block;
  margin: 0 auto;
  height: 210px;
}

.productBox .description {
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
.popular{
  float: right;
  width: 30px;
  height: 30px;
}
.popular .quadrado{
  float: right;
  width: 30px;
  padding: 10px 0;
  background-color: #E8ECF0;
  color: #704577;
  text-align: center;
  font-weight: bold;
  border-radius: 5px 5px 0 0;
}
.popular .triangulo{
  float: left;
  width: 0;
  height: 0;
  border-left: 15px solid transparent;
  border-right: 15px solid transparent;
  border-top: 10px solid #E8ECF0;
}
</style>