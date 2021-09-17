<template>
  <div id="vitrine">
    <carousel
        :navigation-enabled="true"
        :scrollPerPage="true"
        :perPageCustom="[[480, 2], [768, 3]]"
        :navigation-next-label="'❯'"
        :navigation-prev-label="'❮'"
        :centerMode="true"
        :paginationEnabled="false"
    >
      <slide v-for="product of products" :key="product.id">
        <div class="productBox">
          <img
              v-bind:src="'http:'+ product.images[0].url"
              v-bind:alt="product.name"
          >
          <section class="description">
            <p class="name">{{ product.name }}</p>
          </section>
        </div>
      </slide>
    </carousel>
  </div>
</template>

<script>
import Products from '@/services/Products'

export default {
  name: 'HelloWorld',
  props: {
    ranking:{
      type: String,
      requested: true
    },
  },
  data () {
    return {
      products: [],
    }
  },
  mounted () {
    Products.list().then(response => {
      this.products = response.data[this.ranking]
    })
  },
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
#vitrine {
  padding: 10px 60px;
}

.productBox > img {
  height: 210px;
  background-color: #704577;
}

.VueCarousel-slide {
  position: relative;
}

</style>
