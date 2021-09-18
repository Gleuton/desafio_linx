<template>
  <div id="vitrine">
    <carousel
        :navigation-enabled="true"
        :scrollPerPage="true"
        :perPageCustom="[[480, 2], [768, 3], [1056, 4]]"
        :navigation-next-label="'❯'"
        :navigation-prev-label="'❮'"
        :centerMode="true"
        :paginationEnabled="false"
    >
      <slide v-for="product of products" :key="product.id">
        <Product :product="product"/>
      </slide>
    </carousel>
  </div>
</template>

<script>
import Products from '@/services/Products'
import Product from '@/components/Product'

export default {
  name: 'Vitrine',
  components: {Product},
  props: {
    ranking: {
      type: String,
      requested: true,
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

<style scoped>
#vitrine {
  padding: 10px 60px;
}
</style>
