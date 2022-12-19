import { Products } from "./products.js";

let product1 = new Products('Sk8-Hi Shoe', 99.00, 0, 'shoes');
let product2 = new Products('Chase Beanie', 25.00, 0, 'accessories');
let product3 = new Products('S/S Script T-Shirt', 29.00, 0, 't-shirts');
let product4 = new Products('Chase Sweat Short', 49.00, 34.30, 'sweatshirts');
let product5 = new Products('Hooded Marfa Sweat', 119.00, 83.30, 'sweatshirts');
let currentProducts = [product1, product2, product3, product4, product5];
// console.log(product2.getNameAndPrice());
// console.log(product4.getSalePrice());

function filterByPrice(arr, from, to) {
  let output = arr.filter(product => product.price >= from && to >= product.price);
  return output;
}
// console.log(filterByPrice(currentProducts, 10, 50));

function filterByCategory(arr, category) {
  let output = arr.filter(product => product.category === category);
  return output;
}
// console.log(filterByCategory(currentProducts, 'shoes'));

function filterProductsOnSale(arr) {
  let output = [];
  arr.forEach(product => {
    if(product.salePrice > 0) {
      output.push(product);
    }
  });
  return output;
}
// console.log(filterProductsOnSale(currentProducts));