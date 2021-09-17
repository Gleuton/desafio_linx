import { http } from './config'

export default {
  list:() =>{
    return http.get('/vitrine/maxProducts/16')
  }
}