const axios = window.axios;

const BASE_API_URL = 'http://192.168.1.5:8000/api'


export default {
    getAllProduct: () => 
        axios.get(`${BASE_API_URL}/products`),
    getOneProductShow: (id) => 
        axios.get(`${BASE_API_URL}/products/${id}`),
    getOneProductEdit: (id) => 
        axios.get(`${BASE_API_URL}/products/${id}/edit`),
    addProduct: (products) => 
        axios.post(`${BASE_API_URL}/products`, products),
    updateProduct: (products, id) => 
        axios.put(`${BASE_API_URL}/products/${id}`, products),
    deleteProduct: (id) =>
        axios.delete(`${BASE_API_URL}/products/${id}`)
};